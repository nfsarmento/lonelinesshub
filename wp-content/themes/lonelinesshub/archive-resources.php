<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();

?>
<?php if (is_active_sidebar('sidebar-resources')) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-resources'); ?>
    </div>
<?php endif; ?>

<?php if (have_posts()) : ?>

<div class="container">

	<div class="row row-resources">

		<?php
        while (have_posts()) :
      	the_post();
    ?>

		<div class="col-6">

			<?php
        global $post;
      ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="post-inner-wrap">

				<div class="entry-content-wrap">

						<?php if (has_post_thumbnail()) { ?>
							<a href="<?php echo esc_url(get_permalink()) ?>">
							<figure class="entry-media entry-img bb-vw-container1">
								<?php the_post_thumbnail('large', array( 'sizes' => '(max-width:768px) 768px, (max-width:1024px) 1024px, (max-width:1920px) 1920px, 1024px' )); ?>
							</figure>
							</a>
						<?php } ?>
								
						<header class="entry-header">
							
						  <a href="<?php echo esc_url( get_permalink() ); ?>">
							<h2 class="entry-title"><?php echo the_title(); ?></h2>
						  </a>
							
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php //the_excerpt(); ?>
						</div>


				</div>

			</div>

		</article>

	</div>

		<?php
      endwhile;
    ?>

	</div>

</div>

	<?php
    buddyboss_pagination();
		else :
    get_template_part('template-parts/content', 'none');
  ?>

<?php endif; ?>

<?php
get_footer();
