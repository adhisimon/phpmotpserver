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
    echo '<br/><br/>';
    echo 'APIKEY: ' . $group['Group']['apikey'];
    echo '<br/>';
    echo $html->link(
        __('Reset APIKEY', true),
        array(
            'action' => 'resetApikey',
            $group['Group']['id']
        ),
        array(),
        __('Are you sure you want to reset APIKEY for this group?', true)
    );
?>


<?php
    echo "<br/><br/>";
    $profiles_count = count($group['Profile']);
    echo sprintf(__n('This group has %d profile.', 'This group has %d profiles.', $profiles_count, true), $profiles_count);
?>

<br/>

<?php
    echo '<br/>';
    echo $html->link(
        __('Back to list of groups', true),
        array(
            'action' => 'index'
        )
    );
?>

<?php
    echo '<br/>';
    echo $html->link(
        __('View list of related OTP Profiles', true),
        array(
            'controller' => 'profiles',
            'action' => 'index',
            'group_id' => $group['Group']['id']
        )
    );
?>
