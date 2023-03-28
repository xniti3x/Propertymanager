<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <th>title</th><th>raume</th><th>qm</th>            <th><?php _trans('options'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($appartments as $appartment) { ?>
            <tr>
                                <td><?php echo ($appartment->appartment_title);  ?></td>
                                <td><?php echo ($appartment->appartment_raume);  ?></td>
                                <td><?php echo ($appartment->appartment_qm);  ?></td>
                
               <td>
                    <div class="options btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a target="blank" href="<?php echo site_url('appartment/view/' . $appartment->appartment_id); ?>">
                                    <i class="fa fa-eye fa-margin"></i>
                                    <?php _trans('view'); ?>
                                </a>
                            </li>
                            <li>
                                <a target="blank" href="<?php echo site_url('appartment/edit/' . $appartment->appartment_id); ?>">
                                    <i class="fa fa-edit fa-margin"></i>
                                    <?php _trans('edit'); ?>
                                </a>
                            </li>
                            <li>
                                <form action="<?php echo site_url('appartment/delete/' . $appartment->appartment_id); ?>"
                                      method="POST">
                                    <?php _csrf_field(); ?>
                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('<?php _trans('delete_record_warning'); ?>');">
                                        <i class="fa fa-trash-o fa-margin"></i> <?php _trans('delete'); ?>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>
