<script>
    $(function() {
        $('#save_client_note').click(function() {
            $.post('<?php echo site_url('clients/ajax/save_client_note'); ?>', {
                client_id: $('#client_id').val(),
                client_note: $('#client_note').val()
            }, function(data) {
                <?php echo (IP_DEBUG ? 'console.log(data);' : ''); ?>
                var response = JSON.parse(data);
                if (response.success === 1) {
                    // The validation was successful
                    $('.control-group').removeClass('error');
                    $('#client_note').val('');

                    // Reload all notes
                    $('#notes_list').load("<?php echo site_url('clients/ajax/load_client_notes'); ?>", {
                        client_id: <?php echo $client->client_id; ?>
                    }, function(response) {
                        <?php echo (IP_DEBUG ? 'console.log(response);' : ''); ?>
                    });
                } else {
                    // The validation was not successful
                    $('.control-group').removeClass('error');
                    for (var key in response.validation_errors) {
                        $('#' + key).parent().addClass('has-error');
                    }
                }
            });
        });
    });
</script>

<?php
$locations = array();
foreach ($custom_fields as $custom_field) {
    if (array_key_exists($custom_field->custom_field_location, $locations)) {
        $locations[$custom_field->custom_field_location] += 1;
    } else {
        $locations[$custom_field->custom_field_location] = 1;
    }
}
?>

<div id="headerbar">

    <div class="headerbar-item pull-right">
        <div class="btn-group btn-group-sm">
            <a href="#" class="btn btn-default client-create-invoice" data-client-id="<?php echo $client->client_id; ?>">
                <i class="fa fa-file-text"></i> <?php _trans('Rechnung erstellen'); ?></a>
            <a href="<?php echo site_url('clients/form/' . $client->client_id); ?>" class="btn btn-default">
                <i class="fa fa-edit"></i> <?php _trans('edit'); ?>
            </a>
            <a class="btn btn-danger" href="<?php echo site_url('clients/delete/' . $client->client_id); ?>" onclick="return confirm('<?php _trans('delete_client_warning'); ?>');">
                <i class="fa fa-trash-o"></i> <?php _trans('delete'); ?>
            </a>
        </div>
    </div>
    <div class="headerbar-item pull-left">
        <div class="btn-group btn-group-sm index-options">
            <?php foreach ($allclients as $elem_client) { ?>
                <a href="<?php echo site_url('clients/view/' . $elem_client->client_id); ?>" class="btn <?php echo ($elem_client->client_id == $client->client_id)?'btn-primary':'btn-default';  ?> ">
                    <?php _htmlsc(($elem_client->client_name)); ?>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<ul id="submenu" class="nav nav-tabs nav-tabs-noborder">
    <li class="active"><a data-toggle="tab" href="#clientDetails"><?php _trans('details'); ?></a></li>
    <li><a data-toggle="tab" href="#clientInvoices"><?php _trans('Rechnungen'); ?></a></li>
    <li><a data-toggle="tab" href="#clientPayments"><?php _trans('payments'); ?></a></li>
</ul>

<div id="content" class="tabbable tabs-below no-padding">
    <div class="tab-content no-padding">

        <div id="clientDetails" class="tab-pane tab-rich-content active">

            <?php $this->layout->load_view('layout/alerts'); ?>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h2> <?php echo $client->client_name; ?></h2> 
                    <br><?php echo _trans('Iban') . ": " . $client->client_iban; ?>
                    <br><?php echo _trans('Iban Partner') . ": " . $client->client_iban_partner; ?>
                    <hr>
                    <?php $this->layout->load_view('upload/dropzone-client-html'); ?>
                    <?php $this->layout->load_view('clients/partial_client_contract'); ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php echo $invoice_client_table; ?>
                    <table class="table table-bordered no-margin">
                        <tr>
                            <th>
                                <?php _trans('total_billed'); ?>
                            </th>
                            <td class="td-amount">
                                <?php echo format_currency($client->client_invoice_total); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php _trans('total_paid'); ?>
                            </th>
                            <th class="td-amount">
                                <?php echo format_currency($client->client_invoice_paid); ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <?php _trans('total_balance'); ?>
                            </th>
                            <td class="td-amount">
                                <?php echo format_currency($client->client_invoice_balance); ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-12 col-md-6">
                <?php $this->layout->load_view('clients/partial_client_transactions'); ?>
                </div>

            </div>
            <?php if ($client->client_surname != "") : //Client is not a company 
            ?>
                <hr>

                <div class="row">
                    <div class="col-xs-12 col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php _trans('personal_information'); ?>
                            </div>

                            <div class="panel-body table-content">
                                <table class="table no-margin">
                                    <tr>
                                        <th><?php _trans('birthdate'); ?></th>
                                        <td><?php echo format_date($client->client_birthdate); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php _trans('gender'); ?></th>
                                        <td><?php echo format_gender($client->client_gender) ?></td>
                                    </tr>
                                    <?php if ($this->mdl_settings->setting('sumex') == '1') : ?>
                                        <tr>
                                            <th><?php _trans('sumex_ssn'); ?></th>
                                            <td><?php echo format_avs($client->client_avs) ?></td>
                                        </tr>

                                        <tr>
                                            <th><?php _trans('sumex_insurednumber'); ?></th>
                                            <td><?php _htmlsc($client->client_insurednumber) ?></td>
                                        </tr>

                                        <tr>
                                            <th><?php _trans('sumex_veka'); ?></th>
                                            <td><?php _htmlsc($client->client_veka) ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php foreach ($custom_fields as $custom_field) : ?>
                                        <?php if ($custom_field->custom_field_location != 3) {
                                            continue;
                                        } ?>
                                        <tr>
                                            <?php
                                            $column = $custom_field->custom_field_label;
                                            $value = $this->mdl_client_custom->form_value('cf_' . $custom_field->custom_field_id);
                                            ?>
                                            <th><?php _htmlsc($column); ?></th>
                                            <td><?php _htmlsc($value); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <?php
            if ($custom_fields) : ?>
                <hr>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-default no-margin">

                            <div class="panel-heading">
                                <?php _trans('custom_fields'); ?>
                            </div>
                            <div class="panel-body table-content">
                                <table class="table no-margin">
                                    <?php foreach ($custom_fields as $custom_field) : ?>
                                        <?php if ($custom_field->custom_field_location != 0) {
                                            continue;
                                        } ?>
                                        <tr>
                                            <?php
                                            $column = $custom_field->custom_field_label;
                                            $value = $this->mdl_client_custom->form_value('cf_' . $custom_field->custom_field_id);
                                            ?>
                                            <th><?php _htmlsc($column); ?></th>
                                            <td><?php _htmlsc($value); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            <?php endif; ?>

            <hr>


        </div>

        <div id="clientInvoices" class="tab-pane table-content">
            <?php echo $invoice_table; ?>
        </div>

        <div id="clientPayments" class="tab-pane table-content">
            <?php echo $payment_table; ?>
        </div>
    </div>

</div>

<?php $this->layout->load_view('upload/dropzone-client-scripts'); ?>