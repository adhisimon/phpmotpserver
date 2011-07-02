<?php
/**
 * view of /groups/view
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2>
    <?php echo sprintf(__('%s group', true), $group['Group']['name']); ?>
</h2>

<?php
    echo $this->requestAction(
        array(
            'controller' => 'groups',
            'action' => 'users'
        ),
        array(
            'pass' => array(
                $group['Group']['id']
            ),
            'return'
        )
    );
?>

<?php
    if ($session->read('Auth.User.admin')) {
        echo '<br/>';
        echo $html->link(
            __('Back to list of groups', true),
            array(
                'action' => 'index'
            )
        );
    }
?>
