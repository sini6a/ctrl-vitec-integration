<div class="column">
    <div class="space-between">
        <p>Försäkring: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["insurance"]) ? number_format($object["operation"]["insurance"], 0, ',', ' ') . " kr/mån" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>