<?php
/*
	Template Name: School Fee Menu - Spanish - 22-23
*/
get_header();
?>
<main id="mainContent" class="sidebar">
	<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/pagos-escolares/">Pagos Escolares</a> / </li>
			<li>Pagos Escolares 22-23</li>
		</ol>
		<div id="currentPage">
		<article class="activePost schoolFeesMenu">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div>
						<?php
						echo 'Tarifas listadas son las máximas y puden no reflejar la cantídad real a pagar.<span class="right"><a href="https://provo.edu/school-fees-22-23/">School Fees 22-23</a></span></p>';
						the_content();
						?>
						<h2>By Category</h2>
						<?php
						// Get the taxonomy's terms
						$terms = get_terms(
							array(
								'post_type' => 'pagos_escolares_2223',
								'taxonomy'   => 'school_fees_cate_spanish_2223',
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
								<a href="https://provo.edu/pagos-escolares-22-23/district-wide/">District Wide</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/amelia-earhart/">Amelia Earhart</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/canyon-crest/">Canyon Crest</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/edgemont/">Edgemont</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/franklin/">Franklin</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/lakeview/">Lakeview</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/provost/">Provost</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/provo-peaks/">Provo Peaks</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/rock-canyon/">Rock Canyon</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/spring-creek/">Spring Creek</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/sunset-view/">Sunset View</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/timpanogos/">Timpanogos</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/wasatch/">Wasatch</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/westridge/">Westridge</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/centennial-middle/">Centennial Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/dixon-middle/">Dixon Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/independence-high/">Independence High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/provo-high/">Provo High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/timpview-high/">Timpview High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/eschool/">eSchool</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/provo-adult-education/">Provo Adult Education</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/preschools/">Preschools</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-22-23/district-office/">District Office</a>
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