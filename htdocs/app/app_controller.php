<?php
/**
 * AppController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * AppController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class AppController extends Controller {

    /**
     * @var array default components used on all controllers
     */
    var $components = array('Auth', 'Session');

    function beforeFilter() {
        parent::beforeFilter();

        if ($this->params['controller'] == 'pages') {
            $this->Auth->allow('*');
        }
    }

}
