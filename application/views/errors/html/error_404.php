<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>E-Library | 404 Error Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/css/apple/app.min.css" rel="stylesheet" />
	<link href="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN error -->
		<div class="error">
			<div class="error-code"><?= preg_replace('/[^0-9]/', '', $heading) ?></div>
			<div class="error-content">
				<div class="error-message"><?= preg_replace('/\d+/u', '', $heading) ?></div>
				<div class="error-desc mb-4">
					<?= $message ?>
				</div>
				<!-- <div>
					<a href="index.html" class="btn btn-success px-3">Go Home</a>
				</div> -->
			</div>
		</div>
		<!-- END error -->

		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- ================== BEGIN core-js ================== -->
	<script src="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/js/vendor.min.js"></script>
	<script src="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/js/app.min.js"></script>
	<script src="<?= 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/e-library' ?>/assets/js/theme/apple.min.js"></script>
	<!-- ================== END core-js ================== -->
</body>

</html>