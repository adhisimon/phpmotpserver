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

    /**
     * @var int default expired time in seconds
     * @author Adhidarma <adhisimon@mondial.co.id>
     */
    var $default_expired = 180;

    /**
     * garbage collector
     * @author Adhidarma <adhisimon@mondial.co.id>
     * @param int $expired time in seconds, default to $default_expired
     * @see $default_expired
     */
    function garbageCollector($expired = null) {
        if (!$expired) {
            $expired = $this->default_expired;
        }

        $min_time = strftime('%Y-%m-%d %T', strtotime("now - $expired secs"));
        $conditions = array(
            'UsedToken.created <' => $min_time,
        );

        $this->deleteAll($conditions, false);
    }
}
