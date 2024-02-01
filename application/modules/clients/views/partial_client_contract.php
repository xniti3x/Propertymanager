<hr>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Appartment</th>
            <th>Kaltmiete</th>
            <th>Nebenkosten</th>
            <th>Kaution</th>
            <th>Kaution bezahlt</th>
            <th>Begin</th>
            <th>Ende</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><b><?php echo $vertrag->appartment_title." | ".$vertrag->appartment_qm."m²</b>"; echo "<br>- ".str_replace(",", "<br>- ",$vertrag->appartment_raume);?></td>
                <td><?php echo format_currency($vertrag->kaltmiete); ?>€</td>
                <td><?php echo format_currency($vertrag->nebenkosten); ?></td>
                <td><?php echo $vertrag->kaution; ?></td>
                <td><?php echo $vertrag->kautionart; ?></td>
                <td><?php echo format_date($vertrag->begin); ?></td>
                <td><?php echo format_date($vertrag->ende); ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <?php $this->layout->load_view('upload/dropzone-client-html'); ?>
</div>