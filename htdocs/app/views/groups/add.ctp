<?php
/**
 * view file of /groups/add
 *
 * view file to add group
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo __('Create Group', true); ?></h2>

<?php

echo $this->Form->create('Group');

echo $this->Form->input('name');

echo $this->Form->end(__('Save', true));
?>
