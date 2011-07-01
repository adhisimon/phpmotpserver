<?php
/**
 * view file of /users/add
 *
 * view file to add user
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2>

    <?php
        echo $html->link(
            $this->data['User']['username'],
            array(
                'action' => 'view',
                $this->data['User']['id'],
            )
        );
    ?>

</h2>

<?php

echo $this->Form->create('User');

echo $this->Form->input('username');
echo $this->Form->input('secret');
echo $this->Form->input('pin');
echo $this->Form->input('offset');

echo $this->Form->end(__('Save', true));
?>

<br/>

<?php
    echo $html->link(
        __('Back to list of users', true),
        array(
            'action' => 'index'
        )
    );
?>
