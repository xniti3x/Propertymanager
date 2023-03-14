<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th><?php _trans('status'); ?></th>
            <th><?php _trans('Miete'); ?></th>
            <th><?php _trans('Zeitraum'); ?></th>
            <th style="text-align: right;"><?php _trans('amount'); ?></th>
            <th style="text-align: right;"><?php _trans('balance'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $invoice_idx = 1;
        $invoice_count = count($invoices);
        $invoice_list_split = $invoice_count > 3 ? $invoice_count / 2 : 9999;
        foreach ($invoices as $invoice) {
            // Disable read-only if not applicable
            if ($this->config->item('disable_read_only') == true) {
                $invoice->is_read_only = 0;
            }
            // Convert the dropdown menu to a dropup if invoice is after the invoice split
            $dropup = $invoice_idx > $invoice_list_split ? true : false;
            ?>
            <tr>
                <td>
                    <span class="label <?php echo $invoice_statuses[$invoice->invoice_status_id]['class']; ?>">
                        <?php echo $invoice_statuses[$invoice->invoice_status_id]['label'];
                        if ($invoice->invoice_sign == '-1') { ?>
                            &nbsp;<i class="fa fa-credit-invoice" title="<?php echo trans('credit_invoice') ?>"></i>
                        <?php } ?>
                        <?php if ($invoice->is_read_only) { ?>
                            &nbsp;<i class="fa fa-read-only" title="<?php _trans('read_only') ?>"></i>
                        <?php } ?>
                        <?php if ($invoice->invoice_is_recurring) { ?>
                            &nbsp;<i class="fa fa-refresh" title="<?php echo trans('recurring') ?>"></i>
                        <?php } ?>
                    </span>
                </td>

                <td>
                    <a href="<?php echo site_url('invoices/view/' . $invoice->invoice_id); ?>"
                       title="<?php _trans('edit'); ?>">
                        <?php echo($invoice->invoice_number ? $invoice->invoice_number : $invoice->invoice_id); ?>
                    </a>
                </td>
                <td><?php _htmlsc(date_from_mysql($invoice->invoice_period_start) ." bis ".date_from_mysql($invoice->invoice_period_end)); ?></td>

                <td class="amount <?php if ($invoice->invoice_sign == '-1') {
                    echo 'text-danger';
                }; ?>">
                    <?php echo format_currency($invoice->invoice_total); ?>
                </td>

                <td class="amount">
                    <?php echo format_currency($invoice->invoice_balance); ?>
                </td>
            </tr>
            <?php
            $invoice_idx++;
        } ?>
        </tbody>
    </table>
</div>