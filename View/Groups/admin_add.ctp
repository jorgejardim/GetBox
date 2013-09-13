<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Group'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List').' '.__('Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
