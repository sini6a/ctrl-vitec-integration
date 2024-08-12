<script>
    jQuery(document).ready(function ($) {
        $.ajax({
            type: 'POST',
            url: my_ajax_obj.ajax_url,
            data: {
                action: "load_api_image",
                id: "<?php echo $property['id'] ?>",
                image_id: "<?php echo $property['mainImage']['imageId'] . " & w= 1600 & h= 1600 & quality= 90 & mode=max" ?>",
        },
    dataType: 'json',
    success: function (response) {
        // Handle response
        $("#image-" + response.id).attr("src", response.image);
        },
    });
});
</script>