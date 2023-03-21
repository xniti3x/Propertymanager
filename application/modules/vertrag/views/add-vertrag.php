<div class="container">
  <h2>Add Vertrag</h2>  
    <form role="form" method="post" action="<?php echo site_url('vertrag/addVertragPost')?>" >
    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"value="<?php echo $this->security->get_csrf_hash() ?>">
      
      <div class="form-group has-feedback">
          <label for="client_id"><?php _trans('Mieter'); ?></label>
          <div class="input-group">
              <select name="client_id" id="client_id" class="client-id-select form-control"
                      autofocus="autofocus">
                  
                    <?php foreach($clients as $client){?>
                      <option <?php echo $client->client_id==$client_id?"selected":""; ?> value="<?php echo $client->client_id; ?>"><?php _htmlsc(format_client($client)); ?></option>
                    <?php } ?>
                  
              </select>
              <span id="toggle_permissive_search_clients" class="input-group-addon"
                    title="<?php _trans('enable_permissive_search_clients'); ?>" style="cursor:pointer;">
                  <i class="fa fa-toggle-<?php echo get_setting('enable_permissive_search_clients') ? 'on' : 'off' ?> fa-fw"></i>
              </span>
          </div>
      </div
    
      <div class="form-group">
        <label for="vermieter">Vermieter:</label>
        <input type="text" class="form-control" id="vermieter" name="vermieter">
        <input type="hidden" class="form-control" id="client_id" name="client_id" value="<?php echo $client_id; ?>">
      <div class="form-group">
        <label for="wohnfleche">Wohnfleche:</label>
        <input type="text" class="form-control" id="wohnfleche" name="wohnfleche">
      </div>
            <div class="form-group">
        <label for="stockwerk">Stockwerk:</label>
        <input type="text" class="form-control" id="stockwerk" name="stockwerk">
      </div>
            <div class="form-group">
        <label for="wohnzweck">Wohnzweck:</label>
        <input type="text" class="form-control" id="wohnzweck" name="wohnzweck" placeholder="Wohnzwecken | Geschäftlich">
      </div>
            <div class="form-group">
        <label for="adresse">Adresse vom Objekt:</label>
        <input type="text" class="form-control" id="adresse" name="adresse">
      </div>
            <div class="form-group">
        <label for="raumlichkeiten">Räumlichkeiten:</label>
        <input type="text" class="form-control" id="raumlichkeiten" name="raumlichkeiten" placeholder="3 Zimmer, 1 Küche, Bad/WC, 1 Diele, 1 Balkon, 1 Kellerraum ca. 6 qm, 1 Stellpaltz">
      </div>
            <div class="form-group">
        <label for="kaltmiete">Kaltmiete:</label>
        <input type="text" class="form-control" id="kaltmiete" name="kaltmiete">
      </div>
            <div class="form-group">
        <label for="nebenkosten">Nebenkosten:</label>
        <input type="text" class="form-control" id="nebenkosten" name="nebenkosten">
      </div>
            <div class="form-group">
        <label for="iban">Iban:</label>
        <input type="text" class="form-control" id="iban" name="iban">
      </div>
            <div class="form-group">
        <label for="kaution">Kaution:</label>
        <input type="text" class="form-control" id="kaution" name="kaution">
      </div>
            <div class="form-group">
        <label for="kautionart">Kautionart:</label>
        <input type="text" class="form-control" id="kautionart" name="kautionart">
      </div>
            <div class="form-group">
        <label for="begin">Begin:</label>
        <input type="text" class="form-control" id="begin" name="begin">
      </div>
            <div class="form-group">
        <label for="ende">Ende:</label>
        <input type="text" class="form-control" id="ende" name="ende">
      </div>
            <div class="form-group">
        <label for="selbstbeteiligung">Selbstbeteiligung:</label>
        <input type="text" class="form-control" id="selbstbeteiligung" name="selbstbeteiligung">
      </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>