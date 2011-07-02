<?php
/**
 * Implementation file of UsersController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * UsersController is a controller to manage user
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class UsersController extends AppController {

    var $components = array('Auth', 'Session');

    /**
     * action to show index of available users registered on the system
     */
    function index() {
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

    /**
     * action to add a new user
     */
    function add() {
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('User added', true));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * action to edit a user
     * @params int $id user to edit
     */
    function edit($id) {

        # disable this action
        $this->redirect(array('action' => 'index'));

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

    /**
     * action to view a user's detail
     * @params int $id user to view
     */
    function view($id) {
        $this->User->id = $id;
        $this->set('user', $this->User->read());
    }

    /**
     * action to delete a user
     * @params int $id user to delete
     */
    function delete($id) {
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User has been deleted', true));
        } else {
            $this->Session->setFlash(__('Delete failed', true));
        }

        $this->redirect(array('action' => 'index'));
    }

    /**
     * action to edit user's password
     * @params int $id user to edit his password
     */
    function editPassword($id) {
        $this->User->id = $id;
        $user = $this->User->read();
        $this->set('user', $user);

        if (!empty($this->data)) {

            # check if new passwords match
            if ($this->data['User']['password'] != $this->data['User']['password1']) {
                $this->Session->setFlash(__("Password didn't match", true));
                return false;
            }

            #$hashed_password = $this->Auth->hashPassword($this->data);
            #debug($hashed_password); die;

            $this->User->saveField('password', $this->Auth->password($this->data['User']['password']));

            $this->Session->setFlash(__('Password has been saved', true));
            $this->redirect(array('action' => 'view', $id));
        }
    }

    /**
     * action for login
     */
    function login() {
        $this->set('auth_error_message', $this->Auth->authError);
    }

    /**
     * action for logout
     */
    function logout() {
        $this->redirect($this->Auth->logout());
    }

}
