<?php
/**
 * Implementation of User model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * User model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class User extends AppModel {
    var $validate = array(
        'username' => array(
            'rule' => 'email',
            'message' => 'Must be a valid email address.',
            'on' => 'create',
        )
    );

    var $hasAndBelongsToMany = array(
        'Group'
    );
}
