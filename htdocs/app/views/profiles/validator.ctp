<?php
/**
 * view of /profiles/validator
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

if (!empty($show_help)) {

    $help_url_in_array = array(
        'controller' => 'pages',
        'action' => 'display',
        'validator_help'
    );

    $help_url = 'http://' . $_SERVER['SERVER_NAME'] . $this->Html->url($help_url_in_array);

    echo sprintf(
        __('Wrong parameters, see how to use on %s', true),
        $this->Html->link(
            $help_url,
            $help_url_in_array
        )
    );

} else {
    echo $result ? 'OK' : 'NOT OK';
}
