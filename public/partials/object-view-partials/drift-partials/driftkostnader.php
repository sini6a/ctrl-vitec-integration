<div class="column">
    <div class="space-between">
        <p>Driftskostnader: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["sum"]) ? number_format($object["operation"]["sum"], 0, ',', ' ') . " kr/mån" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>