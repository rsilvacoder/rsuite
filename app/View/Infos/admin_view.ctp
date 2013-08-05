<div class="infos view">
<h2><?php  echo __('Info'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($info['Info']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($info['Info']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($info['Info']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($info['Info']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($info['Info']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infos Category'); ?></dt>
		<dd>
			<?php echo h($info['Info']['infos_category']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Info'), array('action' => 'edit', $info['Info']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Info'), array('action' => 'delete', $info['Info']['id']), null, __('Are you sure you want to delete # %s?', $info['Info']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('action' => 'add')); ?> </li>
	</ul>
</div>
