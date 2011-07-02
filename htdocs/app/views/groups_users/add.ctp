<?php
/**
 * view of /groups_users/add
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<?php
    echo $form->create('GroupsUser');
    echo $form->input('user_id');
    echo $form->input('group_id');
    echo $form->end('Save');
?>

