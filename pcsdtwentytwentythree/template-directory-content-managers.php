<?php
/* 
		Template Name: Content Managers Directory Template
		Template Post Type: directory_page
	*/
$display_category = get_field('display_category');
$sort_by = get_field('sorting_by_value');
$directory_args = array(
	'post_type' => 'directory',
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
$sidebar = new WP_Query($directory_args);
?>

	<?php
	if ($sidebar->have_posts()) {
		while ($sidebar->have_posts()) {
			$sidebar->the_post();
	?>

			<article class="post personalvCard">
				<?php
				if (get_the_post_thumbnail_url()) {
				?>
					<img class="staff-member-photo" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_field('first_name') ?> <?php echo get_field('last_name') ?>" />
				<?php
				} else {
				?>
					<img class="staff-member-photo" src="https://provo.edu/wp-content/uploads/2017/02/placeholer.jpg" alt="<?php echo get_field('first_name') ?> <?php echo get_field('last_name') ?>" />
				<?php
				}
				?>
				<ul>
					<?php
					if (get_field('website_address')) {
					?>
						<li class="website"><a href="<?php echo get_field('website_address') ?>"><?php echo get_field('website_link_label') ?></a></li>
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
					?>
					<?php
					if (get_field('email')) {
					?>
						<li class="email"><a href="https://provo.edu/district-office-directory/email-form?staff=<?php echo get_the_ID() ?>">Email <?php echo get_field('first_name') . ' ' . get_field('last_name') ?></a></li>
					<?php
					}
					?>
					<?php
					if (get_field('facebook_url')) {
					?>
						<li><a href="<?php echo get_field('facebook_url') ?>">Facebook</a></li>
					<?php
					}
					?>
					<?php
					if (get_field('twitter_url')) {
					?>
						<li><a href="<?php echo get_field('twitter_url') ?>">Twitter</a></li>
					<?php
					}
					?>
					<?php
					if (get_field('instagram_url')) {
					?>
						<li><a href="<?php echo get_field('instagram_url') ?>">Instagram</a></li>
					<?php
					}
					?>
				</ul>
			</article>

	<?php
		}
	} else {
		//nothing
	}
	wp_reset_postdata();
	?>
