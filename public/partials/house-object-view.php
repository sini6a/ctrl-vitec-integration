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
              <?php echo isset($object["houseInterior"]["numberOfRooms"]) ? $object["houseInterior"]["numberOfRooms"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Antal Sovrum: </p>
          <p>
            <strong>
              <?php echo isset($object["houseInterior"]["numberOffBedroom"]) ? $object["houseInterior"]["numberOffBedroom"] : "Okänd" ?>
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
        <p>
          <?php echo isset($object['viewings'][0]['commentary']) ? $object['viewings'][0]['commentary'] : 'Kontakta oss om du är intresserad av en visning' ?>
        </p>
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

    <h5>Interiör</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Antal Rum: </p>
          <p>
            <strong>
              <?php echo isset($object["houseInterior"]["numberOfRooms"]) ? $object["houseInterior"]["numberOfRooms"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Antal Sovrum: </p>
          <p>
            <strong>
              <?php echo isset($object["houseInterior"]["numberOffBedroom"]) ? $object["houseInterior"]["numberOffBedroom"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <h5>Ventilation</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Typ: </p>
          <p>
            <strong>
              <?php echo isset($object["ventilation"]["type"]) ? $object["ventilation"]["type"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <h5>Energideklaration</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Deklaration: </p>
          <p>
            <strong>
              <?php echo isset($object["energyDeclaration"]["completed"]) ? $object["energyDeclaration"]["completed"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <h5>Taxering</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Preliminärt taxeringsvärde: </p>
          <p>
            <strong>
              <?php echo isset($object["assess"]["preliminaryAssessedValue"]) && $object["assess"]["preliminaryAssessedValue"] ? "Ja" : "Nej" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <h5>Drift</h5>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Uppvärmning: </p>
          <p>
            <strong>
              <?php echo isset($object["operation"]["heating"]) ? number_format($object["operation"]["heating"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Väg/samfälligh.: </p>
          <p>
            <strong>
              <?php echo isset($object["operation"]["roadCommunity"]) ? number_format($object["operation"]["roadCommunity"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>
    <div class="row" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">
      <div class="column">
        <div class="space-between">
          <p>Försäkring: </p>
          <p>
            <strong>
              <?php echo isset($object["operation"]["insurance"]) ? number_format($object["operation"]["insurance"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Driftskostnader: </p>
          <p>
            <strong>
              <?php echo isset($object["operation"]["sum"]) ? number_format($object["operation"]["sum"], 0, ',', ' ') . " kr/år" : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

  </section>

  <section class="fact" style="background-color: <?php echo get_option('ctrl_options')['ctrl_field_bgcolor'] ?>; ">

    <h5>Byggnad</h5>
    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Byggnadstyp: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["buildingType"]) ? $object["building"]["buildingType"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Byggår: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["buildingYear"]) ? $object["building"]["buildingYear"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Fasad: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["facade"]) ? $object["building"]["facade"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Stomme: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["frame"]) ? $object["building"]["frame"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Fönster: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["windows"]) ? $object["building"]["windows"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Bjälklag: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["beam"]) ? $object["building"]["beam"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Tak: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["roof"]) ? $object["building"]["roof"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
      <div class="column">
        <div class="space-between">
          <p>Uppvärmning: </p>
          <p>
            <strong>
              <?php echo isset($object["building"]["heating"]) ? $object["building"]["heating"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <div class="space-between">
          <p>Vatten och avlopp: </p>
          <p>
            <strong>
              <?php echo isset($object["waterAndDrain"]["info"]) ? $object["waterAndDrain"]["info"] : "Okänd" ?>
            </strong>
          </p>
        </div>
      </div>
    </div>

    <h5>Allmänt information</h5>
    <div class="row">
      <div class="column">
        <div class="space-between" style="text-align: justify;">
          <p>
            <?php echo isset($object["description"]["generally"]) ? $object["description"]["generally"] : "Okänd" ?>
          </p>
        </div>
      </div>
    </div>
    <h5>Övrigt</h5>
    <div class="row">
      <div class="column">
        <div class="space-between" style="text-align: justify;">
          <p>
            <?php echo isset($object["building"]["otherAboutTheBuildning"]) ? $object["building"]["otherAboutTheBuildning"] : "Okänd" ?>
          </p>
        </div>
      </div>
    </div>

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