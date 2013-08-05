<div class="clients form">
<?php echo $this->Form->create('Import'); ?>
	<fieldset>
		<legend><?php echo __('Import Clients'); ?></legend>
	<?php
		echo $this->Form->input('emails',array('type' => 'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
	</ul>
</div>