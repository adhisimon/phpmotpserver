<?php
/**
 * Implementation file of GroupUser model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * GroupUser model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class GroupUser extends AppModel {
    var $belongsTo = array(
        'User',
        'Group',
    );
}
