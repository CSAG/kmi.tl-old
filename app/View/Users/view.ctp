<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Urls'), array('controller' => 'urls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url'), array('controller' => 'urls', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Urls'); ?></h3>
	<?php if (!empty($user['Url'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Create Date'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Url'] as $url): ?>
		<tr>
			<td><?php echo $url['id']; ?></td>
			<td><?php echo $url['url']; ?></td>
			<td><?php echo $url['alias']; ?></td>
			<td><?php echo $url['create_date']; ?></td>
			<td><?php echo $url['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'urls', 'action' => 'view', $url['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'urls', 'action' => 'edit', $url['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'urls', 'action' => 'delete', $url['id']), null, __('Are you sure you want to delete # %s?', $url['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Url'), array('controller' => 'urls', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
