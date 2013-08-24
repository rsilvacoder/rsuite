<div class="infosKeys index">
	<h2><?php echo __('Infos Keys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('key'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('info_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($infosKeys as $infosKey): ?>
	<tr>
		<td><?php echo h($infosKey['InfosKey']['id']); ?>&nbsp;</td>
		<td><?php echo h($infosKey['InfosKey']['key']); ?>&nbsp;</td>
		<td><?php echo h($infosKey['InfosKey']['value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($infosKey['Info']['name'], array('controller' => 'infos', 'action' => 'view', $infosKey['Info']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $infosKey['InfosKey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $infosKey['InfosKey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $infosKey['InfosKey']['id']), null, __('Are you sure you want to delete # %s?', $infosKey['InfosKey']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Infos Key'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
