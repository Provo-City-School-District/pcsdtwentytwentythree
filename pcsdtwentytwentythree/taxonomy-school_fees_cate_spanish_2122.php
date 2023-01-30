<?php
get_header();
?>
<main id="mainContent">
	<section class="content singlePost">
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/pagos-escolares-21-22/">Pagos Escolares 21-22</a> / </li>
			<li><?php single_cat_title(); ?></li>
		</ol>
		<article class="activePost">
			<h1>Fees For Activity Category : <?php single_cat_title(); ?></h1>

			<?php
			echo '<p>Fees listed are maximum fees and may not reflect actual fess paid.</p>';
			$cat = single_cat_title('', false);
			$args = array(
				'post_type' => 'pagos_escolares_2122',
				'orderby' => 'title',
				'order' => 'ASC',
				'posts_per_page' => -1,
				'tax_query' => array(array('taxonomy' => 'school_fees_cate_spanish_2122', 'field' => 'name', 'terms' => $cat))
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