<div class="requests view">
<h2><?php echo __('Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($request['Request']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($request['Request']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($request['Request']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($request['Request']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($request['Request']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($request['Request']['approved']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Request'), array('action' => 'edit', $request['Request']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Request'), array('action' => 'delete', $request['Request']['id']), null, __('Are you sure you want to delete # %s?', $request['Request']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?> </li>
	</ul>
</div>
