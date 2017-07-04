<html>
	<head>
		<title>ciBlog</title>
		<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css"> -->
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url() ?>">ciBlog</a>
      </div>
      <div id="navbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() ?>">Home</a></li>
					<li><a href="<?php echo base_url() ?>posts">Blog</a></li>
					<li><a href="<?php echo base_url() ?>categories">Categories</a></li>
          <li><a href="<?php echo base_url() ?>about">About</a></li>
        </ul>
				<ul class='nav navbar-nav navbar-right'>
					<?php if (!$this->session->userdata('logged_in')): ?>
						<li><a href="<?= base_url() ?>users/login">Login</a></li>
						<li><a href="<?= base_url() ?>users/register">Register</a></li>
					<?php else: ?>
						<li><a href="<?= base_url() ?>posts/create">Create Post</a></li>
						<li><a href="<?= base_url() ?>categories/create">Create Category</a></li>
						<li><a href="<?= base_url() ?>users/logout">Log Out</a></li>
					<?php endif ?>
				</ul>
      </div>
    </div>
  </nav>

  <div class="container">
		<!-- Flash messages -->
		<?php if ($this->session->flashdata('success_message')): ?>
			<p class="alert alert-success">
				<?= $this->session->flashdata('success_message') ?>
			</p>
		<?php endif; ?>
		<?php if ($this->session->flashdata('error_message')): ?>
			<p class="alert alert-danger">
				<?= $this->session->flashdata('error_message') ?>
			</p>
		<?php endif; ?>
