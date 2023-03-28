<div class="container">
  <h2>Update appartment </h2>  
<form role="form" method="post" action="<?php echo site_url("appartment/editPost"); ?>" enctype="multipart/form-data">
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">

   <div class="form-group">
    <label for="title">title:</label>
    <input type="text" value="<?php echo $appartment->appartment_title; ?>" class="form-control" id="appartment_title" name="appartment_title">
  </div>
    <div class="form-group">
    <label for="raume">raume:</label>
    <input type="text" value="<?php echo $appartment->appartment_raume; ?>" class="form-control" id="appartment_raume" name="appartment_raume">
  </div>
    <div class="form-group">
    <label for="qm">qm:</label>
    <input type="text" value="<?php echo $appartment->appartment_qm; ?>" class="form-control" id="appartment_qm" name="appartment_qm">
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
