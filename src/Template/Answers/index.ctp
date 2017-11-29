<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>


<form class="" action="answers/detail" id="ansForm" method="post">
	<div class="">
		<input type="text" name="dummy" style="display:none;">
		<input type="text" id="indextxt" value="">
		<button type="button" id="indexbtn" value="">検索</button>
	</div>
		<ol><br><br>
			<table>
				<th>タイトル</th>
				<th>内容</th>
				<th>投稿日</th>
				<?php foreach ($witsesArray as $witseslist) {?>
					<form class="" action="answers/detail" method="post">
						<li id="indexlist" style="list-style:none;">
							<tr id="qtable">
								<td><input type="submit" name="wtitle" value="<?php echo $witseslist['title']?>"></td>
								<td name=""><?php echo $witseslist['content'];?></td>
								<td name=""><?php echo $witseslist['Postdate'];?></td>
								<input type="hidden" name="wcontent" value="<?php echo $witseslist['content'];?>">
								<input type="hidden" name="wdate" value="<?php echo $witseslist['Postdate'];?>">
								<input type="hidden" name="witsesId" value=<?php echo $witseslist['id']?>>
								<input type="hidden" name="witsesUId" value=<?php echo $witseslist['user_id']?>>
							</tr>
						</li>
					</form>
				<?php } ?>
			</table>
		</ol>
</form>
