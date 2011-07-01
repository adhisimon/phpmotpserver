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
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('User added', true));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id) {
    }

    function view($id) {
    }

    function delete($id) {
    }

}
