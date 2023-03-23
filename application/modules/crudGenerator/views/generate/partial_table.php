<div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <?php foreach($items as $item){
                echo "<th>".$item."</th>";
            } ?>
            <th>VARIABLE_OPEN_PHP _trans('options'); VARIABLE_CLOSE_PHP</th>
        </tr>
        </thead>

        <tbody>
        VARIABLE_OPEN_PHP foreach ($<?php echo ($title); ?>s as $<?php echo ($title); ?>) { VARIABLE_CLOSE_PHP
            <tr>
                <?php foreach($items as $item){ ?>
                <td>VARIABLE_OPEN_PHP echo (<?php echo "$".($title)."->".($title)."_".$item;?>);  VARIABLE_CLOSE_PHP</td>
                <?php } ?>

               <td>
                    <div class="options btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> VARIABLE_OPEN_PHP _trans('options'); VARIABLE_CLOSE_PHP
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a target="blank" href="VARIABLE_OPEN_PHP echo site_url('<?php echo ($title); ?>/view/' . $<?php echo ($title); ?>-><?php echo ($title); ?>_id); VARIABLE_CLOSE_PHP">
                                    <i class="fa fa-eye fa-margin"></i>
                                    VARIABLE_OPEN_PHP _trans('view'); VARIABLE_CLOSE_PHP
                                </a>
                            </li>
                            <li>
                                <a target="blank" href="VARIABLE_OPEN_PHP echo site_url('<?php echo ($title); ?>/edit/' . $<?php echo ($title); ?>-><?php echo ($title); ?>_id); VARIABLE_CLOSE_PHP">
                                    <i class="fa fa-edit fa-margin"></i>
                                    VARIABLE_OPEN_PHP _trans('edit'); VARIABLE_CLOSE_PHP
                                </a>
                            </li>
                            <li>
                                <form action="VARIABLE_OPEN_PHP echo site_url('<?php echo ($title); ?>/delete/' . $<?php echo ($title); ?>-><?php echo ($title); ?>_id); VARIABLE_CLOSE_PHP"
                                      method="POST">
                                    VARIABLE_OPEN_PHP _csrf_field(); VARIABLE_CLOSE_PHP
                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('VARIABLE_OPEN_PHP _trans('delete_record_warning'); VARIABLE_CLOSE_PHP');">
                                        <i class="fa fa-trash-o fa-margin"></i> VARIABLE_OPEN_PHP _trans('delete'); VARIABLE_CLOSE_PHP
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        VARIABLE_OPEN_PHP } VARIABLE_CLOSE_PHP
        </tbody>

    </table>
</div>
