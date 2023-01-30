<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/career-technical-education/">Career & Technical Education</a> / </li>
			<li><a href="https://provo.edu/career-technical-education/wbl-internships-caps/cte-internship-locations/">Internship Locations Organized by Career Pathway</a> / </li>
			<li><?php single_post_title(); ?></li>
		</ol>
		<div id="currentPage">
		<article class="activePost feePost">
			<?php

			?>
			<p class="lastmodified"><em>Last modified: <?php the_modified_date(); ?></em></p>
			<?php
			wp_reset_query();
			wp_reset_postdata();
			$fields = get_fields();
			?>
			<h1><?php single_post_title(); ?></h1>
			<?php
			if ($fields['address']) {
			?>
				<p><strong>Address:</strong> <?php echo $fields['address'] ?></p>
			<?php
			}
			if ($fields['timeschedule']) {
			?>
				<p><strong>Time/Schedule:</strong> <?php echo $fields['timeschedule'] ?></p>
			<?php
			}
			if ($fields['prerequisite']) {
			?>
				<p><strong>Prerequisite:</strong> <?php echo $fields['prerequisite'] ?></p>
			<?php
			}
			if ($fields['internship_description']) {
			?>
				<h2>Internship Description:</h2>
			<?php echo $fields['internship_description'];
			}
			?>
			<?php
			wp_reset_query();
			wp_reset_postdata();
			?>
			<div class="bottom"></div>
		</article>
		</div>
	<?php get_sidebar('cte'); ?>
</main>
<?php
get_footer();
?>