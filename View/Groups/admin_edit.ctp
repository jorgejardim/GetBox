<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('reference');
		echo $this->Form->input('admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List').' '.__('Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
