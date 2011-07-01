<?php
/**
 * view of /users/view
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo $user['User']['username']; ?></h2>

<?php
    echo sprintf(__('This user has joined on the database since %s.', true), $user['User']['created']);
    echo ' ';
    echo sprintf(__('Last database modified was on %s.', true), $user['User']['modified']);
?>

<br/>

<br/>
<?php
    echo $html->link(
        sprintf(__('Edit %s', true), $user['User']['username']),
        array(
            'action' => 'edit',
            $user['User']['id']
        )
    );
?>

<br/>
<?php
    echo $html->link(
        __('Back to list of users', true),
        array(
            'action' => 'index'
        )
    );
?>

