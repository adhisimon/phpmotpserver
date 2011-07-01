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
        $this->User->id = $id;

        if (empty($this->data)) {

            $this->data = $this->User->read();

        } else {

            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('Data has been saved', true));
                $this->redirect(array('action' => 'view', $id));
            }

        }
    }

    function view($id) {
        $this->User->id = $id;
        $this->set('user', $this->User->read());
    }

    function delete($id) {
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User has been deleted', true));
        } else {
            $this->Session->setFlash(__('Delete failed', true));
        }

        $this->redirect(array('action' => 'index'));

    }

}
