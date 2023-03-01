<div style="height:32px; display:block;"></div>
<!--正中央-->
<div style="text-align:center;">
	<?php
		$div = 5;
		$all = $NEWS->count(['sh' => 1]);
		$now = $_GET['p'] ?? 1;
		$start = ($now - 1) * $div;
		$pages = ceil($all / $div);
		
		echo "<ol start='($start+1)'>";
		$news = $NEWS->all(['sh' => 1], " LIMIT $start,$div");
		foreach ($news as $key => $new) {
			echo "<li class='sswww'>";
			echo substr($new['text'], 0, 20);
			echo "<div class='all' style='display:none;'>{$new['text']}</div>";
			echo "...</li>";
		}
		?>
	</ol>
	<div class="cent">

		<?php
		if (($now - 1) > 0) {
			$prev = $now - 1;
			echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$prev'> < </a>";
		}
		for ($i = 1; $i <= $pages; $i++) {
			$n = ($i == $now) ? 'red' : 'black';
			echo "<a href='?do=news&p=$i' class='$n'> $i </a>";
		}
		if (($now + 1) <= $pages) {
			$next = $now + 1;
			echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$next'> > </a>";
		}
		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			console.log(123)
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>