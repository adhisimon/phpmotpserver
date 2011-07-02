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
