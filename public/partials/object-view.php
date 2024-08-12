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

  <div class="menu-under-image"
    style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <ul>
      <li><a href="#description">BESKRIVNING</a></li>
      <li><a href="#viewings">VISNING</a></li>
      <li><a href="#facts">FAKTA</a></li>
      <li><a href="#pictures">BILDER</a></li>
      <li><a href="#documents">DOKUMENT OCH LÄNKAR</a></li>
      <li><a href="#contact">ANMÄL INTRESSE</a></li>
    </ul>
  </div>

  <?php if (isset($object["bids"]) && !empty($object["bids"])): ?>
    <section class="bidding" id="biddings"
      style="padding-top: 25px; background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="row" style="justify-content: center;">

        <h5 class="center" style="position: relative;">BUDGIVNING PÅGÅR <span class="dot"></span></h5>
      </div>
      <div class="row">
        <?php include ('object-view-partials/bids.php') ?>
      </div>
    </section>
  <?php endif; ?>

  <section class="description" id="description">
    <div class="row">
      <h2 class="center">
        <?php echo isset($object['baseInformation']['objectAddress']['area']) ? $object['baseInformation']['objectAddress']['area'] : null ?>
        <?php echo isset($object['plotBaseInformation']['objectAddress']['area']) ? $object['plotBaseInformation']['objectAddress']['area'] : null ?>
      </h2>
      <h4 class="center">
        <?php echo isset($object['description']['sellingHeading']) && !empty($object['description']['sellingHeading']) ? $object['description']['sellingHeading'] : $object['baseInformation']['objectAddress']['streetAddress'] ?>
      </h4>
      <div class="column">
        <p class="preformatted-p">
          <?php echo isset($object['description']['longSellingDescription']) ? trim($object['description']['longSellingDescription']) : null ?>
        </p>
      </div>
    </div>
  </section>

  <section class="viewing" id="viewings">
    <div class="row">
      <div class="column" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
        <h5 class="center">VISNING</h5>
        <?php isset($object["viewings"]) ? include ('object-view-partials/visning.php') : null ?>
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

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; "
    id="facts">
    <h3 style="text-align: center;">Fakta om bostaden</h3>
    <div class="row">
      <?php isset($object['baseInformation']['livingSpace']) ? include ('object-view-partials/base-information/living-space.php') : null ?>
      <?php isset($object['baseInformation']['otherSpace']) && $object['baseInformation']['otherSpace'] != '0' ? include ('object-view-partials/base-information/other-space.php') : null ?>
      <?php isset($object["plot"]["area"]) ? include ('object-view-partials/plot/area.php') : null ?>
      <?php isset($object["baseInformation"]["propertyUnitDesignation"]) ? include ('object-view-partials/base-information/designation.php') : null ?>
      <?php isset($object["plotBaseInformation"]["propertyUnitDesignation"]) ? include ('object-view-partials/plot/base-information/unitDesignation.php') : null ?>
      <?php isset($object["baseInformation"]["propertyType"]) ? include ('object-view-partials/base-information/property-type.php') : null ?>
      <?php isset($object["price"]["startingPrice"]) ? include ('object-view-partials/price/starting-price.php') : null ?>
      <?php isset($object["operation"]["sum"]) ? include ('object-view-partials/operation/sum.php') : null ?>
      <?php isset($object["baseInformation"]["monthlyFee"]) || isset($object["baseInformation"]["commentary"]) ? include ('object-view-partials/base-information/monthly-fee.php') : null ?>
      <?php isset($object["baseInformation"]["areaSource"]) && $object["baseInformation"]["areaSource"] != "" ? include ('object-view-partials/base-information/object-address/area-source.php') : null ?>
    </div>
  </section>


  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">

    <h5>Adressuppgifter</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <?php isset($object["baseInformation"]["objectAddress"]["county"]) ? include ('object-view-partials/base-information/object-address/county.php') : null ?>
      <?php isset($object["plotBaseInformation"]["objectAddress"]["county"]) ? include ('object-view-partials/plot/base-information/object-address/county.php') : null ?>
      <?php isset($object["baseInformation"]["objectAddress"]["municipality"]) ? include ('object-view-partials/base-information/object-address/municipality.php') : null ?>
      <?php isset($object["plotBaseInformation"]["objectAddress"]["municipality"]) ? include ('object-view-partials/plot/base-information/object-address/municipality.php') : null ?>
      <?php isset($object["baseInformation"]["objectAddress"]["zipCode"]) ? include ('object-view-partials/base-information/object-address/zipcode.php') : null ?>
      <?php isset($object["plotBaseInformation"]["objectAddress"]["zipCode"]) ? include ('object-view-partials/plot/base-information/object-address/zipcode.php') : null ?>
      <?php isset($object["baseInformation"]["objectAddress"]["streetAddress"]) ? include ('object-view-partials/base-information/object-address/address.php') : null ?>
      <?php isset($object["plotBaseInformation"]["objectAddress"]["streetAddress"]) ? include ('object-view-partials/plot/base-information/object-address/address.php') : null ?>
    </div>

  </section>


  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["interior"]["numberOfRooms"]) || isset($object["houseInterior"]["numberOfRooms"]) || isset($object["interior"]["numberOfBedroom"]) || isset($object["houseInterior"]["numberOffBedroom"]) || isset($object["interior"]["kitchenType"]) ? include_once ('object-view-partials/interior-partials/interior.php') : null ?>
    <?php isset($object['ventilation']['type']) && $object['ventilation']['type'] != "" || isset($object['ventilation']['inspection']) && $object['ventilation']['inspection'] != "" ? include_once ('object-view-partials/ventilation.php') : null ?>
    <?php isset($object["energyDeclaration"]) ? include ('object-view-partials/energideklaration.php') : null ?>
    <?php isset($object["balconyPatio"]) ? include ('object-view-partials/balkong-uteplats-bilplats.php') : null ?>
    <?php isset($object["operation"]["heating"]) && $object["operation"]["heating"] != 0 || isset($object["operation"]["roadCommunity"]) && $object["operation"]["roadCommunity"] != 0 || isset($object["operation"]["insurance"]) && $object["operation"]["insurance"] != 0 || isset($object["operation"]["electricity"]) && $object["operation"]["electricity"] != 0 || isset($object["operation"]["waterAndDrain"]) && $object["operation"]["waterAndDrain"] != 0 || isset($object["operation"]["sanitation"]) && $object["operation"]["sanitation"] != 0 || isset($object["operation"]["personsInTheHousehold"]) && $object["operation"]["personsInTheHousehold"] != 0 || isset($object["operation"]["sum"]) && $object["operation"]["sum"] != 0 ? include ('object-view-partials/driftkostnader.php') : null ?>
    <?php isset($object['ventilation']['type']) && $object['ventilation']['type'] != "" || isset($object['ventilation']['inspection']) && $object['ventilation']['inspection'] != "" ? include_once ('object-view-partials/ventilation.php') : null ?>
    <?php isset($object["assess"]["preliminaryAssessedValue"]) || isset($object["assess"]["typeCode"]) || isset($object["assess"]["taxFee"]) || isset($object["assess"]["totalAssessedValue"]) ? include_once ('object-view-partials/taxering.php') : null ?>
    <?php isset($object["tvAndBroadband"]["tv"]) || isset($object["tvAndBroadband"]["broadband"]) ? include_once ('object-view-partials/tv-and-broadband.php') : null ?>
  </section>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
    <?php isset($object["building"]) ? include ('object-view-partials/byggnad.php') : null ?>
    <?php isset($object["association"]) ? include ('object-view-partials/föreningen.php') : null ?>
    <?php empty($object["advertiseOn"]["marketplaces"]); ?>
    <?php if (!empty($object["advertiseOn"]["marketplaces"])) ?>
    <?php isset($object["baseInformation"]["other"]) ? include ('object-view-partials/base-information/other.php') : null ?>

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
          säljaren och berörd myndighet. Alla uppgifter från säljaren kontrolleras av fastighetsmäklaren endast om
          omständigheterna ger anledning till detta
        </p>
      </div>
    </div>
  </section>

  <section class="ctrl-gallery" id="pictures">
    <h3 class="center">Bilder</h3>
    <div class="gallery-wrapper">
      <?php foreach ($object['images'] as $image => $value): ?>
        <?php if ($value['showImageOnInternet']) {
          include ('image-partial.php');
        } ?>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; "
    id="documents">
    <h3 style="text-align:center;">Dokument och länkar</h3>
    <div class="row">
      <?php if (!empty($object['advertiseOn']['documents']) || !empty($object['advertiseOn']['links'])): ?>
        <?php foreach ($object['advertiseOn']['documents'] as $document => $value): ?>
          <?php include ('object-view-partials/document-partial.php'); ?>
        <?php endforeach; ?>
        <?php foreach ($object['advertiseOn']['links'] as $index => $value): ?>
          <?php include ('object-view-partials/links-partial.php'); ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align: center; width: 100%;">Kontakta mäklaren</p>
      <?php endif; ?>
    </div>
  </section>

  <?php
  if (isset(get_option('ctrl_options')['ctrl_field_cf7']) && !empty(get_option('ctrl_options')['ctrl_field_cf7'])) {
    include ('contact-form.php');
  }
  ?>

  <div class="wp-block-button is-style-outline" style=" width: fit-content !important;">
    <a href="./" class="wp-block-button__link wp-element-button" style="border-radius: 1px;">Visa
      alla objekt</a>
  </div>
