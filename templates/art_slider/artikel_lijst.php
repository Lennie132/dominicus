<?php
  smart_include_css('css/style.less');
  smart_include_js('main.js');

  $config = array(
      'tabelnaam' => $tabelnaam,
      'group_id' => $DATA['group'],
      'order' => 'a.gewicht ASC', // bv: RAND()
      'artikel_id' => 0,
      'limit_links' => 10,
      'where' => ''
  );

  /* Artikelen ophalen */





  $art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
  if (!empty($art_arr)) {
    ?>
    <div class="slider-wrapper">
      <div class="bxslider">
        <?php
        foreach ($art_arr as $key => $artikel) {
          $img = get_art_file_path($artikel['Afbeelding'], $artikel['artikel_id']);
          if (trim($artikel['Afbeelding']) != '') {
            ?>
            <div class="slide" style="background-image:url('<?= lcms::resize($img, 1920, 1080, '', 80); ?>');"> 
              <div class="overlay">
                <div class="center-block">
                    <div class="row">
                      <div class="col-xs-12">
                        <q><?= $artikel['Quote']; ?></q>
                        <p><?= $artikel['Leerling']; ?></p>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
    <?php
  }
?>