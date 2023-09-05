<div class="column">
    <div class="space-between">
        <p>Avgift: </p>
        <p style="text-align: right !important; ">
            <strong>
                <?php echo isset($object["baseInformation"]["monthlyFee"]) ? number_format($object["baseInformation"]["monthlyFee"], 0, ',', ' ') . " kr" : null ?>
                <?php echo isset($object["baseInformation"]["commentary"]) ? "<br>" . $object["baseInformation"]["commentary"] : null ?>
            </strong>
        </p>
    </div>
</div>