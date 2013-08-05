<div class="infosKeys view">
<h2><?php  echo __('Infos Key'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($infosKey['InfosKey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($infosKey['InfosKey']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($infosKey['InfosKey']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($infosKey['Info']['name'], array('controller' => 'infos', 'action' => 'view', $infosKey['Info']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Infos Key'), array('action' => 'edit', $infosKey['InfosKey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Infos Key'), array('action' => 'delete', $infosKey['InfosKey']['id']), null, __('Are you sure you want to delete # %s?', $infosKey['InfosKey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos Keys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Infos Key'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
