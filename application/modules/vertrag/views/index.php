<div class="container">
  <h2>Manage Vertrag</h2>
  <?php if($this->session->flashdata('success')){ ?>
  <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                </div>
  <?php } ?>

<?php if(!empty($vertrags)) {?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>vermieter</th>
       <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($vertrags as $vertrag) { ?>
      <tr>
        <td> <?php echo $vertrag->id; ?> </td>
        <td> <a href="<?php echo site_url("vertrag/")?>viewVertrag/<?php echo $vertrag->id?>" > <?php echo $vertrag->vermieter ?> </a> </td>

        <td>
        <a href="<?php echo site_url("vertrag/")?>editVertrag/<?php echo $vertrag->id?>" >Edit</a>
        <a href="<?php echo site_url("delVertrag/".$vertrag->id); ?>" onclick="return confirm('are you sure to delete')">Delete</a>
        </td>

      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php } else {?>
  <div class="alert alert-info" role="alert">
                    <strong>No Vertrags Found!</strong>
                </div>
  <?php } ?>
</div>
