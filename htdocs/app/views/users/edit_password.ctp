<?php
/**
 * view of /users/editPassword
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>
<h2>
    <?php
        echo sprintf(__("Edit password for %s", true), $user['User']['username']);
    ?>
</h2>

<?php

echo $this->Form->create(
    'User',
    array(
        'url' => array(
            $user['User']['id']
        )
    )
);

echo $this->Form->label('', __('Type a new password:', true));
echo $this->Form->password('password');
echo $this->Form->label('', __('Retype new password:', true));
echo $this->Form->password('password1');

echo $this->Form->end(__('Save', true));

?>

<?php
    if ($session->read('Auth.User.admin')) {
        echo '<br/>';
        echo $html->link(
            __('Back to list of users', true),
            array(
                'action' => 'index'
            )
        );
    }
?>

<br/>
<?php
    echo $html->link(
        __('Back to your profile', true),
        array(
            'action' => 'view'
        )
    );
?>
