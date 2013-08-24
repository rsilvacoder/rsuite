<div class="campaigns form">
<?php echo $this->Form->create('Campaign'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Campaign'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sents'), array('controller' => 'sents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sent'), array('controller' => 'sents', 'action' => 'add')); ?> </li>
	</ul>
</div>
