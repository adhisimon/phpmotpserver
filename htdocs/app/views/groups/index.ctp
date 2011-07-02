<?php
/**
 * view of /groups/index
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo __('List of Groups', true); ?></h2>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort(__('Name', true), 'Group.name'); ?></th>
        <th><?php echo $this->Paginator->sort(__('Created', true), 'Group.created'); ?></th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($groups as $group): ?>

    <tr>
        <td>

            <?php
                echo $html->link(
                    $group['Group']['name'],
                    array(
                        'action' => 'view',
                        $group['Group']['id']
                    )
                );
            ?>

        </td>
        <td><?php echo $group['Group']['created']; ?></td>

        <td>

            <?php

                echo $html->link(
                    __('Detail', true),
                    array(
                        'action' => 'view',
                        $group['Group']['id']
                    )
                );

                echo ' ';

                echo $html->link(
                    __('Delete', true),
                    array(
                        'action' => 'delete',
                        $group['Group']['id']
                    ),
                    array(),
                    sprintf(
                        __('Are you sure you want to delete "%s"?', true),
                        $group['Group']['name']
                    )
                );

            ?>

        </td>
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
        __('Add a new group', true),
        array(
            'action' => 'add'
        )
    );
?>
