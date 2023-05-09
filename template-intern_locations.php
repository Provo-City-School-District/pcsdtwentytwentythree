<?php
/*
	Template Name: Intern Locations Menu
*/
get_header();
?>
<main id="mainContent" class="sidebar">
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/career-technical-education/">Career & Technical Education</a> / </li>
			<li>Internship Locations Organized by Career Pathway</a></li>
		</ol>
		<div id="currentPage">
		<article class="activePost schoolFeesMenu">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div>
						<?php

						the_content();
						?>

						<?php
						// Get the taxonomy's terms
						$terms = get_terms(
							array(
								'taxonomy'   		=> 'internship_location_category',
								'parent'            => 0,
								'hide_empty' 		=> true
							)
						);
						// Check if any term exists
						if (!empty($terms) && is_array($terms)) {
							// Run a loop and print them all
						?>
							<div class="postgrid grid3 altColors">
								<?php
								foreach ($terms as $term) {
								?>
									<article class="post">
										<a href="<?php echo esc_url(get_term_link($term)) ?>"><?php echo $term->name; ?></a>
									</article>
								<?php
								}
								?>

							<?php
						}
							?>
							</div>
					</div>
			<?php endwhile;
			else :
				echo ('No school fees currently found for this location');
			endif;
			?>
			<div class="clear"></div>
		</article>
		</div>
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>