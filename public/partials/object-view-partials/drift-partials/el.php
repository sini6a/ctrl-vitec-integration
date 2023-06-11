<div class="column">
    <div class="space-between">
        <p>El: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["electricity"]) ? number_format($object["operation"]["electricity"], 0, ',', ' ') . " kr/mån" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>