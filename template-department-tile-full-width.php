<?php
/*
	Template Name: Department - Full Width with Repeat Tiles
	Filename: template-department-tile-full-width.php
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<div id="currentPage">

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post(); ?>

				<article class="fwCurrentPage">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
		<?php endwhile;
		else :
			echo '<p>No Content Found</p>';
		endif;
		?>



	</section>
	<section class="grid3 altColors">
		<?php
		$pageTiles = get_field('page_tiles');

		if ($pageTiles) {
			foreach ($pageTiles as $tile) {
				$image = $tile['tile_photo'];
		?>
				<aside class="tile">
					<div class="featured-image">
						<img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="" />
					</div>
					<?php echo wpautop($tile['tile_content']); ?>
				</aside>
		<?php
			}
		}
		?>
	</section><!-- departmentResources end -->
	</div>
	<?php
	$sidebar = get_field('sidebar');

	get_sidebar($sidebar);

	?>
</main>

<?php
get_footer();
?>