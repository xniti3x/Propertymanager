<div id="headerbar">
    <h1 class="headerbar-title">Manage appartment</h1>

    <div class="headerbar-item pull-right">
        <a class="btn btn-sm btn-primary create-appartment" href="#">
            <i class="fa fa-plus"></i> Neu        </a>
    </div>

    <div class="headerbar-item pull-right">
    </div>

</div>

<div id="content" class="table-content">

<?php $this->layout->load_view('layout/alerts'); ?>

    <div id="filter_results">
        
    <?php $this->layout->load_view('appartment/partial_appartment_table'); ?>
    </div>

</div>

