<div class="panel panel-default no-margin">

    <div class="panel-heading">
        <?php _trans('Bank - Transactionen'); ?>
    </div>
    <div class="panel-body table-content">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><?php _trans('ID'); ?></th>
                        <th><?php _trans('bookingDate'); ?></th>
                        <th><?php _trans('transactionAmount'); ?></th>
                        <th><?php _trans('Bezeichnung'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction) { ?>
                        <tr>
                            <td><?php echo $transaction->id; ?></td>
                            <td><?php echo $transaction->bookingDate; ?></td>
                            <td><?php echo $transaction->transactionAmount; ?>€</td>
                            <td><?php echo $transaction->remittanceInformationStructured; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>