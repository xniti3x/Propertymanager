<div class="container">
  <h2>Add Vertrag</h2>  
    <form role="form" method="post" action="<?php echo site_url('crudGenerator/formPost')?>" >
    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"value="<?php echo $this->security->get_csrf_hash() ?>">
    <?php $this->layout->load_view('layout/alerts'); ?>
    <div class="form-group">
        <label for="title">Titel:</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="fields">Fields:</label>
        <textarea type="text" class="form-control" id="item_terms" name="item_terms"></textarea>
      </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>