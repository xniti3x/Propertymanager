<form role="form" method="post" action="<?php echo site_url('vertrag/addVertragPost') ?>">  
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
           value="<?php echo $this->security->get_csrf_hash() ?>">

    <div id="headerbar">
        <h1 class="headerbar-title"><?php _trans('Vertragsform'); ?></h1>
        <?php $this->layout->load_view('layout/header_buttons'); ?>
    </div>
<div class="container">
  <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php _trans('Vertragspartner'); ?>
                        <div class="pull-right">
                            <label for="client_active" class="control-label">
                                <?php _trans('active_client'); ?>
                                <input id="client_active" name="client_active" type="checkbox" value="1"
                                    <?php if ($this->mdl_clients->form_value('client_active') == 1
                                        || !is_numeric($this->mdl_clients->form_value('client_active'))
                                    ) {
                                        echo 'checked="checked"';
                                    } ?>>
                            </label>
                        </div>
                    </div>

                    <div class="panel-body">
                      <div class="form-group has-feedback">
                          <label for="vertrag_date"><?php _trans('Vertragsdatum'); ?></label>

                          <div class="input-group">
                              <input name="vertrag_date" id="vertrag_date"
                                    class="form-control datepicker"
                                    value="<?php echo date(date_format_setting()); ?>">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar fa-fw"></i>
                          </span>
                          </div>
                      </div>
                      <div class="form-group has-feedback">
                      <label for="appartment_id"><?php _trans('Mieter'); ?></label>
                        <div class="input-group">
                          <select name="client_id" id="client_id" class="client-id-select form-control" autofocus="autofocus">
                            <?php foreach ($clients as $client) { ?>
                              <option <?php echo $client->client_id == $client_id ? "selected" : ""; ?> value="<?php echo $client->client_id; ?>"><?php _htmlsc(format_client($client)); ?></option>
                            <?php } ?>

                          </select>
                          <span id="toggle_permissive_search_clients" class="input-group-addon">
                            <a href="<?php echo site_url("clients/form"); ?>"><i class="fa fa-plus"></i></a>
                          </span>
                        </div>
                      </div>

                      <div class="form-group has-feedback"> 
                        <label for="appartment_id"><?php _trans('Appartment'); ?></label>
                        <div class="input-group">
                          <select name="appartment_id" id="appartment_id" class="client-id-select form-control" autofocus="autofocus">
                            <?php foreach ($appartments as $item) { ?>
                              <option value="<?php echo $item->appartment_id; ?>"><?php echo $item->appartment_title; ?></option>
                            <?php } ?>

                          </select>
                          <span id="toggle_permissive_search_clients" class="input-group-addon"><a class="create-appartment" href="#"><i class="fa fa-plus"></i></a></span>
                        </div>
                      </div>
                      
                      <div class="form-group has-feedback">
                          <label for="vertrag_date_created"><?php _trans('Vertragsbeginn'); ?></label>

                          <div class="input-group">
                              <input name="begin" id="begin"
                                    class="form-control datepicker"
                                    value="<?php echo date(date_format_setting()); ?>">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar fa-fw"></i>
                          </span>
                          </div>
                      </div>
                      
                      <div class="form-group has-feedback">
                          <label for="vertrag_date_end"><?php _trans('Vertragsende'); ?></label>

                          <div class="input-group">
                              <input name="ende" id="ende"
                                    class="form-control datepicker"
                                    value="<?php echo date(date_format_setting()); ?>">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar fa-fw"></i>
                          </span>
                          </div>
                      </div>
                    </div>
                </div>

            </div>   
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php _trans('Vertragsdaten'); ?>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                      <label for="kaltmiete">Kaltmiete:</label>
                      <input type="number" class="form-control" id="kaltmiete" name="kaltmiete">
                    </div>
                    
                    <div class="form-group">
                      <label for="nebenkosten">Nebenkosten:</label>
                      <input type="number" class="form-control" id="nebenkosten" name="nebenkosten">
                    </div>

                    <div class="form-group">
                      <label for="kaution">Kautionsbetrag:</label>
                      <input type="number" class="form-control" id="kaution" name="kaution">
                    </div>

                    <div class="form-group">
                      <label for="kautionart">Wie wurde die Kaution bezahlt?</label>
                      <select name="kautionart" id="kautionart" class="form-control" autofocus="autofocus">
                        <option value=""></option>
                        <option value="Bar">Bar</option>
                        <option value="Überweisung">Überweisung</option>
                              

                          </select>
                    </div>  
                </div>
            </div> 
        </div>
</div>
</form>
<div class="error text-danger"><?php echo validation_errors(); ?></div>