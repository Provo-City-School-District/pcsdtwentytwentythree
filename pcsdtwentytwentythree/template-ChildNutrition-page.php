<?php
/*
	Template Name: Child Nutrition Page  - sidebar
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
		<article id="activePost" class="activePost">
		<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<article>
						<?php if (has_post_thumbnail()) { ?>
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" class="right" />
						<?php }; ?>
						<?php the_content(); ?>
					</article>
			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			?>
		</article>
			
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

			<div class="clear"></div>
		</div>
	
	<?php get_sidebar('childNutrition'); ?>
</main>
<?php
get_footer();
?>