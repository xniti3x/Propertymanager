<div class="container">
  <h2>Add Appartment </h2>  
<form role="form" method="post" action="<?php echo site_url("appartment/addPost"); ?>" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

   <div class="form-group">
    <label for="title">title:</label>
    <input type="text" value="" class="form-control" id="title" name="title">
  </div>
    <div class="form-group">
    <label for="raume">raume:</label>
    <input type="text" value="" class="form-control" id="raume" name="raume">
  </div>
    <div class="form-group">
    <label for="qm">qm:</label>
    <input type="text" value="" class="form-control" id="qm" name="qm">
  </div>
    <div class="form-group">
    <label for="kellerraum">kellerraum:</label>
    <input type="text" value="" class="form-control" id="kellerraum" name="kellerraum">
  </div>
    <div class="form-group">
    <label for="stellplatz">stellplatz:</label>
    <input type="text" value="" class="form-control" id="stellplatz" name="stellplatz">
  </div>
    <div class="form-group">
    <label for="client_id">client_id:</label>
    <input type="text" value="" class="form-control" id="client_id" name="client_id">
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
