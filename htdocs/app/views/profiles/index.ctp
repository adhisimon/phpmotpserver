<?php
/**
 * view of /profiles/index
 *
 * @package phpmotpserver
 * @author Adhidarma <adhisimon@mondial.co.id>
 */
?>

<h2><?php echo __('List of Profiles', true); ?></h2>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort(__('Profilename', true), 'Profile.name'); ?></th>
        <th><?php echo $this->Paginator->sort(__('Created', true), 'Profile.created'); ?></th>
        <th><?php echo $this->Paginator->sort(__('Modified', true), 'Profile.modified'); ?></th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($profiles as $profile): ?>

    <tr>
        <td>

            <?php
                echo $html->link(
                    $profile['Profile']['name'],
                    array(
                        'action' => 'view',
                        $profile['Profile']['id']
                    )
                );
            ?>

        </td>
        <td><?php echo $profile['Profile']['created']; ?></td>
        <td><?php echo $profile['Profile']['modified']; ?></td>

        <td>

            <?php

                echo $html->link(
                    __('Detail', true),
                    array(
                        'action' => 'view',
                        $profile['Profile']['id']
                    )
                );

                echo ' ';

                echo $html->link(
                    __('Edit', true),
                    array(
                        'action' => 'edit',
                        $profile['Profile']['id']
                    )
                );

                echo ' ';

                echo $html->link(
                    __('Delete', true),
                    array(
                        'action' => 'delete',
                        $profile['Profile']['id']
                    ),
                    array(),
                    sprintf(
                        __('Are you sure you want to delete "%s"?', true),
                        $profile['Profile']['name']
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
        __('Add a new profile', true),
        array(
            'action' => 'add'
        )
    );
?>
