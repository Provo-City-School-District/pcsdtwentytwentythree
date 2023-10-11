<?php
/*
	Template Name: Child Nutrition Page  - sidebar
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
		<article id="activePost" class="activePost">
		<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<article>
						<?php if (has_post_thumbnail()) { ?>
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" class="right" />
						<?php }; ?>
						<?php the_content(); ?>
					</article>
			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			?>
		</article>
			
			<aside class="fwContent">
			<?php
			$cn_nda = get_post(71667);
			echo do_shortcode($cn_nda->post_content);
			?>
			</aside>

			<div class="clear"></div>
		</div>
	
	<?php get_sidebar('childNutrition'); ?>
</main>
<?php
get_footer();
?>