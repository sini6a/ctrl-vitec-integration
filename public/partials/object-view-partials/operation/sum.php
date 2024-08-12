<div class="column">
    <div class="space-between">
        <p>Driftskostnad: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["sum"]) ? number_format($object["operation"]["sum"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>