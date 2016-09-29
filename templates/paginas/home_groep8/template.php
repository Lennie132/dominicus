<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen * */
//$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen * */
//echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen * */
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');
?>
<div class="groep-8-top-row">
    <div class="row">
        <div class="col-lg-4 col-md-6 block-wrapper top-left-block">
            <div class="block-info-ouders">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'info-ouders'); ?>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 block-wrapper">
            <div class="block-hallo-achtste-groeper">
                <img class="icon-duim" src="<?= lcms::resize('img/icon-duim.png', 60, 60, '', 80); ?>">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'hallo-achtste-groeper'); ?>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 block-wrapper">
            <div class="block-schrijf-in">
                <img class="icon-inschrijven" src="<?= lcms::resize('img/icon-inschrijven.png', 45, 45, '', 80); ?>">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'schrijf-in'); ?>
            </div>
            <div class="block-kom-kijken-groep8">
                <img class="icon-kom-kijken" src="<?= lcms::resize('img/icon-kom-kijken.png', 65, 65, '', 80); ?>">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'kom-kijken'); ?>
            </div>
        </div>
    </div>
</div>

<div class="groep-8-bottom-row">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 block-wrapper">
            <div class="block block-filmmakers">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'filmmakers'); ?>
                <img class="icon-filmmakers" src="<?= lcms::resize('img/icon-filmmakers.png', 50, 50, '', 80); ?>">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 block-wrapper">
            <div class="block block-10-vragen">
                <img class="icon-vragen" src="<?= lcms::resize('img/icon-vragen.png', 100, 100, '', 80); ?>">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], '10-vragen'); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 block-wrapper">
            <div class="block block-monnikskap">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
            </div>
        </div>
    </div>
</div>