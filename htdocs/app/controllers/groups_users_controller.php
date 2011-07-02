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

    function delete($group_id, $user_id) {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect('/');
        }

        $conditions = array(
            'user_id' => $user_id,
            'group_id' => $group_id
        );

        if ($this->GroupsUser->deleteAll($conditions)) {
            $this->Session->setFlash(__('Data has been saved', true));
        } else {
            $this->Session->setFlash(__('Failed to save data', true));
        }

        $this->redirect($this->referer());
    }

}
