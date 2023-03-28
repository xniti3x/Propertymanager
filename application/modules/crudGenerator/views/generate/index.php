<div id="headerbar">
    <h1 class="headerbar-title"><?php _trans('Manage '.$title); ?></h1>

    <div class="headerbar-item pull-right">
        <a class="btn btn-sm btn-primary" target="blank" href="VARIABLE_OPEN_PHP echo site_url('<?php echo $title; ?>/add'); VARIABLE_CLOSE_PHP">
            <i class="fa fa-plus"></i> <?php _trans('new'); ?>
        </a>
    </div>

    <div class="headerbar-item pull-right">
    </div>

</div>

<div id="content" class="table-content">

VARIABLE_OPEN_PHP $this->layout->load_view('layout/alerts'); VARIABLE_CLOSE_PHP

    <div id="filter_results">
        
    VARIABLE_OPEN_PHP $this->layout->load_view('<?php echo ($title) ?>/partial_<?php echo ($title) ?>_table'); VARIABLE_CLOSE_PHP
    </div>

</div>

