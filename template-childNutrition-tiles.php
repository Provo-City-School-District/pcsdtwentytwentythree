<?php
/*
	Template Name: Child Nutrition Tiles - sidebar
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<div id="currentPage">



		<div class="legacyTop">
			<article class="currentContent">

				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

			</article>
			<article id="slider">

				<?php
				$slidercat = get_field('slider_category');
				$args = array('posts_per_page' => 3, 'category_name'  => $slidercat);
				// Variable to call WP_Query.
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>">
							<div class="slide" style="background-image: url('<?php
																				if (get_field('featured_image', $post_id)) {
																					echo get_field('featured_image');
																				} elseif (has_post_thumbnail()) {
																					the_post_thumbnail_url();
																				} else {
																					echo get_stylesheet_directory_uri() . '/assets/images/building-image.jpg';
																				}
																				?>')">
								<span>
									<h2><?php the_title(); ?></h2>
									<p><?php echo get_excerpt(); ?></p>
								</span>
							</div>
						</a>

				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';

				endif;
				wp_reset_query();
				?>

			</article>
		</div>










		<section class="grid3 altColors">
			<?php if (get_field('square_1')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_1_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_1'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_2')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_2_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_2'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_3')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_3_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_3'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_4')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_4_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_4'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_5')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_5_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_5'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_6')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_6_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_6'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_7')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_7_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_7'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_8')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_8_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_8'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_9')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_9_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_9'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_10')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_10_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_10'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_11')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_11_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_11'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_12')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_12_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_12'); ?>
				</aside>
			<?php }	?>


		</section>
		<aside class="fwContent">
			<?php
			$cn_nda = get_post(71667);
			echo do_shortcode($cn_nda->post_content);
			?>
		</aside>

	</div>
	<!-- Current Page Content End -->
	<?php
	wp_reset_query();
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>