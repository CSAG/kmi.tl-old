<div class="urls form">
<?php echo $this->Form->create('Url'); ?>
	<fieldset>
		<legend><?php echo __('Edit Url'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url');
		echo $this->Form->input('alias');
		echo $this->Form->input('create_date');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Url.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Url.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Urls'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
