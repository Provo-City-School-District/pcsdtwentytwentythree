<?php
/*
	Template Name: 2022 Department Template includes news highlights
*/

get_header();
?>
<main id="mainContent" class="fullwidth">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<div id="currentPage">

		<h1><?php the_title(); ?></h1>
		<section id="stayCurrent" class="grid2 register">
			<ul>
				<li><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/icons/dark/socialmedia-insta.svg" alt="link to Instagram" /></a></li>
				<li><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/icons/dark/socialmedia-twitter.svg" alt="link to Twitter" /></a></li>
				<li><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/icons/dark/socialmedia-facebook.svg" alt="link to Facebook" /></a></li>
			</ul>
			<ul>
				<li><a href="<?php echo get_field('hero_link_address'); ?>"><?php echo get_field('hero_link_label'); ?></a></li>
			</ul>
		</section>
		<nav class="wpMenu">
			<?php
			wp_reset_query();
			$topMenu = get_field('select_a_menu');
			wp_nav_menu(array('menu' => $topMenu));
			?>
		</nav>
		<section class="teasers">
			<?php
			$slidercat = get_field('slider_category');
			$the_query = new WP_Query(array('posts_per_page' => 3, 'category_name'  => $slidercat));
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
						<article>
							<p><?php the_title();  ?></p>
							<i class="arrow"></i>
						</article>
					</a>
			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			?>
		</section>
		<nav class="employeeHighlights">
			<ul class="menu">
				<?php
				wp_reset_query();
				// Check rows existexists.
				if (have_rows('highlight_links')) :
					// Loop through rows.
					while (have_rows('highlight_links')) : the_row();
				?>
						<li><a href="<?php echo get_sub_field('highlight_link_address'); ?>"><strong><?php echo get_sub_field('highlight_link_label'); ?></strong><i class="<?php echo get_sub_field('highlight_link_class'); ?>"></i></a></li>
				<?php
					// End loop.
					endwhile;

				// No value.
				else :
				// Could Do something...
				endif;
				?>

			</ul>
		</nav>

		<?php
		wp_reset_query();
		if (get_field('display_tiles') == 1) {
		?>
			<section class="departmentTiles">
				<?php
				$pageTiles = get_field('page_tiles');

				if ($pageTiles) {
					foreach ($pageTiles as $tile) {
						$image = $tile['tile_photo'];
				?>
						<aside class="tile">


							<?php
							if ($tile['tile_photo']) {
							?>
								<div class="featured-image">
									<img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="" />
								</div>
							<?php
							}
							?>
							<h2><?php echo wpautop($tile['tile_title']); ?> </h2>
							<?php echo wpautop($tile['tile_content']); ?>
						</aside>
				<?php
					}
				}
				?>
			</section><!-- departmentResources end -->

		<?php
		} ?>
	</div>
	<!-- Current Page Content End -->
</main>
<?php
get_footer();
?>