<?php
/*
	Template Name: Department Tile - Full width
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
			<h1><?php the_title(); ?></h1>
			<?php the_content();
					
			
			wp_reset_query();
			?>
		

		<section class="grid3 altColors">
			<?php if (get_field('square_1')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_1_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_1'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_2')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_2_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_2'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_3')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_3_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_3'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_4')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_4_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_4'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_5')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_5_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_5'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_6')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_6_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_6'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_7')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_7_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_7'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_8')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_8_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_8'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_9')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_9_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_9'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_10')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_10_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_10'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_11')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_11_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_11'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_12')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_12_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_12'); ?>
				</aside>
			<?php }	?>
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