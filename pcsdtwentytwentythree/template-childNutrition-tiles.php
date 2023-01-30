<?php
/*
	Template Name: Child Nutrition Tiles - sidebar
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	<?php custom_breadcrumbs(); ?>
	<!-- Current Page Content -->
	<div id="currentPage">



		<div class="legacyTop">
		<article class="currentContent">

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

</article>
<article id="slider">

<?php
$slidercat = get_field('slider_category');
$args = array('posts_per_page' => 3, 'category_name'  => $slidercat);
// Variable to call WP_Query.
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>">
			<div class="slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
				<span>
					<h2><?php the_title(); ?></h2>
					<p><?php echo get_excerpt(); ?></p>
				</span>
			</div>
		</a>

<?php endwhile;
else :
	echo '<p>No Content Found</p>';

endif;
wp_reset_query();
?>

</article>
		</div>










		<section class="grid3 altColors">
			<?php if (get_field('square_1')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_1_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_1'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_2')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_2_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_2'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_3')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_3_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_3'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_4')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_4_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_4'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_5')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_5_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_5'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_6')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_6_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_6'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_7')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_7_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_7'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_8')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_8_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_8'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_9')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_9_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_9'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_10')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_10_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_10'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_11')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_11_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_11'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_12')) { ?>
				<aside class="post">
					<div class="featured-image">
						<img src="<?php the_field('square_12_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_12'); ?>
				</aside>
			<?php }	?>

			
		</section>
		<aside class="fwContent">
				<h2>Non-discrimination statement</h2>
				<p>In accordance with Federal civil rights law and U.S. Department of Agriculture (USDA) civil rights regulations and policies, the USDA, its Agencies, offices, and employees, and institutions participating in or administering USDA programs are prohibited from discriminating based on race, color, national origin, sex, disability, age, or reprisal or retaliation for prior civil rights activity in any program or activity conducted or funded by USDA.</p>

				<p>Persons with disabilities who require alternative means of communication for program information (e.g. Braille, large print, audiotape, American Sign Language, etc.), should contact the Agency (State or local) where they applied for benefits. Individuals who are deaf, hard of hearing or have speech disabilities may contact USDA through the Federal Relay Service at (800) 877-8339. Additionally, program information may be made available in languages other than English.</p>

				<p>To file a program complaint of discrimination, complete the USDA Program Discrimination Complaint Form, (AD-3027) found online at: //www.ascr.usda.gov/complaint_filing_cust.html, and at any USDA office, or write a letter addressed to USDA and provide in the letter all of the information requested in the form. To request a copy of the complaint form, call (866) 632-9992. Submit your completed form or letter to USDA by:</p>
				<ol>
					<li><strong>mail</strong>:
						<ul class="address">
							<li>U.S. Department of Agriculture</li>
							<li>Office of the Assistant Secretary for Civil Rights</li>
							<li>1400 Independence Avenue, SW</li>
							<li>Washington, D.C. 20250-9410</li>
						</ul>
					</li>
					<li><Strong>fax</Strong>: (202) 690-7442</li>
					<li><strong>email</strong>: program.intake@usda.gov</li>
				</ol>
				<p>This institution is an equal opportunity provider.</p>
				<ul>
					<li class="pdf"><a href="http://district.schoolnutritionandfitness.com/snaflib/files/And_Justice_for_all_poster.pdf">Non Discrimination Disclosure Download</a></li>
				</ul>
			</aside>	

	</div>
	<!-- Current Page Content End -->
	<?php
	wp_reset_query();
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>