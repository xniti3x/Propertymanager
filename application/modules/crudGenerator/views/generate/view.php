<div class="container">
  <h2>View <?php echo $title; ?> </h2>  
 <?php foreach($items as $item){ ?>
  <div class="form-group">
    <label for="<?php echo $item; ?>"><?php echo ($item); ?>:</label>
    <input type="text" readonly value="VARIABLE_OPEN_PHP echo $<?php echo lcfirst($title); ?>-><?php echo $item; ?>; VARIABLE_CLOSE_PHP " class="form-control" id="<?php echo lcfirst($item); ?>" name="<?php echo lcfirst($item); ?>">
  </div>
  <?php } ?>
  <a class="btn btn-default" href="VARIABLE_OPEN_PHP echo site_url("<?php echo lcfirst($title); ?>/index"); VARIABLE_CLOSE_PHP">back</a>
</div>
