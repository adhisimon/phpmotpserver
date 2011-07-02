<?php
/**
 * GroupsUsersController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * GroupsUsersController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class GroupsUsersController extends AppController {

    function add() {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect('/');
        }

        $this->GroupsUser->save($this->data);
        $this->redirect($this->data['GroupsUser']['redirect']);
    }

}
