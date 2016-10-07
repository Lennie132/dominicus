<?php
/** Hier eventeel nog een sfeerbeeld of kruimels o.i.d. inladen * */
$sfeer = get_sfeerafbeelding($DATA['page'], 1);

/** Hier wordt het grid met de content ingelezen * */
//echo $this->buildHTMLgrid($DATA['page']);

/** Individuele content inlezen * */
//echo lcms::Template()->getSectieContent($DATA['page'], '<id van sectie>');
?>

<?php
if (trim($sfeer) == '') {
  $sfeer = 'img/standaard-sfeerbeeld.jpg';
}
?>
<div class="sfeerbeeld" style="background-image: url('<?= lcms::resize($sfeer, 1920, 320, '1920x320', 80); ?>');"></div>

<div class="titel-wrapper">
  <div class="containter">
    <div class="container">
      <div class="col-xs-12">
        <h1><?php echo get_pagina_title($pageid) ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12"><?php
      /** Hier wordt het grid met de content ingelezen * */
      echo get_all_content_html();
      ?></div>
    </div>
  </div>

</div>
