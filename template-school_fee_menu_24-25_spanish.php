<?php
/*
	Template Name: School Fee Menu - Spanish - 24-25
*/
get_header();
?>
<main id="mainContent" class="sidebar">
	<ol class="breadcrumbs" id="breadcrumbs">
		<li><a href="https://provo.edu/">Home</a> / </li>
		<li><a href="https://provo.edu/pagos-escolares/">Pagos Escolares</a> / </li>
		<li>Pagos Escolares 24-25</li>
	</ol>
	<div id="currentPage">
		<article class="activePost schoolFeesMenu">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div>
						<?php
						echo 'Tarifas listadas son las máximas y puden no reflejar la cantídad real a pagar.<span class="right"><a href="https://provo.edu/school-fees-24-25/">School Fees 24-25</a></span></p>';
						the_content();
						?>
						<h2>By Category</h2>
						<?php
						// Get the taxonomy's terms
						$terms = get_terms(
							array(
								'post_type' => 'pagos_escolares_2425',
								'taxonomy'   => 'school_fees_cate_spanish_2425',
								'hide_empty' => false,
							)
						);
						// Check if any term exists
						if (!empty($terms) && is_array($terms)) {
							// Run a loop and print them all
						?>
							<div class="postgrid grid3 altColors">

								<?php
								// print_r($terms);
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
								<a href="https://provo.edu/pagos-escolares-24-25/district-wide/">District Wide</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/amelia-earhart/">Amelia Earhart</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/canyon-crest/">Canyon Crest</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/edgemont/">Edgemont</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/franklin/">Franklin</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/lakeview/">Lakeview</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/provost/">Provost</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/provo-peaks/">Provo Peaks</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/rock-canyon/">Rock Canyon</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/spring-creek/">Spring Creek</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/sunset-view/">Sunset View</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/timpanogos/">Timpanogos</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/wasatch/">Wasatch</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/westridge/">Westridge</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/centennial-middle/">Centennial Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/shoreline-middle/">Shoreline Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/independence-high/">Independence High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/provo-high/">Provo High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/timpview-high/">Timpview High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/eschool/">eSchool</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/provo-adult-education/">Provo Adult Education</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/preschools/">Preschools</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-24-25/district-office/">District Office</a>
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
	<?php get_sidebar('school-fees'); ?>
</main>
<?php
get_footer();
?>