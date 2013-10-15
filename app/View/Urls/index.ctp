<div class="urls index">
	<h2><?php echo __('Urls'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('create_date'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($urls as $url): ?>
	<tr>
		<td><?php echo h($url['Url']['id']); ?>&nbsp;</td>
		<td><?php echo h($url['Url']['url']); ?>&nbsp;</td>
		<td><?php echo h($url['Url']['alias']); ?>&nbsp;</td>
		<td><?php echo h($url['Url']['create_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($url['User']['id'], array('controller' => 'users', 'action' => 'view', $url['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $url['Url']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $url['Url']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $url['Url']['id']), null, __('Are you sure you want to delete # %s?', $url['Url']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Url'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
