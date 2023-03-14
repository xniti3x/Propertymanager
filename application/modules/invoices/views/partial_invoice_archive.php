<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <th><?php _trans('Miete'); ?></th>
            <th><?php _trans('created'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($invoices_archive as $invoice) {
            ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('invoices/download/' . basename($invoice)); ?>"
                       title="<?php _trans('Miete'); ?>">
                        <?php echo basename($invoice); ?>
                    </a>
                </td>

                <td>
                    <?php echo date("F d Y H:i:s.", filemtime($invoice)); ?>
                </td>

            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>
