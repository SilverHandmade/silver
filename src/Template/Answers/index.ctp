<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>


<form class="" action="detail" id="ansForm" method="post">
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
				<tbody>
					<form class="" action="detail" method="post">
						<li id="indexlist" style="list-style:none;">
							<tr id="qtable">
								<td id="witsestitle"><input type="submit" id="titlebtn" value="<?php echo $witseslist['title']?>"></td>
								<td id="wcontent"><?php echo $witseslist['content'];?></td>
								<td id="wdate"><?php echo $witseslist['Postdate'];?></td>
								<input type="hidden" name="hidetitle" value="<?php echo $witseslist['title']?>">
								<input type="hidden" name="hidecontent" value="<?php echo $witseslist['content'];?>">
								<input type="hidden" name="hidedate" value="<?php echo $witseslist['Postdate'];?>">
								<input type="hidden" name="witsesId" value=<?php echo $witseslist['id']?>>
								<input type="hidden" name="witsesUId" value=<?php echo $witseslist['user_id']?>>
							</tr>
						</li>
					</form>
				</tbody>
				<?php } ?>
			</table>
		</ol>
</form>
	<input type="button" onclick="location.href='create'" name="" value="投稿">
