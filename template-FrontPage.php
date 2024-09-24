<?php
/*
Template Name: Front Page
*/
get_header();

//fetch all stored variables from the control post
$get_to_know_fields = get_fields();
?>
<main id="mainContent" class="homeMainContent">

	<?php
	//query any alerts
	$my_query = new WP_Query(array('showposts' => $posts_to_show, 'category_name'  => 'alert', 'post_status' => 'publish'));
	?>
	<section class="alerts 
		<?php if ($my_query->found_posts <= 0) {
			echo 'hidden';
		} ?>">
		<?php
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<article class="post">
				<header class="postmeta">
					<ul>
						<li><img src="//globalassets.provo.edu/image/icons/calendar-lt.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
					</ul>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				</header>
				<?php //echo the_content(); 
				?>
			</article>
			<button class="closeAlert"><img src="https://globalassets.provo.edu/image/icons/round-delete-button-white.svg" alt="Close Alerts" /></button>
		<?php endwhile;
		?>

	</section>
	<div class="notgrid2">
		280 West 940 North Provo, Utah 801-374-4800
	</div>
	<?php
	wp_reset_query();
	?>

	<h1 class="novisibility">Provo City School District</h1>
	<section id="announcments">
		<h2>Provo City School District Announcements</h2>
		<?php

		if ($get_to_know_fields['video_or_slider'] == 'video') {
		?>

			<video id="heroVideo" autoplay loop controls>
				<source src="<?php echo $get_to_know_fields['video_url'] ?>" type="video/mp4">
				Your browser does not support MP4 Format videos or HTML5 Video.
			</video>
		<?php
		} elseif ($get_to_know_fields['video_or_slider'] == 'slider') {
		?>
			<div class="slick-wrapper">
				<?php
				$args = array('post_type' => 'announcement', 'posts_per_page' => 5, 'orderby'  => array('date' => 'DESC'));
				// Variable to call WP_Query.
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<article class="slide" style="background-image: url('<?php the_field('announcement_image'); ?>')">
							<img src="<?php the_field('announcement_image'); ?>" alt="<?php the_field('announcement_text'); ?>" class="mobile-slide" />
							<?php
							if (get_field('announcement_text')) {
							?>
								<div class="slide-text">
									<h3><?php the_title(); ?></h3>
									<p><?php
										the_field('announcement_text');
										$slideLink = get_field('announcement_link');
										$slideLinkLabel = get_field('announcement_link_label');
										if ($slideLink) { ?>
											<a href="<?php echo $slideLink ?>"><?php echo $slideLinkLabel ?></a>
										<?php }
										?>
									</p>
								</div>
							<?php
							}

							?>

						</article>

				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';
				endif;
				wp_reset_query();
				?>
			</div>
		<?php
		}

		?>
	</section>
	<div id="belowSlider">
		<section id="stayCurrent">

			<?php
			//get repeater field 'hero_link_group'
			// Check rows exists.
			if (have_rows('hero_link_group')) {
				// Loop through rows.
				echo '<ul>';
				while (have_rows('hero_link_group')) : the_row();
					//display row
					echo '<li class="' . get_sub_field('hero_link_icon') . '"><a href="' . get_sub_field('hero_link_address') . '">' . get_sub_field('hero_link_label') . '</a></li>';
				// End loop.
				endwhile;
				echo '</ul>';
			}
			?>

		</section>

		<section class="wpMenu">
			<?php
			wp_reset_query();
			$topMenu = get_field('select_a_menu');
			// $menu_args = array('menu' => '1009');
			wp_nav_menu(array('menu' => $topMenu));
			?>
		</section>
		<!-- I am Buttons Home Page End -->
		<section id="homeNews">
			<!-- News Home Page Start -->
			<h1>District News & Events</h1>
			<p>The latest news from Provo City School District</p>
			<div class="stories">
				<?php
				// excluding ID 1012. which is the Board Schedule.
				$the_query = new WP_Query(array('posts_per_page' => 3, 'category_name'  => array('news', 'sup-with-the-sup'), 'post_type'  => array('post', 'podcast')));
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<article>
							<a href="<?php the_permalink(); ?>">
								<div class="featured-image">

									<?php
									if (get_field('featured_image', $post_id)) {
									?>
										<img src="<?php echo get_field('featured_image'); ?>" alt="" class="" />
									<?php
									} elseif (has_post_thumbnail()) {
										the_post_thumbnail();
									} else { ?>
										<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/building-image.jpg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" width="217" height="175">
									<?php } ?>

								</div>
								<h2><?php the_title(); ?></h2>
							</a>
							<div class="articleContent">
								<?php
								echo get_excerpt();
								?>

							</div>

							<p class="postDate"><?php echo get_the_date(); ?></p>

						</article>
				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';
				endif;
				?>
			</div>
			<p class="moreNews"><a href="https://provo.edu/news/">Read More District News <span class="rightarrow"></span></a></p>
			<h2>News Categories</h2>
			<div class="categories-6h">

				<?php wp_nav_menu(array('menu' => 'frontpage-categories')); ?>
			</div>
		</section> <!-- News Home Page End -->
		<section class="sociallinks">
			<!-- Start Social Media -->
			<h1>Social Media</h1>
			See what's being discussed & shared
			<ul>
				<li>
					<a href="https://www.instagram.com/provocityschooldistrict/"><img src="https://globalassets.provo.edu/image/icons/instagram-social-network-logo-of-photo-camera.svg" alt="Link to Instagram" /></span></a>
				</li>
				<li><a href="https://www.facebook.com/provoschooldistrict/"><img src="https://globalassets.provo.edu/image/icons/facebook-app-logo.svg" alt="Link to Facebook" /></span>
					</a>
				</li>
			</ul>
		</section>


	</div><!-- End of post slider content -->
</main><!-- End of #mainContent -->
<?php
get_footer();
?>