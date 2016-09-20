<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen **/
$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen **/
echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen **/
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');

?>

<?php
if (trim($sfeer) != '') {
    ?>
    <div class="sfeerbeeld-wrapper-335 sfeerbeeld" style="background-image: url('<?= lcms::resize($sfeer, 1920, 335, '', 80); ?>');"></div>
    <?php
}
?>

<div class="titel-wrapper">
    <div class="col-xs-12">
        <h1><?php echo get_pagina_title($pageid) ?></h1>
    </div>
</div>

<div class="content-wrapper">
    <?php
    /** Hier wordt het grid met de content ingelezen * */
    echo $this->buildHTMLgrid($DATA['page']);
    ?>
</div>