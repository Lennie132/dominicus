<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen * */
//$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen * */
//echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen * */
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');
?>

<div class="top-row">
    <div class="container">
        <div class="row">
            <div class="col-md-4 block">
            </div>
        </div>
    </div>

    <div class="middle-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4 block-wrapper">
                    <div class="block">
                        <?php echo lcms::Template()->getSectieContent($DATA['page'], 'talenten'); ?>
                    </div>

                </div>
                <div class="col-md-4 block-wrapper">
                    <div class="block">
                        <?php echo lcms::Template()->getSectieContent($DATA['page'], 'filmmakers'); ?>
                    </div>

                </div>
                <div class="col-md-4 block-wrapper">
                    <div class="block">
                        <?php echo lcms::Template()->getSectieContent($DATA['page'], '10-jaar-later'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bottom-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4 block-outside">
                    <?php echo lcms::Template()->getSectieContent($DATA['page'], 'nieuws-activiteiten'); ?>
                </div>
                <div class="col-md-4 block-middle-wrapper">
                    <div class="block-middle">
                        <?php echo lcms::Template()->getSectieContent($DATA['page'], 'waarom-dc'); ?>
                    </div>
                    <div class="col-md-4 block-fix">
                        <img src="img/home-panel-left.jpg" class="panel">
                        <img src="img/home-panel-right.jpg" class="panel pull-right">
                    </div>
                </div>


                <div class="col-md-4 block-outside">
                    <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
                </div>
            </div>
        </div>
    </div>