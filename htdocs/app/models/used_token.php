<?php
/**
 * Implementation file of UsedToken model
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */


/**
 * UsedToken model
 *
 * UsedToken is a model to manage used token, to make sure single OTP
 * token only used once.
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class UsedToken extends AppModel {
    var $primaryKey = 'name';
}
