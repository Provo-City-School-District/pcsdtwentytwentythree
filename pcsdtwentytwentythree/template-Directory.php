<?php
/*
	Template Name: Directory Page
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	
		<?php custom_breadcrumbs(); ?>
		<article id="currentPage">
			<form class="directoryFilter">
			<label for="dsearch" class="visuallyhidden" id="directorySearch">Directory Search: </label>
			<input aria-labelledby="directorySearch" name="dsearch" type="text" class="text-input" id="filter" value="" placeholder="Search our staff..." />
			<!-- <img id="directorySearchIcon" src="//globalassets.provo.edu/image/icons/search-dk.svg" alt="" /> -->
			</form>
			

			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="directoryGrid">
						<?php the_content(); ?>
					</div>
			<?php endwhile;
			else :
			//echo '<p>No Content Found</p>';
			endif;
			?>
			<div class="clear"></div>
		</article>
	
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>