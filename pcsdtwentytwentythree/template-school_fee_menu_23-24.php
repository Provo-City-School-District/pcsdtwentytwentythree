<?php
/*
	Template Name: School Fee Menu 23-24
*/
get_header();
?>
<main id="mainContent" class="sidebar">
	<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/school-fees/">School Fees</a> / </li>
			<li>School Fees 23-24</li>
		</ol>
		<div id="currentPage">
		<article class="activePost schoolFeesMenu">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div>
						<?php
						echo '<p>fees listed are maximum fees and may not reflect actual fees paid.<span class="right"><a href="https://provo.edu/pagos-escolares-23-24/">Pagos escolares 23-24</a></span></p>';

						the_content();
						?>
						<h2>By Category</h2>
						<?php
						// Get the taxonomy's terms
						$terms = get_terms(
							array(
								'taxonomy'   => 'school_fees_categories_2324',
								'hide_empty' => true,
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
							<h2>By Location</h2>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/district-wide/">District Wide</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/amelia-earhart/">Amelia Earhart</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/canyon-crest/">Canyon Crest</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/edgemont/">Edgemont</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/franklin/">Franklin</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/lakeview/">Lakeview</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/provost/">Provost</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/provo-peaks/">Provo Peaks</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/rock-canyon/">Rock Canyon</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/spring-creek/">Spring Creek</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/sunset-view/">Sunset View</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/timpanogos/">Timpanogos</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/wasatch/">Wasatch</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/westridge/">Westridge</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/centennial-middle/">Centennial Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/dixon-middle/">Dixon Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/independence-high/">Independence High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/provo-high/">Provo High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/timpview-high/">Timpview High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/eschool/">eSchool</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/provo-adult-education/">Provo Adult Education</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/preschools/">Preschools</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/school-fees-23-24/district-office/">District Office</a>
							</article>
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