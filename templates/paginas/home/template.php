<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen * */
//$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen * */
//echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen * */
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');
?>

<div class="top-row">
    <div class="row">
        <div class="col-md-4 col-sm-6 block-wrapper top-left-block">
            <div class="block-in-beeld">
                <img class="icon-in-beeld" src="img/icon-in-beeld.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'in-beeld'); ?>
            </div>
            <div class="block-btn-row">
                <div class="col-md-6 block-btn-wrapper-left">
                    <div class="block-btn"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'knop-1'); ?></div>
                </div>
                <div class="col-md-6 block-btn-wrapper-right">
                    <div class="block-btn"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'knop-2'); ?></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 block-wrapper">
            <div class="block-op-zoek">
                <img class="icon-op-zoek" src="img/icon-op-zoek.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'op-zoek'); ?>
            </div>
            <div class="block-btn-row">
                <div class="col-md-6 block-btn-wrapper-left">
                    <div class="block-btn"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'knop-3'); ?></div>
                </div>
                <div class="col-md-6 block-btn-wrapper-right">
                    <div class="block-btn"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'knop-4'); ?></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 block-wrapper">
            <div class="right-column">
                <div class="col-md-6 block-wrapper-left">
                    <div class="block-kom-kijken"><img class="icon-kom-kijken" src="img/icon-kom-kijken.png"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'kom-kijken'); ?></div>
                </div>
                <div class="col-md-6 block-wrapper-right">
                    <div class="block-info-groep8"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'info-groep-8'); ?></div>
                    <div class="block-maak-app"><?php echo lcms::Template()->getSectieContent($DATA['page'], 'maak-app'); ?></div>
                </div>
                <div class="col-md-12 block-afbeelding">
                    <?php echo lcms::Template()->getSectieContent($DATA['page'], 'blok-foto'); ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<div class="middle-row">
    <div class="row">
        <div class="col-md-4 block-wrapper">
            <div class="block block-talenten">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'talenten'); ?>
                <img class="icon-talenten" src="img/icon-talenten.png">
            </div>
        </div>
        <div class="col-md-4 block-wrapper">
            <div class="block block-filmmakers">
                <img class="icon-filmmakers" src="img/icon-filmmakers.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'filmmakers'); ?>
            </div>
        </div>
        <?php echo lcms::Template()->getSectieContent($DATA['page'], '10-jaar-later'); ?>
    </div>
</div>

<div class="bottom-row">
    <div class="row no-margin">
        <div class="block-fancy-colored"></div>
    </div>
    <div class="row">
        <div class="block-fancy">
            <div class="block-fancy-content">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'nieuws-activiteiten'); ?>
            </div>
        </div>
        <div class="block-fancy">
            <div class="block-fancy-content">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'waarom-dc'); ?>
            </div>
        </div>
        <div class="block-fancy">
            <div class="block-fancy-content">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
            </div>
        </div>
    </div>
</div>