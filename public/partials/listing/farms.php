<?php if ($this->properties->getFarm() != null) {
    foreach ($this->properties->getFarm() as $property): ?>
        <a href="<?php echo add_query_arg(array('object_id' => $property['id'], 'object_type' => 'farm'), get_permalink()) ?>">
            <div class="listing">

                <?php if ($property['status']['name'] == "Kommande") {
                    echo '<span class="notify-badge">KOMMANDE OBJEKT</span>';
                } else if ($property['bidding'] == true) {
                    echo '<span class="notify-badge notify-bidding">BUDGIVNING</span>';
                } ?>

                <img class="listing-thumbnail" id="image-<?php echo $property['id'] ?>"
                    src="<?php echo plugin_dir_url(dirname(__FILE__, 2)) . 'images/roller.svg' ?>" />

                <div class="listing-content">
                    <p class="listing-content-heading">
                        <?php echo isset($property['streetAddress']) ? $property['streetAddress'] : "Okänd" ?>
                    </p>
                    <p style="text-transform: uppercase;">
                        <?php echo isset($property['areaName']) ? $property['areaName'] : "Okänd" ?>
                    </p>
                    <p>
                        <?php echo isset($property['livingSpace']) ? $property['livingSpace'] . " m²" : "Okänd" ?> -
                        <?php echo isset($property['price']) ? number_format($property['price'], 0, ',', ' ') . " kr" : "Okänd" ?>
                        -
                        <?php echo isset($property["rooms"]) ? $property["rooms"] : "Okänd" ?> rum
                    </p>
                </div>
            </div>
        </a>

        <script>
            jQuery(document).ready(function ($) {
                $.ajax({
                    type: 'POST',
                    url: my_ajax_obj.ajax_url,
                    data: {
                        action: "load_api_image",
                        id: "<?php echo $property['id'] ?>",
                        image_id: "<?php echo $property['mainImage']['imageId'] . "&w=1600&h=1600&quality=90&mode=max" ?>",
                    },
                    dataType: 'json',
                    success: function (response) {
                        // Handle response
                        $("#image-" + response.id).attr("src", response.image);
                        $("#image-" + response.id).addClass("no-effect");
                    },
                });
            });
        </script>

    <?php endforeach;
} ?>