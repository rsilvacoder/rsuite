<div class="infos index">
	<h2><?php echo __('Infos'); ?>
		<?php if (!empty($infos_category['InfosCategory']['name'])): ?>
			/ <?php echo $infos_category['InfosCategory']['name']; ?>
		<?php endif ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('infos_category'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($infos as $info): ?>
	<tr>
		<td><?php echo h($info['Info']['id']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['name']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['created']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['modified']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['active']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['infos_category']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $info['Info']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $info['Info']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $info['Info']['id']), null, __('Are you sure you want to delete # %s?', $info['Info']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Info'), array('action' => 'add')); ?></li>
	</ul>
</div>
