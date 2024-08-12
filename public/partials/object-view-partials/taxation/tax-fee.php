<div class="column">
    <div class="space-between">
        <p>Skatt/Avgift: </p>
        <p>
            <strong>
                <?php echo isset($object["assess"]["taxFee"]) && $object["assess"]["taxFee"] ? number_format($object["assess"]["taxFee"], 0, ',', ' ') . " kr" : NULL ?>
            </strong>
        </p>
    </div>
</div>