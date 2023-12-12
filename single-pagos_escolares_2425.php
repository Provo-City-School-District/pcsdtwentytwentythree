<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/pagos-escolares/">Pagos Escolares</a> / </li>
			<li><a href="https://provo.edu/pagos-escolares-24-25/">Pagos Escolares 24-25</a> / </li>
			<li><?php single_post_title(); ?></li>
		</ol>
		<section id="currentPage">
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
			<h2>Maximum Activity Fees</h2>
			<section class="feeDisplay">
				<article class="fee">
					<p>Fee (not to exceed)</p>
					<?php echo $fields['overall_activity_fee_amounts']['overall_activity_fee']; ?>
				</article>
				<article class="fee">
					<p>Fundraising (not to exceed)</p>
					<?php echo $fields['overall_activity_fee_amounts']['overall_course_fundraising']; ?>
				</article>
				<article class="fee">
					<p>Total Maximum Fee</p>
					<?php echo $fields['overall_activity_fee_amounts']['overall_course_total']; ?>
				</article>
				<article class="fee">
					<p>Notes</p>
					<?php echo $fields['overall_activity_fee_amounts']['notes']; ?>
				</article>
			</section>

			<?php
			//check that there are location specific fees
			if ($fields['location_specific_fees']) {
			?>
				<h2>Breakdown of Fees By Location</h2>
				<?php
				//seperate each location into its own array
				foreach ($fields['location_specific_fees'] as $location) {
				?>
					<h3><?php echo $location['location']; ?></h3>
					<section class="feeDisplay feeBreakdown">
						<article class="fee">
							<p>Descripción de tarifa</p>
						</article>
						<article class="fee">
							<p>Tarifa</p>
						</article>
						<article class="fee">
							<p>Fundraising</p>
						</article>
						<article class="fee">
							<p>Total</p>
						</article>
						<article class="fee">
							<p>Notes</p>
						</article>
						<article class="fee">
							<p>Prior Year Approved Fee</p>
						</article>

						<?php
						//display the actual fees
						foreach ($location['breakdown_of_fees'] as $fee) {
						?>
							<article class="fee">
								<span><?php echo $fee['fee_description']; ?></span>
							</article>
							<article class="fee">
								<?php echo $fee['fee']; ?>
							</article>
							<article class="fee">
								<?php echo $fee['fundraising']; ?>
							</article>
							<article class="fee">
								<?php echo $fee['total']; ?>
							</article>
							<article class="fee">
								<span><?php echo $fee['notes']; ?></span>
							</article>
							<article class="fee textright">
								<span><?php echo $fee['prior_year_approved_fee']; ?></span>
							</article>
						<?php
						} //end the breaddown_of_fees loop
						?>
					</section>
			<?php
				} //end the location_specific_fees loop
			} //end if check on location_specific_fees
			wp_reset_query();
			wp_reset_postdata();
			?>
			<div class="bottom"></div>
		</article>
	</section>
	<?php get_sidebar('school-fees'); ?>
</main>
<?php
get_footer();
?>