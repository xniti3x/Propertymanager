<div class="container">
  <h2>Add Vertrag</h2>
  <form role="form" method="post" action="<?php echo site_url('vertrag/addVertragPost') ?>">
    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

    <div class="form-group has-feedback">
      <label for="client_id"><?php _trans('Mieter'); ?></label>
      <div class="input-group">
        <select name="client_id" id="client_id" class="client-id-select form-control" autofocus="autofocus">
          <?php foreach ($clients as $client) { ?>
            <option <?php echo $client->client_id == $client_id ? "selected" : ""; ?> value="<?php echo $client->client_id; ?>"><?php echo $client->client_id; ?><?php _htmlsc(format_client($client)); ?></option>
          <?php } ?>

        </select>
        <span id="toggle_permissive_search_clients" class="input-group-addon" title="" style="cursor:pointer;"></span>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="appartment_id"><?php _trans('Appartment'); ?></label>
      <div class="input-group">
        <select name="appartment_id" id="appartment_id" class="client-id-select form-control" autofocus="autofocus">
          <?php foreach ($appartments as $item) { ?>
            <option value="<?php echo $item->appartment_id; ?>"><?php echo $item->appartment_id; ?><?php echo $item->appartment_title; ?></option>
          <?php } ?>

        </select>
        <span id="toggle_permissive_search_clients" class="input-group-addon" title="" style="cursor:pointer;"></span>
      </div>
    </div>

    <div class="form-group">
      <label for="vermieter">Vermieter:</label>
      <input type="text" class="form-control" id="vermieter" name="vermieter">
    </div>
    <div class="form-group">
      <label for="vermieter">Adresse:</label>
      <input type="text" class="form-control" id="adresse" name="adresse">
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

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>