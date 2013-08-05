<div class="infosCategories view">
<h2><?php  echo __('Infos Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($infosCategory['InfosCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($infosCategory['InfosCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($infosCategory['InfosCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($infosCategory['InfosCategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($infosCategory['InfosCategory']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Infos Category'), array('action' => 'edit', $infosCategory['InfosCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Infos Category'), array('action' => 'delete', $infosCategory['InfosCategory']['id']), null, __('Are you sure you want to delete # %s?', $infosCategory['InfosCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Infos Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
