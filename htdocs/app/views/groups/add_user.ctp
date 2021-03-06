<?php
/**
 * view of /groups/addUser
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2>
    <?php
        echo sprintf(__('Add a new member to %s group', true), $group['Group']['name']);
    ?>
</h2>

<?php
    echo $form->create('GroupsUser', array('url' => array('controller' => 'groups_users', 'action' => 'add')));
    echo $form->input(
        'redirect',
        array(
            'type' => 'hidden',
            'value' => $html->url(array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])),
        )
    );
    echo $form->input(
        'group_id',
        array(
            'type' => 'hidden',
            'value' => $group['Group']['id']
        )
    );
    echo $form->input('user_id');
    echo $form->end('Save');
?>

<?php
    # create a new user
    echo $html->link(
        __('Create a new user', true),
        array(
            'controller' => 'users',
            'action' => 'add'
        )
    );
?>

<br/>

<?php
    # back to group profile
    echo $html->link(
        sprintf(__("Back to %s's detail", true), $group['Group']['name']),
        array(
            'controller' => 'groups',
            'action' => 'view',
            $group['Group']['id']
        )
    );
?>

