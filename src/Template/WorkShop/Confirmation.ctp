<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();

?>

	<?php
	 	if ($this->request->is('post')) {
	 		# code...
	 	}
 	?>
