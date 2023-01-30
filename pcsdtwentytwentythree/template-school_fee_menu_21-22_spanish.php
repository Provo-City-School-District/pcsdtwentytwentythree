<?php
/*
	Template Name: School Fee Menu - Spanish - 21-22
*/
get_header();
?>
<main id="mainContent" class="sidebar">
	
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/pagos-escolares/">Pagos Escolares</a> / </li>
			<li>Pagos Escolares 21-22</li>
		</ol>
		<div id="currentPage">
		<article class="activePost schoolFeesMenu">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div>
						<?php
						echo 'Tarifas listadas son las máximas y puden no reflejar la cantídad real a pagar.<span class="right"><a href="https://provo.edu/school-fees-21-22/">School Fees 21-22</a></span></p>';
						the_content();
						?>
						<h2>By Category</h2>
						<?php
						// Get the taxonomy's terms
						$terms = get_terms(
							array(
								'post_type' => 'pagos_escolares_2122',
								'taxonomy'   => 'school_fees_cate_spanish_2122',
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
								<a href="https://provo.edu/pagos-escolares-21-22/district-wide/">District Wide</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/amelia-earhart/">Amelia Earhart</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/canyon-crest/">Canyon Crest</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/edgemont/">Edgemont</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/franklin/">Franklin</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/lakeview/">Lakeview</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/provost/">Provost</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/provo-peaks/">Provo Peaks</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/rock-canyon/">Rock Canyon</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/spring-creek/">Spring Creek</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/sunset-view/">Sunset View</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/timpanogos/">Timpanogos</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/wasatch/">Wasatch</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/westridge/">Westridge</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/centennial-middle/">Centennial Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/dixon-middle/">Dixon Middle</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/independence-high/">Independence High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/provo-high/">Provo High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/timpview-high/">Timpview High</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/provo-transition-services-ebph/">Provo Transition Services/EBPH</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/eschool/">eSchool</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/provo-adult-education/">Provo Adult Education</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/preschools/">Preschools</a>
							</article>
							<article class="post">
								<a href="https://provo.edu/pagos-escolares-21-22/district-office/">District Office</a>
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