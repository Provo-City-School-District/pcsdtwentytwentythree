<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/career-technical-education/">Career & Technical Education</a> / </li>
			<li><a href="https://provo.edu/career-technical-education/wbl-internships-caps/cte-internship-locations/">Internship Locations Organized by Career Pathway</a> / </li>
			<li><?php single_cat_title(); ?></li>
		</ol>
		<div id="currentPage">
		<article class="activePost">
			<h1>CTE Career Pathways : <?php single_cat_title(); ?></h1>
			<?php
			$current_category = get_queried_object('cat');
			$post_count = $current_category->count;
			$my_internship_cat = array(
				'current_category' => $current_category->term_id,
				'taxonomy' => 'internship_location_category',
				'title_li' => 0,
				'hide_empty' => 0,
			);
			//  print_r($current_category);
			if (is_tax('internship_location_category', 'agriculture-food-natural-resources')) {

				$my_internship_cat['parent'] = 877;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'arts-audio-visual-technology-communications')) {
				$my_internship_cat['parent'] = 887;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'business-administration')) {
				$my_internship_cat['parent'] = 867;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'computer-science-information-technology')) {
				$my_internship_cat['parent'] = 891;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'education-training')) {
				$my_internship_cat['parent'] = 896;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'health-science')) {
				$my_internship_cat['parent'] = 898;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
			<?php
			} elseif (is_tax('internship_location_category', 'transportation-distribution-logistics')) {
				$my_internship_cat['parent'] = 901;
			?>
				<ul>
					<?php
					wp_list_categories($my_internship_cat);
					?>
				</ul>
				<?php
			} else {
				if ($post_count > 1) {
				?>
					<ul>
						<?php
						wp_list_categories($my_internship_cat);
						?>
					</ul>
				<?php
				} else {
				?>
					<ul>
						<?php
						if (have_posts()) :
							while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile;  ?>
						<?php else :
							echo '<p>No Content Found</p>';
						endif;
						?>
					</ul>
			<?php
				}
			}
			?>
		</article>
		</div>
	<?php get_sidebar('categories'); ?>
</main>
<?php
get_footer();
?>