<script>
    $(function () {
        // Display the create invoice modal
        $('#create-appartment').modal('show');

        $('#error').val("asd");

        // Creates the invoice
        $('#appartment_create_confirm').click(function () {
            // Posts the data to validate and create the invoice;
            // will create the new client if necessar
            $.post("<?php echo site_url('appartment/addPost'); ?>", {
                appartment_title: $('#appartment_title').val(),
                appartment_qm: $('#appartment_qm').val(),
                appartment_raume: $('#appartment_raume').val()
                },
                function (data) {
                    <?php echo(IP_DEBUG ? 'console.log(data);' : ''); ?>
                    var response = JSON.parse(data);
                    if (response.success === 1) {
                        // The validation was successful and invoice was created
                        window.location.reload();
                    }
                    else {
                        console.log(response);
                        // The validation was not successful
                        $('.control-group').removeClass('has-error');
                        for (var key in response.validation_errors) {
                            $('#' + key).parent().parent().addClass('has-error');
                           
                        }
                    }
                });
        });
    });

</script>

<div id="create-appartment" class="modal fullscreen"
     role="dialog" aria-labelledby="modal_create_invoice" aria-hidden="true">

    <form class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <h4 class="panel-title"><?php _trans('Appartment hinzufügen'); ?></h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" value="" class="form-control " error id="appartment_title" name="appartment_title">
        </div>
            <div class="form-group">
            <label for="raume">raume:</label>
            <input type="text" value="" class="form-control" id="appartment_raume" name="appartment_raume">
        </div>
            <div class="form-group">
            <label for="qm">qm:</label>
            <input type="text" value="" class="form-control" id="appartment_qm" name="appartment_qm">
        </div>
        </div>
        <div class="modal-footer">
            
            <div class="btn-group">
                <button class="btn btn-success ajax-loader" id="appartment_create_confirm" type="button">
                    <i class="fa fa-check"></i> <?php _trans('submit'); ?>
                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i> <?php _trans('cancel'); ?>
                </button>
            </div>
        </div>

    </form>

</div>
