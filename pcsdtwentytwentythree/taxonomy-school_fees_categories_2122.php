<?php
get_header();
?>
<main id="mainContent">
	<section class="content singlePost">
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/school-fees/">School Fees</a> / </li>
			<li><?php single_cat_title(); ?></li>
		</ol>
		<article class="activePost">
			<h1>Fees For Activity Category : <?php single_cat_title(); ?></h1>

			<?php
			echo '<p>Fees listed are maximum fees and may not reflect actual fess paid.</p>';
			$cat = single_cat_title('', false);
			$args = array(
				'post_type' => 'school_fees_21-22',
				'orderby' => 'title',
				'order' => 'ASC',
				'posts_per_page' => -1,
				'tax_query' => array(array('taxonomy' => 'school_fees_categories_2122', 'field' => 'name', 'terms' => $cat))
			);
			$query = new WP_query($args);
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post(); ?>
					<ul>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					</ul>
			<?php
				endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			?>
		</article>
	</section>
	<?php get_sidebar('school-fees'); ?>
</main>
<?php
get_footer();
?>