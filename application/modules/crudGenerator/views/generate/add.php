<div class="container">
  <h2>Add <?php echo $title; ?> </h2>  
<form role="form" method="post" action="VARIABLE_OPEN_PHP echo site_url("<?php echo lcfirst($title); ?>/addPost"); VARIABLE_CLOSE_PHP" enctype="multipart/form-data">
<input type="hidden" name="VARIABLE_OPEN_PHP echo $this->config->item('csrf_token_name'); VARIABLE_CLOSE_PHP" value="VARIABLE_OPEN_PHP echo $this->security->get_csrf_hash(); VARIABLE_CLOSE_PHP">

 <?php foreach($items as $item){ ?>
  <div class="form-group">
    <label for="<?php echo $item; ?>"><?php echo ($item); ?>:</label>
    <input type="text" value="" class="form-control" id="<?php echo lcfirst($item); ?>" name="<?php echo lcfirst($item); ?>">
  </div>
  <?php } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
