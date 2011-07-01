<?php
/**
 * view of /profiles/view
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo $profile['Profile']['name']; ?></h2>

<?php
    echo sprintf(__('This profile has joined on the database since %s.', true), $profile['Profile']['created']);
    echo ' ';
    echo sprintf(__('Last database modified was on %s.', true), $profile['Profile']['modified']);
?>

<br/>

<br/>
<?php
    echo $html->link(
        sprintf(__('Edit %s', true), $profile['Profile']['name']),
        array(
            'action' => 'edit',
            $profile['Profile']['id']
        )
    );
?>

<br/>
<?php
    echo $html->link(
        __('Back to list of profiles', true),
        array(
            'action' => 'index'
        )
    );
?>

