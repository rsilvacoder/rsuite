<div class="campaigns view">
<h2><?php  echo __('Campaign'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), null, __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sents'), array('controller' => 'sents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sent'), array('controller' => 'sents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sents'); ?></h3>
	<?php if (!empty($campaign['Sent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($campaign['Sent'] as $sent): ?>
		<tr>
			<td><?php echo $sent['id']; ?></td>
			<td><?php echo $sent['created']; ?></td>
			<td><?php echo $sent['client_id']; ?></td>
			<td><?php echo $sent['campaign_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sents', 'action' => 'view', $sent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sents', 'action' => 'edit', $sent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sents', 'action' => 'delete', $sent['id']), null, __('Are you sure you want to delete # %s?', $sent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sent'), array('controller' => 'sents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
