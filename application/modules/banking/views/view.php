<?php if (isset($_SESSION['alert_error'])) {
  echo ("<div style='color:red;'>" . $_SESSION['alert_error'] . "</div>");
} ?>
<?php if (isset($_SESSION['alert_success'])) {
  echo ("<div style='color:green;'>" . $_SESSION['alert_success'] . "</div>");
} ?>

<br>
<div class="panel panel-default">
  <div class="panel-heading">

    <div class="headerbar-item pull-left">
      <div class="btn-group btn-group-sm index-options">
        <a class="btn btn-default btn-xs" href="<?php echo site_url("banking/index/all"); ?>"> zurück </a>
      </div>
    </div>

    <div align="center"><?php echo "<b>" . $transaction["title"] . "</b>"; ?></div>
  </div>
  <div class="panel-body">
    <table class="table table-hover">
      <?php
      $color = $transaction["transactionAmount"] < 0 ? "red" : "green";
      echo
      "<tr><td>" . $transaction["bookingDate"] . "</td></tr>" .
        "<tr><td>" . $transaction["valueDate"] . "</td></tr>" .
        "<tr><td style='color:" . $color . ";'><b>" . $transaction["transactionAmount"] . "€</b></td></tr>" .
        "<tr><td>" . $transaction["iban"] . "</td></tr>" .
        "<tr><td>" . $transaction["remittanceInformationStructured"] . "</td></tr>" .
        "<tr><td>" . $transaction["additionalInformation"] . "</td></tr>";
      ?>
    </table>
  </div>
  <form method="post" action="<?php echo site_url("banking/transaction/".$transaction["transactionId"]); ?>">
  <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
           value="<?php echo $this->security->get_csrf_hash() ?>">
    Notice:<input type="text" name="note" value="<?php echo $transaction["note"]; ?>" />
    <input type="submit" value="speichern" />
  </form>
</div>
<br>
