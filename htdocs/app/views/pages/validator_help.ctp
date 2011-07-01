<?php
/**
 * view of /pages/validator_help
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

$controller_and_action = $this->Html->url(array('controller' => 'profiles', 'action' => 'validator'));
?>
<h2><?php echo __('Usage:', true); ?> </h2>

<strong>http://<?php echo $_SERVER['SERVER_NAME'] . $controller_and_action; ?>/username:USERNAME/secret:SECRET/pin:PIN/offset:OFFSET/otp:OTP</strong>

<br/><br/>

<h3>Parameter Description:</h3>

<ul>
    <li>
        <strong>username:</strong>
        <?php echo __('user profile on database (OPTIONAL), e.g.: abc@xyz.com, used to load default value from profile if some optional parameters did not specified', true); ?>
    </li>

    <li>
        <strong>secret:</strong>
        <?php echo __('16 chars secret of MOTP Generator (OPTIONAL, can be loaded from database if username specified), e.g.: 1234567890abcdef', true); ?>
    </li>

    <li>
        <strong>pin:</strong>
        <?php echo __('4 chars PIN (OPTIONAL, can be loaded from database if username specified), e.g.: 1111', true); ?>
    </li>

    <li>
        <strong>offset:</strong>
        <?php echo __('time difference with server in seconds (OPTIONAL, can be loaded from database if username specified), e.g.: 3600', true); ?>
    </li>

    <li>
        <strong>otp:</strong>
        <?php echo __('6 chars of one-time password generated by generator (MANDATORY), e.g.: 1a3d45', true); ?>
    </li>
</ul>

<br/><br/>
<?php echo __('The order of parameters is not important.', true); ?>
