<div class="clients form">
	<?php foreach ($arquivos as $arquivo): ?>
		<?php echo $arquivo; ?></br>
	<?php endforeach ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
	</ul>
</div>