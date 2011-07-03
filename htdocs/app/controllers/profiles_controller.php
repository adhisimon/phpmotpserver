<?php
/**
 * Implementation file of ProfilesController
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */

/**
 * ProfilesController is a controller to manage profiles
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
class ProfilesController extends AppController {

    var $components = array('RequestHandler');
    var $uses = array('Profile', 'UsedToken');

    function index() {
        $conditions = array();

        if ($this->Auth->User('admin')) {

            if (!empty($this->params['named']['group_id'])) {
                $conditions['group_id'] = $this->params['named']['group_id'];
            }

        } else {
            $user_id = $this->Auth->User('id');

            $groups = array_keys($this->requestAction("/users/groupsList/$user_id"));

            if (!empty($this->params['named']['group_id'])) {
                $groups = array_intersect($groups, array($this->params['named']['group_id']));
            }

            $conditions['group_id'] = $groups;
        }

        if (!empty($this->params['named']['group_id'])) {
            $group_name = $this->Profile->Group->field('Group.name', array('Group.id' => $this->params['named']['group_id']));
            $this->set('group_name', $group_name);
        }

        $profiles = $this->paginate('Profile', $conditions);
        $this->set(compact('profiles'));
    }

    function add() {

        if (empty($this->data)) {

            if ($this->Auth->User('admin')) {

                $groups = $this->Profile->Group->find('list');

            } else {

                $user_id = $this->Auth->User('id');
                $groups = $this->requestAction("/users/groupsList/$user_id");

            }
            $this->set('groups', $groups);

            if (!empty($this->params['named']['group_id'])) {
                $this->set('group_id', $this->params['named']['group_id']);
            }

        } else {
            if ($this->Profile->save($this->data)) {
                $this->Session->setFlash(__('Profile added', true));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id) {
        $this->Profile->id = $id;

        if (empty($this->data)) {

            $this->data = $this->Profile->read();

            if ($this->Auth->User('admin')) {

                $groups = $this->Profile->Group->find('list');

            } else {

                $user_id = $this->Auth->User('id');
                $groups = $this->requestAction("/users/groupsList/$user_id");

            }
            $this->set('groups', $groups);

            if (!empty($this->params['named']['group_id'])) {
                $this->set('group_id', $this->params['named']['group_id']);
            }

        } else {

            # validation
            $this->Profile->set($this->data);
            if (!$this->Profile->validates()) {
                foreach($this->Profile->invalidFields() as $error_message) {
                    $this->Session->setFlash($error_message);
                }
                $this->data = $this->Profile->read();
                return false;
            }

            # save
            if ($this->Profile->save($this->data)) {
                $this->Session->setFlash(__('Data has been saved', true));
                $this->redirect(array('action' => 'view', $id));
            }

        }
    }

    function view($id) {
        $this->Profile->id = $id;
        $this->set('profile', $this->Profile->read());
    }

    function delete($id) {
        if ($this->Profile->delete($id)) {
            $this->Session->setFlash(__('Profile has been deleted', true));
        } else {
            $this->Session->setFlash(__('Delete failed', true));
        }

        $this->redirect(array('action' => 'index'));

    }

    /**
     * function to validate OTP
     */
    function validator() {

        # first, run garbage collector
        $this->UsedToken->garbageCollector();

        # check if requested by ordinary web browser or not
        if ($this->RequestHandler->accepts('text')) {
            $this->layout = 'ajax';
        }

        if (!empty($this->params['named']['otp'])) {
            $otp = $this->params['named']['otp'];
        } else {
            $otp = '';
        }

        # check if token has been used
        $used_token = $this->UsedToken->findByName($otp);
        if ($used_token) {
            $this->set('result', false);
            return false;
        }

        if (!empty($this->params['named']['username'])) {
            $this->Profile->recursive = -1;
            $profile = $this->Profile->findByName($this->params['named']['username']);
        } else {
            $profile = array();
        }

        if (!empty($this->params['named']['secret'])) {
            $secret = $this->params['named']['secret'];
        } elseif ($profile) {
            $secret = $profile['Profile']['secret'];
        } else {
            $secret = '';
        }

        if (!empty($this->params['named']['pin'])) {
            $pin = $this->params['named']['pin'];
        } elseif ($profile) {
            $pin = $profile['Profile']['pin'];
        } else {
            $pin = '';
        }

        if (!empty($this->params['named']['offset'])) {
            $offset = $this->params['named']['offset'];
        } elseif ($profile) {
            $offset = $profile['Profile']['offset'];
        } else {
            $offset = '0';
        }

        # check if we've been called rightly
        if (empty($secret) or empty($pin) or empty($otp)) {
            $this->set('show_help', true);
        }

        App::Import('Lib', 'motp');
        $result = motp_validator($otp, $secret, $pin);

        if ($result) {
            // store otp to UsedToken so it can only be used one time
            $this->UsedToken->create();
            $this->UsedToken->saveField('name', $otp);
        }

        $this->set('result', $result);
        return $result;
    }

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('validator');
    }

}
