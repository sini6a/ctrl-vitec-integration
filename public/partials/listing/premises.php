<?php if ($this->properties->getPremise() != null) {
    foreach ($this->properties->getPremise() as $property): ?>
        <div class="listing">

            <div class="listing-thumbnail">
                <img src="<?php echo $this->properties->getImage($property['mainImage']['imageId'] . "&w=500&mode=crop") ?>" />
            </div>

            <div class="listing-content"
                style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
                <section class="fact" style="margin-bottom: 0 !important;">
                    <h3 class="center">
                        <?php echo isset($property['areaName']) ? $property['areaName'] : "Okänd" ?>
                    </h3>
                    <div class="row">
                        <div class="column">
                            <div class="space-between">
                                <p>Boarea: </p>
                                <p><strong>
                                        <?php echo isset($property['livingSpace']) ? $property['livingSpace'] . " m²" : "Okänd" ?>
                                    </strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="space-between">
                                <p>Pris: </p>
                                <p><strong>
                                        <?php echo isset($property['price']) ? number_format($property['price'], 0, ',', ' ') . " kr" : "Okänd" ?>
                                    </strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
                        <div class="column">
                            <div class="space-between">
                                <p>Antal Rum: </p>
                                <p>
                                    <strong>
                                        <?php echo isset($property["rooms"]) ? $property["rooms"] : "Okänd" ?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="space-between">
                                <p>Objektnummer: </p>
                                <p>
                                    <strong>
                                        <?php echo isset($property["objectNumber"]) ? $property["objectNumber"] : "Okänd" ?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="wp-block-buttons is-layout-flex">
                        <div class="wp-block-button is-style-outline">
                            <a style="border-radius: 1px;" class="wp-block-button__link wp-element-button"
                                href="<?php echo add_query_arg(array('object_id' => $property['id'], 'object_type' => 'premise'), get_permalink()) ?>">LÄS
                                MER</a>
                        </div>
                    </div>


                </section>
            </div>
        </div>

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