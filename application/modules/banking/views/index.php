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

<input class="form-control" id="myInput" type="text" placeholder="Search...">
<div class="table-responsive">
    <table id="bank-table" class="table table-hover table-striped">
  <thead>
    <tr>
      <th><?php if(isset($_SESSION['alert_success'])) {echo("<div style='color:green;'>".$_SESSION['alert_success']."</div>");} ?></th>
    </tr>
  </thead>
  <tbody>
<?php

  foreach($transactions as $transaction){
    $amount=$transaction['transactionAmount'];
    $title=$transaction['title'];
    if(isset( $transaction['remittanceInformationStructured'] ) ){
    $note=$transaction['remittanceInformationStructured'];
    }
    if($amount<0){ $color="red";}else{$color="green";}
    $title="<b>".$title." - ".$transaction['bookingDate']."</b><p>".$note."<br>".$transaction['additionalInformation']." <b style='color:".$color.";'>".$amount."€</b></p>";
   echo "<tr>
   <td>".$title."<p><a class='btn btn-default btn-xs' href='".site_url('banking/view/'.$transaction['transactionId'])."'>Bearbeiten</a></p></td>
   </tr>";
  }
?>
  </tbody>
</table>
<div>