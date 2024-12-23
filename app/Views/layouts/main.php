<?php

// File: app/Views/layouts/main.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?= base_url('img/icons/icon-48x48.png') ?>" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>

	<link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?= $this->renderSection('styles') ?>
</head>

<body>
	<div class="wrapper">

        <!-- Include Sidebar -->
        <?= $this->include('layouts/sidebar') ?>

		<div class="main">

			<?= $this->include('layouts/navbar') ?>

			<main class="content">
				<?= $this->renderSection('content') ?>
			</main>

			<?= $this->include('layouts/footer') ?>
		</div>
	</div>

	<?= $this->include('layouts/scripts') ?>

</body>

</html>