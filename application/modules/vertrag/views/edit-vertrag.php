<div class="container">

  <h2>Update Vertrag</h2>  
<form role="form" method="post" action="<?php echo site_url("vertrag/")?>editVertragPost" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"value="<?php echo $this->security->get_csrf_hash() ?>">

 <input type="hidden" value="<?php echo $vertrag->id ?>"   name="vertrag_id">


  <div class="form-group">
    <label for="vermieter">Vermieter:</label>
    <input type="text" value="<?php echo $vertrag->vermieter ?>" class="form-control" id="vermieter" name="vermieter">
  </div>
    <div class="form-group">
    <label for="stockwerk">Stockwerk:</label>
    <input type="text" value="<?php echo $vertrag->wohnfleche ?>" class="form-control" id="stockwerk" name="stockwerk">
  </div>
    <div class="form-group">
    <label for="wohnfleche">Wohnfleche:</label>
    <input type="text" value="<?php echo $vertrag->wohnfleche ?>" class="form-control" id="wohnfleche" name="wohnfleche">
  </div>
    <div class="form-group">
    <label for="wohnzweck">Wohnzweck:</label>
    <input type="text" value="<?php echo $vertrag->wohnzweck ?>" class="form-control" id="wohnzweck" name="wohnzweck">
  </div>
    <div class="form-group">
    <label for="adresse">Adresse:</label>
    <input type="text" value="<?php echo $vertrag->adresse ?>" class="form-control" id="adresse" name="adresse">
  </div>
    <div class="form-group">
    <label for="raumlichkeiten">Raumlichkeiten:</label>
    <input type="text" value="<?php echo $vertrag->raumlichkeiten ?>" class="form-control" id="raumlichkeiten" name="raumlichkeiten">
  </div>
    <div class="form-group">
    <label for="kaltmiete">Kaltmiete:</label>
    <input type="text" value="<?php echo $vertrag->kaltmiete ?>" class="form-control" id="kaltmiete" name="kaltmiete">
  </div>
    <div class="form-group">
    <label for="nebenkosten">Nebenkosten:</label>
    <input type="text" value="<?php echo $vertrag->nebenkosten ?>" class="form-control" id="nebenkosten" name="nebenkosten">
  </div>
    <div class="form-group">
    <label for="iban">Iban:</label>
    <input type="text" value="<?php echo $vertrag->iban ?>" class="form-control" id="iban" name="iban">
  </div>
    <div class="form-group">
    <label for="kaution">Kaution:</label>
    <input type="text" value="<?php echo $vertrag->kaution ?>" class="form-control" id="kaution" name="kaution">
  </div>
    <div class="form-group">
    <label for="kautionart">Kautionart:</label>
    <input type="text" value="<?php echo $vertrag->kautionart ?>" class="form-control" id="kautionart" name="kautionart">
  </div>
    <div class="form-group">
    <label for="begin">Begin:</label>
    <input type="text" value="<?php echo $vertrag->begin ?>" class="form-control" id="begin" name="begin">
  </div>
    <div class="form-group">
    <label for="ende">Ende:</label>
    <input type="text" value="<?php echo $vertrag->ende ?>" class="form-control" id="ende" name="ende">
  </div>
    <div class="form-group">
    <label for="selbstbeteiligung">Selbstbeteiligung:</label>
    <input type="text" value="<?php echo $vertrag->selbstbeteiligung ?>" class="form-control" id="selbstbeteiligung" name="selbstbeteiligung">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