</div>
</div>

<script>
  jQuery(document).ready(function ($) {
    $('section').each(function (index, element) {
      if ($(element).text().trim() === '') {
        $(element).remove();
      }
    });
  });
</script>

<script>

  jQuery(document).ready(function ($) {
    var objectNumber = $("[name='object-number']");
    var localAddress = $("[name='local-address']").text().trim();
    objectNumber.val(localAddress);
    var requestQueue = [];
    var loadingText = $("#loading-text");
    var runningRequests = 0;
    var maxConcurrentRequests = 5; // Adjust the maximum number of concurrent requests

    function processQueue() {
      if (requestQueue.length === 0 || runningRequests >= maxConcurrentRequests) {
        return;
      }

      var request = requestQueue.shift();
      runningRequests++;

      var isLastItem = requestQueue.length === 0;

      $.ajax({
        type: 'POST',
        url: request.url,
        data: request.data,
        dataType: 'json',
        success: function (response) {
          // Handle response
          handleResponse(response, request.type);
          runningRequests--;
          processQueue(); // Process the next request
        },
        error: function (xhr, textStatus, errorThrown) {
          // Handle error
          handleError();
          runningRequests--;
          processQueue(); // Process the next request
        }
      });
    }

    function handleResponse(response, type) {
      if (type === 'main') {
        $("#main-image").attr("src", response.image);
      } else if (type === 'agent') {
        $("#agent-image").attr("src", response.image);
      } else if (type === 'thumbnail') {
        $("#gallery-image-" + response.id).attr("src", response.image);
      } else if (type === 'document') {
        $("#document-" + response.id).attr("href", response.path);
      } else {
        if (response.id == 0) {
          $("#main-image").attr("src", response.image);
        }
        $("#loading-text").text("Vänligen vänta. Laddar bilder med hög upplösning.");
        $("#gallery-image-" + response.id).attr("src", response.image);
        $("#gallery-href-image-" + response.id).attr("href", response.image);
        $("#gallery-href-image-" + response.id).attr("data-fslightbox", "gallery");
        //refreshFsLightbox();
      }
    }

    function handleError() {
      console.log("There was a loading error. Please report it to the administrator!");
    }

    function addImageToQueue(id, imageId, type) {
      requestQueue.push({
        url: my_ajax_obj.ajax_url,
        data: {
          action: "load_api_image",
          id: id,
          image_id: imageId,
        },
        type: type
      });

      processQueue(); // Start processing the queue
    }

    function addDocumentToQueue(id, documentId, type) {
      requestQueue.push({
        url: my_ajax_obj.ajax_url,
        data: {
          action: "load_documents",
          id: id,
          document_id: documentId,
        },
        type: type
      });

      processQueue(); // Start processing the queue
    }

    var image_thumbnails = {
      <?php foreach ($object['images'] as $image => $value) {
        if ($value['showImageOnInternet']) {
          echo '"' . $image . '": "' . $value['imageId'] . '&w=600&h=600&quality=90&mode=max",';
        }
      } ?>
    };

    var high_quality_images = {
      <?php foreach ($object['images'] as $image => $value) {
        if ($value['showImageOnInternet']) {
          echo '"' . $image . '": "' . $value['imageId'] . '&w=1600&h=1600&quality=90&mode=max",';
        }
      } ?>
    };

    var documents = {
      <?php foreach ($object['advertiseOn']['documents'] as $doc => $value) {
        echo '"' . $doc . '": "' . $value['id'] . '",';
      } ?>
    };

    // Get main image url and add to queue
    $main_image_url = "<?php echo $object['images'][0]['imageId'] . '&w=1200&h=1200&quality=90&mode=max' ?>";
    addImageToQueue(null, $main_image_url, 'main');

    // Get agent image url and add to queue
    $main_image_url = "<?php echo $agent[0]['image']['imageId'] . '&w=400&h=400&quality=80&mode=max' ?>";
    addImageToQueue(null, $main_image_url, 'agent');

    $.each(image_thumbnails, function (key, val) {
      addImageToQueue(key, val, 'thumbnail');
    });
    $.each(high_quality_images, function (key, val) {
      addImageToQueue(key, val);
    });

    $.each(documents, function (key, val) {
      addDocumentToQueue(key, val, 'document');
    });

  });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>