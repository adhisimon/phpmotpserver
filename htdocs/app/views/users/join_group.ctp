<?php
/**
 * view of /users/join_group
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2>
    <?php
        echo sprintf(__('Register %s to:', true), $user['User']['username']);
    ?>
</h2>

<?php
    echo $form->create('GroupsUser', array('url' => array('controller' => 'groups_users', 'action' => 'add')));
    echo $form->input(
        'redirect',
        array(
            'type' => 'hidden',
            'value' => $html->url(array('controller' => 'users', 'action' => 'view', $user['User']['id'])),
        )
    );
    echo $form->input(
        'user_id',
        array(
            'type' => 'hidden',
            'value' => $user['User']['id']
        )
    );
    echo $form->input('group_id');
    echo $form->end('Save');
?>
