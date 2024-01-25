<?php if ($this->properties->getHouse() != null) {
    foreach ($this->properties->getHouse() as $property): ?>
        <a href="<?php echo add_query_arg(array('object_id' => $property['id'], 'object_type' => 'house'), get_permalink()) ?>">
            <div class="listing">

                <?php if ($property['status']['name'] == "Kommande")
                    echo '<span class="notify-badge">KOMMANDE OBJEKT</span>' ?>
                    <img class="listing-thumbnail"
                        src="<?php echo $this->properties->getImage($property['mainImage']['imageId'] . "") ?>" />


                <div class="listing-content">
                    <p class="listing-content-heading">
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
                $.post(my_ajax_obj.ajax_url, {
                    action: "load_api_image",
                    image_id: "<?php echo $property['mainImage']['imageId'] ?>"
                }, function (data) {
                    $("#thumbnail-image").attr("src", data);
                });
            });
        </script>
    <?php endforeach;
} ?>