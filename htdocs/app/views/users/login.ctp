<?php
/**
 * view of /users/login
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<?php
    # display authentication message
    $flash_auth = $this->Session->flash('auth');
    if (!preg_match("/$auth_error_message/", $flash_auth)) {
        echo $flash_auth;
    }

    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>

