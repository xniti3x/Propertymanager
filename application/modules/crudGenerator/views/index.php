<div id="headerbar">
    <h1 class="headerbar-title"><?php _trans('Manage Vertrag'); ?></h1>
</div>
<div id="content" class="table-content">
    <?php $this->layout->load_view('layout/alerts'); ?>
    <?php foreach($files as $file){
        echo $file."<i class="."'"."fa fa-check"."'"."></i><br>";
    } ?>
    <a href="<?php echo site_url("crudGenerator/index"); ?>" class="btn btn-success">OK generate new</a>
</div>