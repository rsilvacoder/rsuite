<div class="infos form">
<?php echo $this->Form->create('Info'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Info'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('active');
		echo $this->Form->input('infos_category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Info.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Info.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('action' => 'index')); ?></li>
	</ul>
</div>
