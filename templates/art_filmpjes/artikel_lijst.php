<?php
  smart_include_css('css/style.less');
  smart_include_css('css/style.css');
  smart_include_js('main.js');

  $config = array(
      'tabelnaam' => $tabelnaam,
      'group_id' => $DATA['group'],
      'order' => 't.datum DESC', // bv: RAND()
      'artikel_id' => 0,
      'limit_links' => 10,
      'where' => ''
  );

  /* Artikelen ophalen */





  $art_arr = get_artikelen_arr($config['tabelnaam'], $config['group_id'], $config['order'], $config['artikel_id'], $config['limit_links'], $config['where']);
//print_pre($art_arr);
//print_pre($DATA);
  if (!empty($art_arr)) {
    ?>
    <div class="film-wrapper">
      <div class="row">
        <?php
        $tel = 1;
        foreach ($art_arr as $key => $artikel) {
          $oldDate = $artikel['datum'];
          $newDate = date("d-m-Y", strtotime($oldDate));
          ?>
          <div class="col-sm-6 col-md-4">
            <div class="filmitem">
              <div class="row">
                <?= $artikel['vimeo_code']; ?>
                <h2><?= $artikel['link']; ?></h2>
                <h2><?= $artikel['titel']; ?></h2>
                <p><?= $artikel['maker']; ?></p>
                <p><?= $newDate; ?></p>
              </div>
            </div>
          </div>
          <?php
          if ($tel % 3 == 0) {
            ?>
            <div class="clearfix hidden-xs hidden-sm"></div>
            <?php
          }
          $tel++;
        }
        ?>
      </div>
      <?php if (count($art_arr) > 10) { ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="pagination">
              <?php
              limit_links('', true);
              clear_limit();
              ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php
  }
?>