<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="/assets/css/bootstrap-responsive.css">
<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
<link type="text/css" rel="stylesheet" href="/assets/css/jquery-ui-1.10.3.custom.min.css">
</head>
<body>
<div class="container">
<?=$header?>
<?php $error = Session::get_flash('error'); ?>
<?php if($error) : ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="alert alert-error">
		  		<button type="button" class="close" data-dismiss="alert">&times;</button>
		  		<strong>Error!</strong> <?=$error?>
			</div>
		</div>
	</div>
<?php endif ?>
<?php $message = Session::get_flash('message'); ?>
<?php if($message) : ?>
	<div class="row-fluid">
		<div class="span12">
			<div class="alert alert-success">
		  		<button type="button" class="close" data-dismiss="alert">&times;</button>
		  		<?=$message?>
			</div>
		</div>
	</div>
<?php endif ?>
<?=$body?>
<?=$footer?>
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/highcharts.js"></script>
<script type="text/javascript" src="/assets/js/charts_from_tables.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui-1.10.3.custom.min.js"></script>

</body>
</html>
