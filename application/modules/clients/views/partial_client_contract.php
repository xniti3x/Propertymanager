<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th><?php _trans('Vertragsdaten'); ?></th>
            <th><?php _trans(''); ?></th>
        </tr>
        </thead>
        <tbody>
            <?php if(!empty($vertrag)) foreach($vertrag as $item=>$value){ ?>
            <tr style="font-size:11pt;">
				<td> <b><?php echo $item; ?></b> </td><td> <?php echo $value; ?> </td>
            </tr>
            <?php }  ?>
        </tbody>
    </table>
</div>