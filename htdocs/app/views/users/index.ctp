<?php
/**
 * view of /users/index
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo __('List of Users', true); ?></h2>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort(__('Username', true), 'User.username'); ?></th>
        <th><?php echo $this->Paginator->sort(__('Created', true), 'User.created'); ?></th>
        <th><?php echo $this->Paginator->sort(__('Modified', true), 'User.modified'); ?></th>
    </tr>

    <?php foreach ($users as $user): ?>

    <tr>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $user['User']['modified']; ?></td>
    </tr>

    <?php endforeach; ?>

</table>

<!-- Shows the page numbers -->
<?php echo $this->Paginator->numbers(); ?>

<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>

<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>

<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>

<br /><br />
<?php
    echo $html->link(
        __('Add a new user', true),
        array(
            'action' => 'add'
        )
    );
?>
