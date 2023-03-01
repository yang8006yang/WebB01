<?php
include_once "./api/base.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<a title="" href="index.php" alt="<?= $TITLE->find(['sh' => 1])['text']; ?>">
			<div class="ti" style="background:url('./upload/<?= $TITLE->find(['sh' => 1])['img']; ?>'); background-size:cover;"></div>
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->

					<span class="t botli">主選單區</span>
					<?php
					$mm=$MENU->all(['sh'=>1,'parent'=>0]);
					foreach ($mm as $key => $m) {
						echo "<div class='mainmu cent'><a href='{$m['href']}'>{$m['text']}</a>";
						$bb=$MENU->all(['sh'=>1,'parent'=>$m['id']]);
						
						echo "<div class='mw cent'>";
						foreach ($bb as $key => $b) {
							echo "<div class='mainmu2'><a href='{$b['href']}'>{$b['text']}</a></div>";

						}
						echo "</div>";
						echo "</div>";
					}
					?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						<?= $TOTAL->find(1)['text']; ?> </span>
				</div>
			</div>
			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
					<?php
					$ads = $AD->all(['sh' => 1]);
					foreach ($ads as $ad) {
						echo $ad['text'] . "&npbs;&npbs;&npbs;";
					}
					?>
				</marquee>
				<?php
				$do = $_GET['do'] ?? 'main';
				$file = "./front/" . $do . ".php";
				if (file_exists($file)) {
					include_once $file;
				} else {
					include_once "./front/main.php";
				}
				?>
			</div>
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div onclick="pp(1)" class="cent"><img src="./icon/up.jpg" alt=""></div>
					<?php
					$imgs = $IMG->all(['sh' => 1]);
					foreach ($imgs as $key => $img) {
						echo "<div class='im cent' id='ssaa$key'>";
						echo "<img src='./upload/{$img['img']}' width='150px' height='103px'>";
						echo "</div>";
					}
					?>
					<div onclick="pp(2)" class="cent"><img src="./icon/dn.jpg" alt=""></div>
					<script>
						var nowpage = 0,
							num = <?= $IMG->count(['sh' => 1]); ?>

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?= $BOT->find(1)['text']; ?></span>
		</div>
	</div>

</body>

</html>