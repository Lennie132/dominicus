<?php
global $DATA;
lcms_client_script::add_header_css('/css/header.less');
lcms_client_script::add_header_css('/css/menu.less');
lcms_client_script::add_header_js('priority-nav.js');
lcms_client_script::add_header_js('main.js');
?>
<header>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>
  <div class="header-wrapper">
    <div class="header-bar">
      <div class="header-main">
        <div class="header-logo">
          <div class="wrapper-logo">
            <?php
            if ($DATA['page'] == get_variabele('page_home') || $DATA['page'] == get_variabele('page_home_groep8')) {
              echo lcms::Logo()->setMaxSizes(999, 999)->getHTML();
            } else { ?>
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

          <?php // lcms::Menu()->setNiveausDiep(2)->setClass('main-nav list-unstyled')->getHTML();  ?>
          <?= get_menu(0, '', 'header-nav list-unstyled'); ?>

          <form class="search hidden-xs hidden-sm" action="<?= link::v('page_zoekresultaten') ?>" method="get">
            <input class="search__input" type="text" id="zoekopdracht" name="zoekopdracht" placeholder="zoeken..."/>
            <button class="search__button" type="submit"><?= get_variabele("knop_zoek"); ?></button>
          </form>

          <ul class="social-list">
            <?php
            $socialmedia = get_artikelen_arr('art_socialmedia', '*', 'a.gewicht DESC');
            //print_pre($socialmedia);

            if (!empty($socialmedia)) {
              foreach ($socialmedia as $social) {
                ?>
                <li class="social-item">
                  <a href="<?php echo lcms::niceLink($social['link']); ?>" target="_blank" class="social-link" title="<?php echo $social['naam']; ?>">
                    <span class="<?php echo $social['icon']; ?>"></span>
                  </a>
                </li>
                <?php
              }
            }
            ?>
            <li class="social-item">
              <div
              class="fb-like"
              data-href="https://www.facebook.com/DominicusCollege"
              data-width="90"
              data-layout="button"
              data-action="like"
              data-size="small"
              data-show-faces="false"
              data-share="false">
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
