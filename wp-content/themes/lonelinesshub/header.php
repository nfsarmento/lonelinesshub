<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-SK9LRE9XWF"></script>
	</head>

	<body <?php body_class(); ?>>

        <?php wp_body_open(); ?>

		<?php if (!is_singular('llms_my_certificate')):
		 
			do_action( THEME_HOOK_PREFIX . 'before_page' ); 
	
		endif; ?>

		<div id="page" class="site">

			<?php do_action( THEME_HOOK_PREFIX . 'before_header' ); ?>

			<header id="masthead" class="<?php echo apply_filters( 'buddyboss_site_header_class', 'site-header site-header--bb' ); ?>">
				<?php do_action( THEME_HOOK_PREFIX . 'header' ); ?>
			</header>

			<?php do_action( THEME_HOOK_PREFIX . 'after_header' ); ?>

			<?php do_action( THEME_HOOK_PREFIX . 'before_content' ); ?>

			<div id="content" class="site-content">

				<?php do_action( THEME_HOOK_PREFIX . 'begin_content' ); ?>

				<div class="container">
					
					<?php 
						if( is_post_type_archive('resources') ) {
					?>		

					<div class="row">

						<div class="landing-col">

							<h1>Resources</h1>
							<p>These are publicly available resources for professionals tackling loneliness, curated by our Community Manager.
								<strong>If you are a Hub member</strong>, sign in to share and view resources in the private Connect and Collaborate areas.
							</p>
						</div>

					</div>
				
				   <div class="<?php echo apply_filters( 'buddyboss_site_content_grid_class', 'bb-grid site-content-grid' ); ?>">
					
					<?php } elseif ( is_blog() ) { ?>
							
					<div class="row">

						<div class="landing-col-blog">

							<h1>Blog</h1>

							<p>This is a public area of the Tackling Loneliness Hub. If you are a Hub member, sign in to access the private Connect, Collaborate, and Event areas.</p>

						</div>

					</div>		
							
					<div class="<?php echo apply_filters( 'buddyboss_site_content_grid_class', 'bb-grid site-content-grid' ); ?>">
					<?php }	else { ?>
						<div class="<?php echo apply_filters( 'buddyboss_site_content_grid_class', 'bb-grid site-content-grid' ); ?>">
					<?php }  ?>	