<?php
lcms_client_script::add_header_css('/css/header.less');
lcms_client_script::add_header_css('/css/menu.less');
lcms_client_script::add_header_js('flexmenu.min.js');
lcms_client_script::add_header_js('priority-nav.js');
lcms_client_script::add_header_js('main.js');
?>

<header>
    <div class="header-wrapper">
        <div class="header-main">
            <div class="header-buttons">   
            </div>

            <?php // lcms::Menu()->setNiveausDiep(2)->setClass('main-nav list-unstyled')->getHTML(); ?>
            <?= get_menu(0, '', 'header-nav nav-ul list-unstyled'); ?>

            <div class="header-social" >
                <div class="social" id="social">
                    <ul class="social-list">
                        <?php
                        //$socialmedia = get_artikelen_arr('art_socialmedia', '*', 'a.gewicht DESC');
                        //print_pre($socialmedia);

//                        if (!empty($socialmedia)) {
//                            foreach ($socialmedia as $social) {
//                                ?>
<!--                                <li class="social-item">
                                    <a href="//<?php //echo lcms::niceLink($social['Link']); ?>" target="_blank" class="social-link" title="<?php //echo $social['Naam']; ?>">
                                        <span class="//<?php //echo $social['Icon']; ?>"></span>
                                    </a>
                                </li>-->
                                <?php
//                            }
//                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>