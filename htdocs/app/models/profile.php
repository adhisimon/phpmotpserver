<?php
/**
 * Implementation file Profile model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * Implementation file Profile model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class Profile extends AppModel {

    /**
     * @var array validation rule of Profile
     */
    var $validate = array(
        'secret' => array(
            'rule' => '/^[a-f0-9]{16,}$/i',
            'message' => 'Please put 16 hexadecimal as a "Secret"',
        ),
        'pin' => array(
            'rule' => 'numeric',
            'message' => 'Please put 4 digits numeric as a "PIN"'
        ),
        'offset' => array(
            'rule' => 'numeric',
            'message' => 'Please an integer as an "Offset"'
        ),
    );
}
