<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>


<form class="" action="index.html" id="ansForm" method="post">
	<div class="">
		<input type="text" name="indextxt" value="">
		<button type="button" id="indexbtn" value="">検索</button>
	</div>
		<ol>
			<br><br>
			<?php foreach ($witsesArray as $witseslist) {?>
				<li id="indexlist">
					<table>
						<th>タイトル</th>
						<th>内容</th>
						<th>投稿日</th>
						<tr id="qtable">
							<td id="qtitle"><a href="answers/detail"><?php echo $witseslist['title']?></a></td>
							<td id="qcontent"><?php echo $witseslist['content'];?></td>
							<td><?php echo $witseslist['Postdate'];?></td>
							<input type="hidden" name="" value=<?php $witseslist['id']?>>
							<input type="hidden" name="" value=<?php $witseslist['user_id']?>>
						</tr>
					</table>

				</li>
			<?php } ?>
		</ol>
</form>
