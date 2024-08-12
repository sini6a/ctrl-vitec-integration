<div class="column">
    <div class="space-between">
        <p>Renhållning: </p>
        <p>
            <strong>
                <?php echo isset($object["operation"]["sanitation"]) ? number_format($object["operation"]["sanitation"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
        </p>
    </div>
</div>