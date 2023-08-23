<?php
get_header();
?>
<main id="mainContent" class="sidebar">

	<ol class="breadcrumbs" id="breadcrumbs">
		<li><a href="https://provo.edu/">Home</a> / </li>
		<li>Podcasts / </li>
		<li><?php single_cat_title(); ?></li>
	</ol>
	<div id="currentPage">
		<article class="activePost">
			<h1>Podcasts: <?php single_cat_title(); ?></h1>
			<img src="https://provo.edu/wp-content/uploads/2023/08/podcast-banner-4.jpeg" alt="Sup With the Sup" />
			<?php
			if (have_posts()) :
			?>
				<div class="series-archive">
					<?php while (have_posts()) : the_post(); ?>
						<div class="episode">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if (function_exists('ssp_player')) : ?>
								<div class="episode-player">
									<?php //echo ssp_player(); 
									// echo do_shortcode('[ss_player]');
									the_excerpt(  );
									?>
								</div>
							<?php endif; ?>
							
						</div>
					<?php endwhile; ?>
				</div>
			<?php
			else :
				echo 'No episodes found.';
			endif;
			?>
		</article>
	</div>
	<?php get_sidebar('categories'); ?>
</main>
<?php
get_footer();
?>