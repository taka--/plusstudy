<div class="teachMes index">
	<h2><?php echo __('Teach Mes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($teachMes as $teachMe): ?>
	<tr>
		<td><?php echo h($teachMe['TeachMe']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($teachMe['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $teachMe['Account']['id'])); ?>
		</td>
		<td><?php echo h($teachMe['TeachMe']['title']); ?>&nbsp;</td>
		<td><?php echo h($teachMe['TeachMe']['content']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teachMe['TeachMe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $teachMe['TeachMe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teachMe['TeachMe']['id']), array(), __('Are you sure you want to delete # %s?', $teachMe['TeachMe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Teach Me'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('controller' => 'me_toos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('controller' => 'seminars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
	</ul>
</div>
