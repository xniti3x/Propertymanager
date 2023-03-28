<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Vermieter</th>
                <th>Appartment</th>
                <th>Zeitraum</th>
                <th>Mieter</th>
                <th>Räumlichkeiten</th>
                <th><?php _trans('options'); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vertrags as $vertrag) { ?>
                <tr>
                    <td><?php echo ($vertrag->id); ?></td>
                    <td><?php echo ($vertrag->vermieter); ?></td>
                    <td><?php echo ($vertrag->appartment_title); ?></td>
                    <td><?php echo ($vertrag->begin . " - " . $vertrag->ende); ?></td>
                    <td>
                        <a href="<?php echo site_url('clients/view/' . $vertrag->client_id); ?>" title="<?php _trans('view_client'); ?>">
                            <?php echo $vertrag->client_name . " | " . $vertrag->client_address_1 . " | " . $vertrag->client_city; ?>
                        </a>
                    </td>
                    <td><?php echo ($vertrag->appartment_raume); ?></td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a target="blank" href="<?php echo site_url('vertrag/viewVertrag/' . $vertrag->id); ?>">
                                        <i class="fa fa-eye fa-margin"></i>
                                        <?php _trans('view'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a target="blank" href="<?php echo site_url('vertrag/editVertrag/' . $vertrag->id); ?>">
                                        <i class="fa fa-edit fa-margin"></i>
                                        <?php _trans('edit'); ?>
                                    </a>
                                </li>
                                <li>
                                    <form action="<?php echo site_url('vertrag/delVertrag/' . $vertrag->id); ?>" method="POST">
                                        <?php _csrf_field(); ?>
                                        <button type="submit" class="dropdown-button" onclick="return confirm('<?php _trans('delete_record_warning'); ?>');">
                                            <i class="fa fa-trash-o fa-margin"></i> <?php _trans('delete'); ?>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>