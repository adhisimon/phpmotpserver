<?php
/**
 * Implementation file of UsersController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * UsersController is a controller to manage users
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class UsersController extends AppController {

    function index() {
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

    function add() {
    }

    function edit($id) {
    }

    function view($id) {
    }

    function delete($id) {
    }

}
