<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>

<form class="" id="ansForm" method="post">
	<div class="">
		<input type="text" id="indextxt" value="">
		<input type="text" name="dummy" style="display:none;">
		<input type="button" id="indexbtn" value="検索">

	</div>
</form>
<br><br>
<table id="reqseltable" align="" class="table">
	<thead>
		<tr>
			<th>タイトル</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>内容</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>投稿日</th>
		</tr>
	</thead>
</table>
<?php foreach ($witsesArray as $witseslist) {?>
<tbody>
	<div class="indexlist">
		<form class="" action="answers/detail" method="post">
			<!-- <li id="indexlist" style="list-style:none;"> -->
			<input type="hidden" name="hidetitle" value="<?= $witseslist['title'];?>">
			<input type="hidden" name="hidecontent" value="<?= $witseslist['content'];?>">
			<input type="hidden" name="hidedate" value="<?= $witseslist['Postdate'];?>">
			<input type="hidden" name="witsesId" value=<?= $witseslist['id'];?>>
			<input type="hidden" name="witsesUId" value=<?= $witseslist['user_id'];?>>
			<button type="submit" name="button">
				<div id="wtitle">
					<?= $witseslist['title'];?>
				</div>
				<div id="wcontent">
					<?= $witseslist['content'];?>
				</div>
				<div id="wdate">
					<?= $witseslist['Postdate'];?>
				</div>
			</button>
			<!-- </li> -->
		</form>
	</div>
</tbody>
<?php } ?>
<input type="button" onclick="location.href='answers/create'" name="" value="投稿">
