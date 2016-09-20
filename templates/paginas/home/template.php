<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen **/
//$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen **/
echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen **/
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');

?>

<div class="middle-row">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'nieuws-activiteiten'); ?>
            </div>
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'waarom-dc'); ?>
            </div>
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
            </div>
        </div>
    </div>
</div>

<div class="bottom-row">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'nieuws-activiteiten'); ?>
            </div>
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'waarom-dc'); ?>
            </div>
            <div class="col-md-4">
                <?php echo lcms::Template()->getSectieContent($DATA['page'], 'monnikskap'); ?>
            </div>
        </div>
    </div>
</div>