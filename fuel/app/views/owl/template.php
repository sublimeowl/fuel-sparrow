<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-pt" />

    <?= Asset::css('reset.css') ?>
    <?= Asset::css('text.css') ?>
    <?= Asset::css('960.css') ?>
    <?= Asset::css('main.css') ?>

    <?php Worker::plot_css(); ?>

    <title><?= isset ($title)?$title:'OWL' ?></title>

</head>
    <body>
	<div class="container_12" id="header">
	    <?= isset($header)?$header:View::factory('global/top',isset($user)?array('user'=>$user):null) ?>
	</div>
	<div class="clear"></div>
	<div class="container_12" id="content">
	    <div class="grid_9">
		<?= isset($content)?$content:'main content' ?>
	    </div>
	    <div class="grid_3">
		<?= isset($nav)?$nav:View::factory('owl/nav') ?>
	    </div>
	</div>
	<div class="clear"></div>
	<div class="container_12" id="footer">
	    <?= isset($footer)?$footer:View::factory('global/footer') ?>
	</div>
    </body>
</html>