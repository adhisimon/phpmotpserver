<?php
/**
 * MOTP library
 *
 * @package motp-server
 * @version 20110701.1324
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

function motp($otp, $secret, $pin) {
    $tolerate = 3 * 180;
    $epoch1 = time() - $tolerate;
    $epoch2 = $epoch1 + 2 * $tolerate;

    $epoch1 = substr($epoch1, 0, -1);
    $epoch2 = substr($epoch2, 0, -1);

    $retval = false;

    for ($epoch = $epoch1; $epoch <= $epoch2; $epoch++) {
        $plain = $epoch . $secret . $pin;
        $hash = substr(md5($plain), 0, 6);
        if ($hash == $otp) {
            $retval = true;
            break;
        }
    }

    return $retval;
}
