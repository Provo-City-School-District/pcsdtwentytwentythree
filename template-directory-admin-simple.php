<?php
/* 
		Template Name: Admin (simplified) - photo,title, name, email, ifspeaksspanish
		Template Post Type: directory_page
	*/

	wp_reset_query();
	$display_category = get_field('display_category');
	$sort_by = get_field('sorting_by_value');
	//apply title filter
	$filter_title_abbreviations = get_field('apply_title_abbreviations');
	if ($filter_title_abbreviations == true) {
		//title abbreviation function
		include("directoryFilters/titleabbreviations.php");
	}
	//end of title filter
	$directory_args = array(
		'post_type' => 'directory',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'meta_key' => $sort_by,
		'orderby' => 'meta_value',
		'tax_query' => array(
			array(
				'taxonomy' => 'directory_category',
				'field'    => 'term_id',
				'terms' => $display_category
			)
		)
	);
	wp_reset_query();
	$sidebar = new WP_Query($directory_args);
	
	if ($sidebar->have_posts()) {
		while ($sidebar->have_posts()) {
			$sidebar->the_post();
	?>
			<div class="post personalvCard">
				<?php
				if (get_the_post_thumbnail_url()) {
				?>
					<img class="staff-member-photo" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_field('first_name') ?> <?php echo get_field('last_name') ?>" />
				<?php
				} else { ?>
					<img class="staff-member-photo" src="https://provo.edu/wp-content/uploads/2017/02/placeholer.jpg" alt="<?php echo get_field('first_name') ?> <?php echo get_field('last_name') ?>" />
				<?php }
				?>
				<ul>
					<?php
					if (get_field('title')) {
						$title = get_field('title');
						if ($filter_title_abbreviations == true) {
					?>
							<li class="title"><em><?php echo apply_abbreviations($title) ?></em></li>
						<?php
						} else {
						?>
							<li class="title"><em><?php echo $title ?></em></li>
						<?php
						}
					}
					if (get_field('speaks_spanish')) {
						?>
						<li class="speaksSpanish" lang="es"><em>Hablo Español</em></li>
					<?php
					}
					?>
					<li class="name"><strong><?php echo get_field('first_name') ?> <?php echo get_field('last_name') ?></strong></li>
					<?php
					if (get_field('phone')) {
					?>
						<li class="phone"><?php echo get_field('phone') ?></li>
					<?php
					}
	
					if (get_field('email')) {
					?>
						<li class="email"><a href="https://provo.edu/district-office-directory/email-form?staff=<?php echo get_the_ID() ?>">Email <?php echo get_field('first_name') . ' ' . get_field('last_name') ?></a></li>
					<?php
					}
					?>
					
					
					
				</ul>
			</div>
	<?php
		}
	} else {
		//nothing
		//echo 'no content';
	}
	wp_reset_postdata();
?>