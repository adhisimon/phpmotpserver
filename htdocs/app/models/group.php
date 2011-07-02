<?php
/**
 * Implementation of Group model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * Group model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class Group extends AppModel {
    var $hasAndBelongsToMany = array(
        'User'
    );
}
