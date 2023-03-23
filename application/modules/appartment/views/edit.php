<div class="container">
  <h2>Update Appartment </h2>  
<form role="form" method="post" action="<?php echo site_url("appartment/editPost"); ?>" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">

   <div class="form-group">
    <label for="title">title:</label>
    <input type="text" value="<?php echo $appartment->title; ?> " class="form-control" id="title" name="title">
  </div>
    <div class="form-group">
    <label for="raume">raume:</label>
    <input type="text" value="<?php echo $appartment->raume; ?> " class="form-control" id="raume" name="raume">
  </div>
    <div class="form-group">
    <label for="qm">qm:</label>
    <input type="text" value="<?php echo $appartment->qm; ?> " class="form-control" id="qm" name="qm">
  </div>
    <div class="form-group">
    <label for="kellerraum">kellerraum:</label>
    <input type="text" value="<?php echo $appartment->kellerraum; ?> " class="form-control" id="kellerraum" name="kellerraum">
  </div>
    <div class="form-group">
    <label for="stellplatz">stellplatz:</label>
    <input type="text" value="<?php echo $appartment->stellplatz; ?> " class="form-control" id="stellplatz" name="stellplatz">
  </div>
    <div class="form-group">
    <label for="client_id">client_id:</label>
    <input type="text" value="<?php echo $appartment->client_id; ?> " class="form-control" id="client_id" name="client_id">
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
