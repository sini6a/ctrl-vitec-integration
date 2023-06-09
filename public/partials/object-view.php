<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://ctrl.mk
 * @since      1.0.0
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/public/partials
 *        // <img src="<?php echo $this->properties->getImage($image['url'] . "&w=256&mode=crop") ?>" alt="">

 *       src="<?php echo isset($object['thumbnail']) ? $object['thumbnail'] : plugin_dir_url(__FILE__) . '../images/* *ctrl-vitec-integration-placeholder.png' ?>" />
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="property">

  <div class="property-image">
    <img id="main-image" src="<?php echo plugin_dir_url(dirname(__FILE__, 1)) . 'images/roller.svg' ?>" />

  </div>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <h3>Fakta om bostaden</h3>
    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Boarea: </p>
          <p><strong>
              <?php echo isset($object['baseInformation']['livingSpace']) ? $object['baseInformation']['livingSpace'] . " m²" : "Okänd" ?>
            </strong></p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Pris: </p>
          <p><strong>
              <?php echo isset($object["price"]["startingPrice"]) ? number_format($object["price"]["startingPrice"], 0, ',', ' ') . " kr" : "Okänd" ?>
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
              <?php echo isset($object["interior"]["numberOfRooms"]) ? $object["interior"]["numberOfRooms"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Antal Sovrum: </p>
          <p>
            <strong>
              <?php echo isset($object["interior"]["numberOfBedroom"]) ? $object["interior"]["numberOfBedroom"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Driftskostnad: </p>
          <p>
            <strong>
              <?php echo isset($object["operation"]["sum"]) ? number_format($object["operation"]["sum"], 0, ',', ' ') . " kr" : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="description">
    <div class="row">
      <h2 class="center">
        <?php echo isset($object['baseInformation']['objectAddress']['area']) ? $object['baseInformation']['objectAddress']['area'] : "Okänd" ?>
      </h2>
      <div class="column">
        <p>
          <?php echo isset($object['description']['longSellingDescription']) ? $object['description']['longSellingDescription'] : null ?>
        </p>
      </div>
    </div>
  </section>

  <section class="viewing">
    <div class="row">
      <div class="column" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
        <h5 class="center">VISNING</h5>
        <?php isset($object["viewings"]) ? include_once('object-view-partials/visning.php') : null ?>
      </div>
    </div>
  </section>

  <section class="agent" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <h5 class="center">ANSVARIG MÄKLARE</h5>
    <div class="row">
      <div class="column">
        <img id="agent-image" src="<?php echo plugin_dir_url(dirname(__FILE__, 1)) . 'images/roller.svg' ?>" />
      </div>
      <div class="column" style="flex: 1;">
        <p style="font-size: xx-large; border-bottom: 1px solid;"><strong>
            <?php echo isset($agent[0]["userName"]) ? $agent[0]["userName"] : null ?>
          </strong></p>
        <p>
          <?php echo isset($agent[0]["emailAddress"]) ? $agent[0]["emailAddress"] : null ?><br />
          <?php echo isset($agent[0]["telePhone"]) ? $agent[0]["telePhone"] : null ?><br />
          <?php echo isset($agent[0]["cellPhone"]) ? $agent[0]["cellPhone"] : null ?>
        </p>
      </div>
    </div>
  </section>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">

    <?php isset($object["interior"]) ? include_once('object-view-partials/interiör.php') : null ?>

    <?php isset($object["balconyPatio"]) ? include_once('object-view-partials/balkong-uteplats-bilplats.php') : null ?>

    <?php isset($object["energyDeclaration"]["completed"]) && $object["energyDeclaration"]["completed"] != "" ? include_once('object-view-partials/energideklaration.php') : null ?>

    <?php isset($object["assess"]["preliminaryAssessedValue"]) && $object["assess"]["preliminaryAssessedValue"] ? include_once('object-view-partials/taxering.php') : null ?>

    <?php isset($object["operation"]) ? include_once('object-view-partials/driftkostnader.php') : null ?>

  </section>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">

    <?php isset($object["building"]) ? include_once('object-view-partials/byggnad.php') : null ?>
    <?php isset($object["association"]) ? include_once('object-view-partials/föreningen.php') : null ?>

  </section>

  <section class="viewing">
    <div class="row">
      <div class="column" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
        <h5 class="center">Budgivning</h5>
        <p>
          Vi tillämpar öppen budgivning via telefon, där samtliga budgivare blir informerade om det för tillfället
          högsta budet. Det är dock alltid ägaren som bestämmer över hur budgivningen skall gå till samt vem som skall
          få köpa fastigheten.
        </p>
      </div>
      <div class="column" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
        <h5 class="center">Boarea</h5>
        <p>
          Boarea kan variera beroende på olika uppmätningsnormer. Huruvida uppgiften stämmer med dagens mätmetod kan
          inte garanteras. Köparen uppmanas att om det är av stor vikt för honom/henne, kontrollera fastighetens boarea
          före köpet som ett led i sin undersökningsplikt. Ovanstående uppgifter är grundade på information lämnad av
          säljaren och berörd myndighet. Uppgifter från säljaren kontrolleras av fastighetsmäklaren endast om
          omständigheterna ger anledning till detta
        </p>
      </div>
    </div>
  </section>

  <section class="gallery">
    <h3 class="center">Bilder</h3>
    <div class="gallery-wrapper">
      <?php foreach ($object['images'] as $image => $value): ?>
        <div class="single-image">
          <a id="gallery-href-image-<?php echo $image ?>" href="">
            <img id="gallery-image-<?php echo $image ?>"
              src="<?php echo plugin_dir_url(dirname(__FILE__, 1)) . 'images/roller.svg' ?>" alt="">
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <?php
    if (isset(get_option('ctrl_options')['ctrl_field_cf7']) && !empty(get_option('ctrl_options')['ctrl_field_cf7'])) {
      include_once('contact-form.php');
    }
    ?>

  </section>
  <div class="wp-block-button is-style-outline" style=" width: fit-content !important;">
    <a href="./" class="wp-block-button__link wp-element-button" style="border-radius: 1px;">Visa
      alla objekt</a>
  </div>
</div>
</div>

<script>
  jQuery(document).ready(function ($) {
    $.post(my_ajax_obj.ajax_url, {
      action: "load_api_image",
      image_id: "<?php echo $object['images'][0]['imageId'] ?>"
    }, function (data) {
      $("#main-image").attr("src", data);
    });

    $.post(my_ajax_obj.ajax_url, {
      action: "load_api_image",
      image_id: "<?php echo $agent[0]['image']['imageId'] ?>"
    }, function (data) {
      $("#agent-image").attr("src", data);
    });

    var image_ids =
    {
      <?php foreach ($object['images'] as $image => $value) {
        echo '"' . $image . '": "' . $value['imageId'] . '",';
      } ?>
    };

    $.each(image_ids, function (key, val) {
      $.post(my_ajax_obj.ajax_url, {
        action: "load_api_image",
        image_id: val
      }, function (data) {
        $("#gallery-image-" + key).attr("src", data);
        $("#gallery-href-image-" + key).attr("data-fslightbox", "gallery");
        $("#gallery-href-image-" + key).attr("href", data);
        refreshFsLightbox();
      });
    })



  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>