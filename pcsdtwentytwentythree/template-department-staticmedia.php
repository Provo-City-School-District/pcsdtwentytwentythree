<?php
/*
	Template Name: Static Media - Department Template
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<div id="currentPage">
	<div class="grid2">
			<div>
			<?php
		if (have_posts()) :
			while (have_posts()) : the_post(); ?>

				<article class="currentPageContent">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
		<?php endwhile;
		else :
			echo '<p>No Content Found</p>';
		endif;
		?>
			</div>
			<div>
			<?php
		$slide2image = get_field('static_image');
		$slide2vid = get_field('static_video');
		if ($slide2image['background_image']) {
		?>
			<article class="staticImage" style="background-image: url('<?php echo $slide2image['background_image']; ?>')">
				<div class="slidertext">
					<?php if ($slide2image['tile_heading']) { ?><h2><?php if ($slide2image['tile_heading_link']) { ?><a href="<?php echo $slide2image['tile_heading_link']; ?>"><?php echo $slide2image['tile_heading']; ?></a><?php } ?></h2><?php } ?>
					<?php if ($slide2image['tile_paragraph']) { ?><p><?php echo $slide2image['tile_paragraph']; ?></p><?php } ?>
				</div>
			</article>
		<?php
		} else {
		?>
			<article class="staticVid">
				<video controls>
					<source src="<?php echo $slide2vid['video_file'] ?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</article>
		<?php
		}
		?>
			</div>
		</div>
		


		
	
	
		<?php
		wp_reset_query();
		if (get_field('display_tiles') == 1) {
		?>
			<section class="grid3 altColors">
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
	<?php
	wp_reset_query();
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>

<?php
get_footer();
?>