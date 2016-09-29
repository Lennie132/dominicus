<?php
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
                        <?php echo get_logo_html(); ?>
                    </div>
                    <div class="wrapper-logo-no-text">
                        <div class="logo" itemscope="" itemtype="http://schema.org/Organization">
                            <a itemprop="url" class="img-responsive" href="http://dev.lined.nl/dominicus2016/" title="Dominicus College">
                                <img itemprop="logo" src="<?= lcms::resize('img/dominicus-logo-no-text.png', 300, 500, '', 80); ?>" alt="Dominicus College" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="wrapper-logo-160-jaar">
                        <img itemprop="logo" src="<?= lcms::resize('img/logo-160-jaar.png', 120, 120, '', 80); ?>" alt="Dominicus College" class="img-responsive">
                    </div>
                </div>

                <?php // lcms::Menu()->setNiveausDiep(2)->setClass('main-nav list-unstyled')->getHTML(); ?>
                <?= get_menu(0, '', 'header-nav list-unstyled'); ?>

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
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FDominicusCollege&width=116&layout=button_count&action=like&show_faces=false&share=false&height=21&appId" width="130" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>