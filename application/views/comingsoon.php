<!DOCTYPE html>
<html class="no-js">
	<head>
		<title><?php echo PROJECT_NAME ?></title>
		<meta charset="utf-8">
		<!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<![endif]-->
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/animations.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/main.css" class="color-switcher-link">
		<script src="<?php echo base_url('assets/') ?>js/vendor/modernizr-2.6.2.min.js"></script>
		<style>
			.comingsoon .content-soon {
		margin-top: 0px !important;
		}
		.s-py-lg-130 > [class*='container'] {
		padding-bottom: 85px !important;
		}
		</style>
	</head>
	<body>
		<div class="preloader">
			<div class="preloader_image"></div>
		</div>
		<!-- search modal -->
		<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<div class="widget widget_search">
				<form method="get" class="searchform search-form" action="http://webdesign-finder.com/">
					<div class="form-group">
						<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
					</div>
					<button type="submit" class="btn">Search</button>
				</form>
			</div>
		</div>
		<!-- Unyson messages modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
			<div class="fw-messages-wrap ls p-normal">
			</div>
		</div>
		<!-- eof .modal -->
		<!-- wrappers for visual page editor and boxed version of template -->
		<div id="canvas">
			<div id="box_wrapper">
				<section class="ls s-pt-10 s-pb-130 s-py-lg-130 page_title comingsoon ls s-overlay">
					<div class="d-none d-lg-block divider-70"></div>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center content-soon">
								<h2 class="special-heading">
								Coming Soon!
								</h2>
								<p>Stay Tuned!</p>
								<div id="comingsoon-countdown"></div>
								<a href="https://forms.gle/PJMCqcGJD1iG7UkR8">Looking for workshop , Click here...  we are improving ourself... </a>
								<div class="col-md-12 mt-4 text-center animate" data-animation="fadeInUp">
									<img class="margin-negative" src="images/footer_logo.png" alt="">
									<div class="widget widget_social_buttons">
										<a href="https://www.facebook.com/DoxProRobotics/" class="fa fa-facebook color-icon" title="facebook"></a>
										<a href="https://www.youtube.com/channel/UC0zd6pYNP_L_1JDco-pew7w" class="fa fa-youtube-play color-icon" title="youtube-play"></a>
										<a href="https://www.linkedin.com/in/doxpro-robotics-8057b1156/" class="fa fa-linkedin color-icon" title="linkedin"></a>
									</div>
								</div>
							</div>
							<div class="d-none d-lg-block divider-120"></div>
						</div>
					</div>
				</section>
			</div>
			<!-- eof #box_wrapper -->
		</div>
		<!-- eof #canvas -->
		<script src="<?php echo base_url('assets/') ?>js/compressed.js"></script>
		<script src="<?php echo base_url('assets/') ?>js/main.js"></script>
		<!-- <script src="<?php echo base_url('assets/') ?>js/switcher.js"></script> -->
	</body>
</html>