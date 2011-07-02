<?php
/**
 * view of /groups/users
 *
 * This view is to show users belongs to a group
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<?php
    echo sprintf(
        __('User who are member of %s:', true),
        $group['Group']['name']
    );

    echo '<br/>';

    foreach ($group['User'] as $user) {
        echo ' ';

        echo $html->link(
            $user['username'],
            array(
                'controller' => 'users',
                'action' => 'view',
                $user['id']
            )
        );
    }
?>

<?php
    if ($session->read('Auth.User.admin')) {

        echo "<br/><br/>";

        echo $html->link(
            __('Add another user as a member', true),
            array(
                'controller' => 'groups',
                'action' => 'addUser',
                $group['Group']['id']
            )
        );

    }
?>
