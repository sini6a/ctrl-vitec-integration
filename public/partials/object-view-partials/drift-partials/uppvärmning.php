<div class="column">
    <div class="space-between">
        <p>Uppvärmning: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["heating"]) ? number_format($object["operation"]["heating"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>