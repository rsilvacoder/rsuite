<div class="infosCategories form">
<?php echo $this->Form->create('InfosCategory'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Infos Category'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Infos Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
