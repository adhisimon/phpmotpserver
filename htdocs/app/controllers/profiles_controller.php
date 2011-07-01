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
        $profiles = $this->paginate('Profile');
        $this->set(compact('profiles'));
    }

    function add() {
        if (!empty($this->data)) {
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

        } else {

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
            $offset = '';
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

}
