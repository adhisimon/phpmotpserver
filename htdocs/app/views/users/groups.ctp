<?php
/**
 * view of /users/groups
 *
 * This view is to show groups belongs to a user
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<?php
    echo sprintf(
        __('%s is a member of these groups:', true),
        $user['User']['username']
    );

    foreach ($user['Group'] as $group) {
        echo ' ';

        echo $html->link(
            $group['name'],
            array(
                'controller' => 'groups',
                'action' => 'view',
                $group['id']
            )
        );
    }
?>

<?php
    if ($session->read('Auth.User.admin')) {

        echo "<br/><br/>";

        echo $html->link(
            __('Join to another group', true),
            array(
                'controller' => 'groups',
                'action' => 'join',
                'user_id' => $user['User']['id']
            )
        );

    }
?>