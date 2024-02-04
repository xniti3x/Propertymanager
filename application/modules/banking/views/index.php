<div id="headerbar">
    <div class="headerbar-item pull-left">
        <div class="btn-group btn-group-sm index-options">
            <a href="<?php echo site_url('banking/index/all'); ?>"
               class="btn  <?php echo $status == 'all' ? 'btn-primary' : 'btn-default' ?>">
                <?php _trans('all'); ?>
            </a>
        </div>
    </div>
    <div class="headerbar-item pull-right">
        <div class="btn-group btn-group-sm index-options">
        <a href="<?php echo site_url('banking/index/filter'); ?>"
               class="btn  <?php echo $status == 'filter' ? 'btn-primary' : 'btn-default' ?>">
                <?php _trans('Filtred'); ?>
          </a>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['alert_success'])) {echo("<div style='color:green;'>".$_SESSION['alert_success']."</div>");} ?>

<div class="table-responsive">
<input class="form-control" id="myInput" type="text" placeholder="Search...">
    <table class="table table-hover table-striped">
      <tr>
        <th>Datum</th>
        <th>Title</th>
        <th>Notiz</th>
        <th>Betrag</th>
        <th>Option</th>
      </tr>
      <?php foreach($transactions as $transaction){ 
          $amount=$transaction['transactionAmount'];
          $title=$transaction['title'];
          if(isset( $transaction['remittanceInformationStructured'] ) ){
          $note=$transaction['remittanceInformationStructured'];
          }
          if($amount<0){ $color="red";}else{$color="green";}
          ?>
          <tr>
            <td><?php echo date_from_mysql($transaction['valueDate']); ?></td>
            <td><?php echo $title ?><p style="font-size:8pt;"><?php echo($note); ?></p></td>
            <td style="width: 90px;"><?php echo $transaction['note'] ?></td>
            
            <td style="color:<? echo $color; ?>;"><?php echo format_currency($amount); ?></td>
            <td>
                    <div class="options btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> <?php _trans('options'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('banking/view/'.$transaction['transactionId']); ?>">
                                    <i class="fa fa-edit fa-margin"></i> <?php _trans('edit'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
          </tr>
        <?php } ?>
    </table>
</div>
