<?php
/*
		Template Name: 2022 Page - Link List
	*/
get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<div id="currentPage">
	<h1><?php the_title(); ?></h1>
		<?php
		if (get_field('content_location') == 'before') {
			the_content();
		}

		// check if the repeater field has rows of data
		if (have_rows('link_info')) :
		?>
			<ul class="imageListGrid">
				<?php
				// loop through the rows of data
				while (have_rows('link_info')) : the_row();

				?>
					<li>
						<img src="<?php the_sub_field('link_img'); ?>" alt="<?php the_sub_field('link_label'); ?>" />
						<a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_label'); ?></a>
					</li>
				<?php
				endwhile;
				?>
			</ul>
		<?php
		else :
		// no rows found
		endif;
		if (get_field('content_location') == 'after') {
			the_content();
		}
		?>
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