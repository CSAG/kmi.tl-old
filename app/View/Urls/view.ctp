<div class="urls view">
<h2><?php echo __('Url'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($url['Url']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($url['Url']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($url['Url']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create Date'); ?></dt>
		<dd>
			<?php echo h($url['Url']['create_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($url['User']['id'], array('controller' => 'users', 'action' => 'view', $url['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Url'), array('action' => 'edit', $url['Url']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Url'), array('action' => 'delete', $url['Url']['id']), null, __('Are you sure you want to delete # %s?', $url['Url']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Urls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Url'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
