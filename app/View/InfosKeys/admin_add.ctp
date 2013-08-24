<div class="infosKeys form">
<?php echo $this->Form->create('InfosKey'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Infos Key'); ?></legend>
	<?php
		echo $this->Form->input('key');
		echo $this->Form->input('value');
		echo $this->Form->input('info_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Infos Keys'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
