<div class="column">
    <div class="space-between">
        <p>Pris: </p>
        <p><strong>
                <?php echo isset($object["price"]["startingPrice"]) ? number_format($object["price"]["startingPrice"], 0, ',', ' ') . " kr" : null ?>
            </strong></p>
    </div>
</div>