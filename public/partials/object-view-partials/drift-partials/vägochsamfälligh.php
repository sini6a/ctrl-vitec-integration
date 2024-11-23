<div class="column">
    <div class="space-between">
        <p>Väg/samfälligh.: </p>
        <p>
            <strong>
                <?php
                if (isset($object["operation"]["roadCommunity"])) {
                    $roadCommunityCost = $object["operation"]["roadCommunity"];
                    $formattedRoadCommunityCost = number_format($roadCommunityCost, 0, ',', ' ');
                    echo isset($_GET['object_type']) && $_GET['object_type'] === 'housingCooperative'
                        ? $formattedRoadCommunityCost . " kr/mån"
                        : $formattedRoadCommunityCost . " kr/år";
                } else {
                    echo "Okänd";
                }
                ?>
            </strong>
        </p>
    </div>
</div>