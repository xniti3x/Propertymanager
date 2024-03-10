<form role="form" method="post" action="<?php echo site_url("vertrag/editVertragPost"); ?>" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

<input type="hidden" value="<?php echo $vertrag->id ?>" name="vertrag_id">

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
                      <label for="appartment_id"><?php _trans('Mieter'); ?></label>
                        <div class="input-group">
                        <select name="client_id" id="client_id" class="client-id-select form-control" autofocus="autofocus">
                          <?php foreach ($clients as $client) { ?>
                            <option <?php echo $client->client_id == $vertrag->client_id ? "selected" : ""; ?> value="<?php echo $client->client_id; ?>"><?php _htmlsc(format_client($client)); ?></option>
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
                              <option <?php echo $vertrag->appartment_id==$item->appartment_id ? "selected" : ""; ?> value="<?php echo $item->appartment_id; ?>"><?php echo $item->appartment_title; ?></option>
                            <?php } ?>

                          </select>
                          <span id="toggle_permissive_search_clients" class="input-group-addon"><a class="create-appartment" href="#"><i class="fa fa-plus"></i></a></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="begin">Begin:</label>
                        <input type="date" value="<?php echo $vertrag->begin ?>" class="form-control" id="begin" name="begin">
                      </div>
                      
                      <div class="form-group">
                        <label for="ende">Ende:</label>
                        <input type="date" value="<?php echo $vertrag->ende ?>" class="form-control" id="ende" name="ende">
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
                      <input type="number" value="<?php echo $vertrag->kaltmiete ?>" class="form-control" id="kaltmiete" name="kaltmiete">
                    </div>
                    
                    <div class="form-group">
                      <label for="nebenkosten">Nebenkosten:</label>
                      <input type="number" value="<?php echo $vertrag->nebenkosten ?>" class="form-control" id="nebenkosten" name="nebenkosten">
                    </div>

                    <div class="form-group">
                      <label for="kaution">Kautionsbetrag:</label>
                      <input type="number" value="<?php echo $vertrag->kaution ?>" class="form-control" id="kaution" name="kaution">
                    </div>

                    <div class="form-group">
                      <label for="kautionart">Wie wurde die kaution bezahlt?</label>
                      <input type="text" value="<?php echo $vertrag->kautionart ?>" class="form-control" id="kautionart" name="kautionart">
                    </div>  
                </div>
            </div> 
        </div>
</div>
</form>