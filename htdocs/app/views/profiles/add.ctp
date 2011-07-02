<?php
/**
 * view file of /profiles/add
 *
 * view file to add profile
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo __('Add Profile', true); ?></h2>

<?php

echo $this->Form->create('Profile');

echo $this->Form->input('name');
echo $this->Form->input('secret');
echo $this->Form->input('pin', array('default' => '1111'));
echo $this->Form->input('offset', array('default' => 0));
echo $this->Form->input('group_id');

echo $this->Form->end(__('Save', true));
?>
