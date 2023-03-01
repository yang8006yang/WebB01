<?php
include_once "base.php";
$table = $_POST['table'];
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del'])) {
            if (in_array($id, $_POST['del'])) {
                $$table->del($id);
            }
        }
        $row['id'] = $id;
    }
    switch ($table) {
        case 'MENU':
            $row['text'] = $_POST['text'][$idx];
            $row['href'] = $_POST['href'][$idx];

            break;
        case 'ADMIN':
            $row['acc'] = $_POST['acc'][$idx];
            $row['pw'] = $_POST['pw'][$idx];
            break;
        case 'TITLE':
            $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
            $row['text'] = $_POST['text'][$idx];
            break;

        default:
            $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
            if (isset($_POST['text'])) {
                $row['text'] = $_POST['text'][$idx];
            }
            break;
    }
    $$table->save($row);
}


        if (isset($_POST['add_text'])) {
            foreach ($_POST['add_text'] as $key => $text) {
                $data['text'] = $text;
                $data['href'] = $_POST['add_href'][$key];
                $data['parent'] = $_POST['parent'];
                $MENU->save($data);
            }
        }


to("../back.php?do=" . strtolower($table));
