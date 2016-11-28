<?php
  $config = array(
      'tabelnaam' => 'art_fotoalbum',
      'group_id' => '*',
      'order' => ' a.artikel_id DESC', // bv: RAND()
      'artikel_id' => 0,
      'limit_links' => 1,
      'where' => ' ',
      'module' => 0,
  );

  $slide_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
  
  
  if (!empty($slide_arr)) {
    ?>
    <div class="slider-wrapper">
      <div class="bxslider">
        <?php
        foreach ($slide_arr as $key => $slide) {
          $images = get_art_multi_files($slide['afbeeldingen'], $slide['artikel_id'], $DATA['m']);
          //print_pre($images);
          foreach ($images as $key => $image) {
            //print_pre($image);
            if (trim($image['path']) != '') {
              ?>
              <div class="slide" style="background-image:url('<?= lcms::resize($image['path'], 1920, 1080, '', 80); ?>');"> 
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
  <?php } ?>