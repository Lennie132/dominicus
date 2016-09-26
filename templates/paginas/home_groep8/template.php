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
        <div class="col-md-4 col-sm-6 block-wrapper top-left-block">
            <div class="block-info-ouders">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'info-ouders'); ?>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 block-wrapper">
            <div class="block-hallo-achtste-groeper">
                <img class="icon-op-zoek" src="img/icon-op-zoek.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'hallo-achtste-groeper'); ?>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 block-wrapper">
            <div class="block-schrijf-in">
                <img class="icon-schrijf-in" src="img/icon-kom-kijken.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'schrijf-in'); ?>
            </div>
            <div class="block-kom-kijken-groep8">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'kom-kijken'); ?>
            </div>
        </div>
    </div>
</div>

<div class="groep-8-bottom-row">
    <div class="row">
        <div class="col-md-4 block-wrapper">
            <div class="block block-filmmakers">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'filmmakers'); ?>
                <img class="icon-filmmakers" src="img/icon-filmmakers.png">
            </div>
        </div>
        <div class="col-md-4 block-wrapper">
            <div class="block block-10-vragen">
                <img class="icon-10-vragen" src="img/icon-10-vragen.png">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], '10-vragen'); ?>
            </div>
        </div>
        <div class="col-md-4 block-wrapper">
            <div class="block block-monnikskap">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
            </div>
        </div>
    </div>
</div>