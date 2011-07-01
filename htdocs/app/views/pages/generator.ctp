<?php
/**
 * view of ..........
 *
 * @package ...
 * @version ...
 * @since   ...
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2>MOTP Generator</h2>

<?php

if (!empty($_REQUEST['secret'])) {

    $secret = $_REQUEST['secret'];
    $pin = $_REQUEST['pin'];
    $otp = $_REQUEST['otp'];

    App::Import('Lib', 'motp');

    $result = motp_validator($otp, $secret, $pin);
    echo $result ? 'OK' : 'NOT OK';

} else {

    $secret = '';
    $pin = '';
    $otp = '';

}

?>

<?php

    echo $form->create('Pages', array('action' => 'generator'));
    echo $form->input('secret', array('name' => 'secret', 'value' => $secret));
    echo $form->input('pin', array('name' => 'pin', 'value' => $pin));
    echo $form->input('otp', array('name' => 'otp', 'value' => $otp));
    echo $form->end('Validate')

?>
