<div class="container">
  <h2>Update <?php echo $title; ?> </h2>  
<form role="form" method="post" action="VARIABLE_OPEN_PHP echo site_url("<?php echo ($title); ?>/editPost"); VARIABLE_CLOSE_PHP" enctype="multipart/form-data">
<input type="hidden" name="VARIABLE_OPEN_PHP echo $this->config->item('csrf_token_name'); VARIABLE_CLOSE_PHP" value="VARIABLE_OPEN_PHP echo $this->security->get_csrf_hash(); VARIABLE_CLOSE_PHP">
<input type="hidden" name="id" value="VARIABLE_OPEN_PHP echo $id; VARIABLE_CLOSE_PHP">

 <?php foreach($items as $item){ ?>
  <div class="form-group">
    <label for="<?php echo $item; ?>"><?php echo ($item); ?>:</label>
    <input type="text" value="VARIABLE_OPEN_PHP echo $<?php echo ($title); ?>-><?php echo $title."_".$item; ?>; VARIABLE_CLOSE_PHP" class="form-control" id="<?php echo ($title."_".$item); ?>" name="<?php echo ($title."_".$item); ?>">
  </div>
  <?php } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
