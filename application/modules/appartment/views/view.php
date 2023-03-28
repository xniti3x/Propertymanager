<div class="container">
  <h2>View appartment </h2>  
   <div class="form-group">
    <label for="title">title:</label>
    <input type="text" readonly value="<?php echo $appartment->appartment_title; ?>" class="form-control" id="title" name="title">
  </div>
    <div class="form-group">
    <label for="raume">raume:</label>
    <input type="text" readonly value="<?php echo $appartment->appartment_raume; ?>" class="form-control" id="raume" name="raume">
  </div>
    <div class="form-group">
    <label for="qm">qm:</label>
    <input type="text" readonly value="<?php echo $appartment->appartment_qm; ?>" class="form-control" id="qm" name="qm">
  </div>
    <a class="btn btn-default" href="<?php echo site_url("appartment/index"); ?>">back</a>
</div>
