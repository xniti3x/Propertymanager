<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th><?php _trans('active'); ?></th>
            <th><?php _trans('client_name'); ?></th>
            <th><?php _trans('Stockwerk'); ?></th>
            <th><?php _trans('Vertrag'); ?></th>
            <th class="amount"><?php _trans('balance'); ?></th>
            <th><?php _trans('options'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record) : ?>
            <tr>
				<td>
					<?php echo ($record['client']->client_active) ? '<span class="label active">' . trans('yes') . '</span>' : '<span class="label inactive">' . trans('no') . '</span>'; ?>
				</td>
                <td><?php echo anchor('clients/view/' . $record['client']->client_id, htmlsc(format_client($record['client']))); ?></td>
                <td><?php if(isset($record['vertrag']->stockwerk)) _htmlsc($record['vertrag']->stockwerk); ?></td>
                <td><?php if(isset($record['vertrag']->begin) && isset($record['vertrag']->ende))_htmlsc($record['vertrag']->begin .' bis '.$record['vertrag']->ende); ?></td>
                <td class="amount"><?php echo format_currency($record['client']->client_invoice_balance); ?></td>
                <td>
                    <div class="options btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('clients/view/' . $record['client']->client_id); ?>">
                                    <i class="fa fa-eye fa-margin"></i> <?php _trans('view'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('clients/form/' . $record['client']->client_id); ?>">
                                    <i class="fa fa-edit fa-margin"></i> <?php _trans('edit'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="client-create-quote"
                                   data-client-id="<?php echo $record['client']->client_id; ?>">
                                    <i class="fa fa-file fa-margin"></i> <?php _trans('create_quote'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="client-create-invoice"
                                   data-client-id="<?php echo $record['client']->client_id; ?>">
                                    <i class="fa fa-file-text fa-margin"></i> <?php _trans('Miete erstellen'); ?>
                                </a>
                            </li>
                            <li>
                                <form action="<?php echo site_url('clients/delete/' . $record['client']->client_id); ?>"
                                      method="POST">
                                    <?php _csrf_field(); ?>
                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('<?php _trans('delete_client_warning'); ?>');">
                                        <i class="fa fa-trash-o fa-margin"></i> <?php _trans('delete'); ?>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
