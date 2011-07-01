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

}
