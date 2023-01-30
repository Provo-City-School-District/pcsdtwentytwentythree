<?php
/*
	Template Name: 2022 Department w/ sidebar includes calendar, news, menu
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<div id="currentPage">

		<!-- <h1><?php the_title(); ?></h1> -->
		<div class="grid2">

			<div>
				<h1><?php the_title(); ?></h1>
				<?php the_content();
				the_post_thumbnail();
				?>
			</div>
			<div>
				<?php
				$calSelect = get_field('select_cal');
				echo do_shortcode('[calendar id="' . $calSelect . '"]');
				if (get_field('fw_calendar_link_label')) {
				?>
					<a href="<?php echo get_field('fw_calendar_address'); ?>"><?php echo get_field('fw_calendar_link_label') ?></a>
				<?php
				}
				?>


			</div>
		</div>
		<nav class="wpMenu">
			<?php
			wp_reset_query();
			$topMenu = get_field('select_a_menu');
			wp_nav_menu(array('menu' => $topMenu));
			?>
		</nav>
		<?php
		$newscat = get_field('select_news_cat');
		$the_query = new WP_Query(array('posts_per_page' => 1, 'cat' => $newscat));
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) : $the_query->the_post();
		?>
				<article class="activePost">
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
					<header class="postmeta">
						<ul>
							<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>

						</ul>
					</header>
					<?php
					the_content();
					?>
				</article>

			<?php endwhile; ?>

		<?php else :
			echo '<p>No Content Found</p>';
		endif;
		//reset wp_query to current page
		wp_reset_query();
		?>






		<section class="postList">
			<div class="grid3">
				<?php
				$currentID = get_the_ID();
				//Removes news category from get_the_category
				$categoryID = get_the_category($post->ID);
				foreach ($categoryID as $category) {
					if ($category->term_id == 192) {
						continue;
					}
					$postcategories = '"' . $category->name . '"' . ',';
				}
				//use $postcategories for category_name if you want to display category related posts only. Use actual category name if you want to only use that category
				$my_query = new WP_Query(array('showposts' => 3, 'category_name'  => 'News', 'post__not_in' => array($currentID)));
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<article class="post">
						<div class="featured-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<header class="postmeta">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<ul>
								<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
							</ul>
						</header>
						<?php echo get_excerpt(); ?>
					</article>
				<?php endwhile; ?>
			</div>
		</section>






	</div>
	<!-- Current Page Content End -->

	<?php
	wp_reset_query();
	// print_r(get_fields());
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>