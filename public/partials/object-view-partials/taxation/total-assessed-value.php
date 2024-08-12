<div class="column">
    <div class="space-between">
        <p>Summa tax. värde: </p>
        <p>
            <strong>
                <?php echo isset($object["assess"]["totalAssessedValue"]) && $object["assess"]["totalAssessedValue"] ? number_format($object["assess"]["totalAssessedValue"], 0, ',', ' ') . " kr" : NULL ?>
            </strong>
        </p>
    </div>
</div>