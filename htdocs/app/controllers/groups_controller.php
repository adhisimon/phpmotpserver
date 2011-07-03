<?php
/**
 * Implementation file of GroupsController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * GroupsController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class GroupsController extends AppController {

    /**
     * action to show list of groups
     */
    function index() {

        # limit groups to show if user is not an admin
        if (!$this->Auth->User('admin')) {
            $groups_to_show = $this->requestAction(
                array(
                    'controller' => 'users',
                    'action' => 'groupsList',
                    'pass' => array(
                        $this->Auth->User('id')
                    )
                )
            );
            $conditions['Group.id'] = array_keys($groups_to_show);
        } else {
            $conditions = array();
        }


        $groups = $this->paginate('Group', $conditions);
        $this->set(compact('groups'));
    }

    /**
     * action to create a new group
     */
    function add() {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect('/');
        }

        if (!empty($this->data)) {
            if ($this->Group->save($this->data)) {
                $this->Session->setFlash(__('Group added', true));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * action to edit a group
     * @params int $id group to edit
     */
    function edit($id) {
    }

    /**
     * action to view group's detail
     * @params int $id group to view
     */
    function view($id) {
        if (!$this->Auth->User('admin')) {

            $users = $this->usersList($id);

            if (!isset($users[$this->Auth->User('id')])) {
                $this->Session->setFlash($this->Auth->authError);
                $this->redirect('/');
            }

        }

        $this->Group->id = $id;
        $this->set('group', $this->Group->read());
    }

    /**
     * action to delete a group
     * @params int $id group to be deleted
     */
    function delete($id) {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect('/');
        }

        if ($this->Group->delete($id)) {
            $this->Session->setFlash(__('Group has been deleted', true));
        } else {
            $this->Session->setFlash(__('Delete failed', true));
        }

        $this->redirect(array('action' => 'index'));
    }

    /**
     * action to join a group
     * @params int $group_id group to join
     * @params int $user_id user who wants to join
     */
    function join() {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect(array('action' => 'view', $group_id));
        }
    }

    /**
     * action to show users who are members of a group
     * @params int $group_id group to show
     */
    function users($group_id) {
        $this->Group->id = $group_id;
        $group = $this->Group->read();
        $this->set('group', $group);
        return $group['User'];
    }

    function usersList($group_id) {
        $users = $this->users($group_id);
        foreach ($users as $user) {
            $retval[$user['id']] = $user['username'];
        }
        return $retval;
    }

    /**
     * action to add a user as a member
     */
    function addUser($id = null) {
        if (!$this->Auth->User('admin')) {
            $this->Session->setFlash($this->Auth->authError);
            $this->redirect('/');
        }

        $this->Group->id = $id;
        $group = $this->Group->read();
        $this->set('group', $group);
        $this->set('users', $this->Group->User->find('list'));
    }

}
