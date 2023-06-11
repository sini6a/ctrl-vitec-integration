<div class="column">
    <div class="space-between">
        <p>Väg/samfälligh.: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["roadCommunity"]) ? number_format($object["operation"]["roadCommunity"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>