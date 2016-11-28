<?php
  global $DATA;
  lcms_client_script::add_header_css('/css/header.less');
  lcms_client_script::add_header_css('/css/menu.less');
  lcms_client_script::add_header_js('priority-nav.js');
  lcms_client_script::add_header_js('main.js');
?>
<header>
  <div class="header-wrapper">
    <div class="header-bar">
      <div class="header-main">
        <div class="header-logo">
          <div class="wrapper-logo">
            <?php
              if ($DATA['page'] == get_variabele('page_home') || $DATA['page'] == get_variabele('page_home_groep8')) {
                echo lcms::Logo()->setMaxSizes(999, 999)->getHTML();
              } else {
                ?>
                <div class="logo" itemscope="" itemtype="http://schema.org/Organization">
                  <a itemprop="url" class="img-responsive" href="<?= link::v('page_home'); ?>" title="Dominicus College">
                    <img itemprop="logo" src="<?= lcms::resize('img/dominicus-logo-white-text-fixed.png', 300, 500, '', 80); ?>" alt="Dominicus College" class="img-responsive">
                  </a>
                </div>
              <?php }
            ?>
          </div>
          <div class="wrapper-logo-no-text">
            <div class="logo" itemscope="" itemtype="http://schema.org/Organization">
              <a itemprop="url" class="img-responsive" href="<?= link::v('page_home'); ?>" title="Dominicus College">
                <img itemprop="logo" src="<?= lcms::resize('img/dominicus-logo-no-text.png', 300, 500, '', 80); ?>" alt="Dominicus College" class="img-responsive">
              </a>
            </div>
          </div>
          <div class="wrapper-logo-160-jaar">
            <a itemprop="url" class="img-responsive" href="<?= link::v('page_home'); ?>" title="Dominicus College">
              <img itemprop="logo" src="<?= lcms::resize('img/logo-160-jaar.png', 150, 150, '', 80); ?>" alt="Dominicus College" class="img-responsive">
            </a>
          </div>
        </div>

        <?= get_menu(0, '', 'header-nav list-unstyled'); ?>
      
        <ul class="social-list socal-list--left">
          <?php
            $socialmedia = get_artikelen_arr('art_socialmedia', get_variabele('social_groep_rechts_logo'), 'a.gewicht DESC');
            //print_pre($socialmedia);

            if (!empty($socialmedia)) {
              foreach ($socialmedia as $social) {
                $social_img = get_art_file_path($social['afbeelding'], $social['artikel_id']);
                if ($social['gebruik_interne_link'] == 1) {
                  $link = link::c($social['interne_pagina_link'])->return_absolute(true)->__toString();
                } else {
                  $link = lcms::niceLink($social['link']);
                }
                ?>
                <li class="social-item">
                  <a href="<?= lcms::niceLink($link); ?>" target="_blank" class="social-link" title="<?php echo $social['naam']; ?>">
                    <?php if ($social['afbeelding_ipv_icon'] == 1 && trim($social_img) != "") { ?>
                      <img src="<?= lcms::resize($social_img, 50, 50, '', 80); ?>" title="<?= $social['naam']; ?>">
                    <?php } else { ?>
                      <span class="<?= $social['icon']; ?>"></span>
                    <?php } ?>
                  </a>
                </li>
                <?php
              }
            }
          ?>
        </ul>
       
        <form class="search hidden-xs hidden-sm hidden-md" action="<?= link::v('page_zoekresultaten') ?>" method="get">
          <input class="search__input" type="text" id="zoekopdracht" name="zoekopdracht" placeholder="zoeken..."/>
          <button class="search__button" type="submit"><span class="icon-search"></span></button>
        </form>
        
        <ul class="social-list socal-list--right">
          <?php
            $socialmedia = get_artikelen_arr('art_socialmedia', get_variabele('social_groep_rechts_boven'), 'a.gewicht DESC');
            //print_pre($socialmedia);

            if (!empty($socialmedia)) {
              foreach ($socialmedia as $social) {
                $social_img = get_art_file_path($social['afbeelding'], $social['artikel_id']);
                if ($social['gebruik_interne_link'] == 1) {
                  $link = link::c($social['interne_pagina_link'])->return_absolute(true)->__toString();
                } else {
                  $link = lcms::niceLink($social['link']);
                }
                ?>
                <li class="social-item">
                  <a href="<?= lcms::niceLink($link); ?>" target="_blank" class="social-link" title="<?= $social['naam']; ?>">
                    <?php if ($social['afbeelding_ipv_icon'] == 1 && trim($social_img) != "") { ?>
                      <img src="<?= lcms::resize($social_img, 50, 50, '', 80); ?>" title="<?= $social['naam']; ?>">
                    <?php } else { ?>
                      <span class="<?= $social['icon']; ?>"></span>
                    <?php } ?>
                  </a>
                </li>
                <?php
              }
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</header>
