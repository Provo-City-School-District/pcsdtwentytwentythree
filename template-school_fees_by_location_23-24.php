<?php
/*
		Template Name: School Fees - All Fees By Location 23-24
	*/
get_header();
?>
<main id="mainContent" class="sidebar">
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
		<article id="activePost" class="activePost feePost noprior">

			<h1><?php the_title(); ?></h1>
			<?php
			echo '<p>Fees listed are maximum fees and may not reflect actual fees paid.</p>';
			//fetch location from post
			$location_of_fees_to_display = get_field('location_of_fees_to_display');
			//make arrays with location options - this might be able to be queried, but its one list
			//$elementary_locations = array('amelia_earhart', 'canyon_crest', 'edgemont', 'franklin', 'lakeview', 'provost', 'provo_peaks', 'rock_canyon', 'spring_creek', 'sunset_view', 'timpanogos', 'wasatch', 'westridge');
			$middle_locations = array('centennial_middle', 'dixon_middle');
			$high_locations = array('independence_high', 'provo_high', 'timpview_high');
			//$aux_locations = array('ebph', 'eschool', 'provo_adult_education', 'preschools');
			/* hiding elementary pull since there isn't a general elementary fee as of yet.

					//Check if the location is a elementary
					if(in_array( $location_of_fees_to_display['value'], $elementary_locations )) {
						//if Elementary output general fees elementary post (this doesn't exist yet)
						//$elem_gen_fees = get_fields();
					}
					*/

			//Display fee summary based on location. filename is fee_summary_school_name.pdf
			if (in_array($location_of_fees_to_display['value'], $middle_locations) or in_array($location_of_fees_to_display['value'], $high_locations)) {
				//print_r($location_of_fees_to_display);
			?>
				<ul>
					<li><a href="https://globalassets.provo.edu/fee-summary/23-24/fee_summary_<?php echo $location_of_fees_to_display['value']; ?>.pdf"><?php echo $location_of_fees_to_display['label']; ?> Fee Summary</a></li>
					</li>
				</ul>
			<?php
			}

			//Check if location is a middle school
			if (in_array($location_of_fees_to_display['value'], $middle_locations)) {
				//if middle school output general fees middle schools post which is currently postID 18742
				$middle_gen_fees = get_fields(60270);
			?>
				<h2>General Required Fee - Middle Schools</h2>
				<?php
				foreach ($middle_gen_fees['location_specific_fees'] as $breakdown) {
					//check if the location is specificied location
					if ($breakdown['location'] == $location_of_fees_to_display['label']) {
				?>
						<section class="feeDisplay feeBreakdown">
							<article class="fee">
								<p>Fee Description</p>
							</article>
							<article class="fee">
								<p>Fee</p>
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
							<!--
										<article class="fee">
											<p>Prior Year Approved Fee</p>
										</article>
									-->
							<?php
							foreach ($breakdown['breakdown_of_fees'] as $fee) {
							?>
								<article class="fee">
									<span><?php echo $fee['fee_description']; ?></span>
								</article>
								<article class="fee textright">
									<?php echo $fee['fee']; ?>
								</article>
								<article class="fee textright">
									<?php echo $fee['fundraising']; ?>
								</article>
								<article class="fee textright">
									<?php echo $fee['total']; ?>
								</article>
								<article class="fee textright">
									<span><?php echo $fee['notes']; ?></span>
								</article>
								<!--
										<article class="fee textright">
											<span><?php //echo $fee['prior_year_approved_fee']; 
													?></span>
										</article>
									-->
							<?php
							} //end foreach($breakdown['breakdown_of_fees']
							?>
						</section>
				<?php
					} // end if($breakdown['location'] == 'location')
				} // end foreach $query_meta['location_specific_fees']

			}
			//check if location is a highschool
			if (in_array($location_of_fees_to_display['value'], $high_locations)) {
				//if High School output general fees High School post which is currently postID 19380
				$high_gen_fees = get_fields(60443);
				//print_r($high_gen_fees);
				?>
				<h2>General Required Fee - High Schools</h2>
				<?php
				foreach ($high_gen_fees['location_specific_fees'] as $breakdown) {
					//check if the location is specificied location
					if ($breakdown['location'] == $location_of_fees_to_display['label']) {
				?>
						<section class="feeDisplay feeBreakdown">
							<article class="fee">
								<p>Fee Description</p>
							</article>
							<article class="fee">
								<p>Fee</p>
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
							<!--
										<article class="fee">
											<p>Prior Year Approved Fee</p>
										</article>
									-->
							<?php
							foreach ($breakdown['breakdown_of_fees'] as $fee) {
							?>
								<article class="fee">
									<span><?php echo $fee['fee_description']; ?></span>
								</article>
								<article class="fee textright">
									<?php echo $fee['fee']; ?>
								</article>
								<article class="fee textright">
									<?php echo $fee['fundraising']; ?>
								</article>
								<article class="fee textright">
									<?php echo $fee['total']; ?>
								</article>
								<article class="fee textright">
									<span><?php echo $fee['notes']; ?></span>
								</article>
								<!--
										<article class="fee textright">
											<span><?php echo $fee['prior_year_approved_fee']; ?></span>
										</article>
									-->
							<?php
							} //end foreach($breakdown['breakdown_of_fees']
							?>
						</section>
				<?php
					} // end if($breakdown['location'] == 'location')
				} // end foreach $query_meta['location_specific_fees']
			}
			//create array to be used
			$post_ids_array = array();
			//query for arrays that include a specific location in the post
			$get_id_sql =  "SELECT post_id,meta_key,meta_value FROM psd_posts,psd_postmeta WHERE post_type = 'school_fees_23-24' AND psd_posts.ID = psd_postmeta.post_id AND meta_value = '" . $location_of_fees_to_display['value'] . "' ORDER BY post_title";
			$query_post_ids = $wpdb->get_results($get_id_sql);
			//create an array of just the ID of each activity that includes the specified location
			//print_r($query_post_ids);

			foreach ($query_post_ids as $id) {
				array_push($post_ids_array, $id->post_id);
			}
			//check if general fee IDs are 19380 and 18742
			$exlude_ids = array(60443, 60270);
			//print_r($post_ids_array);
			/*
						  Found a bug where some school had been excluding the general fees from the rest of the list of fees, but somewhere not.
The issues were since my array search function was in the "if" statements, if the result of $key was 0 which on some schools it was 0 can also mean false in PHP so it was canceling the if statement.
I changed the code so that the search would happen before the if statement and then the if statement would just check that the value of $key existed

						 */

			foreach ($exlude_ids as $dupe) {
				//echo($dupe);
				$key = array_search($dupe, $post_ids_array);
				//echo($key);

				if ($key !== false) {
					//echo($key);
					unset($post_ids_array[$key]);
				}
			}
			//detect duplicate IDs
			$dupe_id_remove = array_count_values($post_ids_array);
			// print_r(array_keys($dupe_id_remove));
			$post_ids_array = array_keys($dupe_id_remove);
			//list breakdown for each activity
			foreach ($post_ids_array as $activiy_id) {
				//echo activity name
				?>
				<h2><?php echo get_the_title($activiy_id); ?></h2>
				<?php
				//get fields from the each id
				$query_meta = get_fields($activiy_id);
				//print_r($query_meta);
				//sort out only location specific fees

				foreach ($query_meta['location_specific_fees'] as $breakdown) {
					//check if the location is specificied location
					if ($breakdown['location'] == $location_of_fees_to_display['label']) {
				?>
						<section class="feeDisplay feeBreakdown">
							<article class="fee">
								<p>Fee Description</p>
							</article>
							<article class="fee">
								<p>Fee</p>
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
							<!--
										<article class="fee">
											<p>Prior Year Approved Fee</p>
										</article>
									-->
							<?php
							foreach ($breakdown['breakdown_of_fees'] as $fee) {
							?>
								<article class="fee">
									<?php
									if ($fee['bold_line'] !== false) {
										echo '<strong>';
									}
									?>
									<span><?php echo $fee['fee_description']; ?></span>
									<?php
									if ($fee['bold_line'] !== false) {
										echo '</strong>';
									}
									?>
								</article>
								<article class="fee textright">
									<?php
									if ($fee['bold_line'] !== false) {
										echo '<strong>';
									}
									echo $fee['fee'];
									if ($fee['bold_line'] !== false) {
										echo '</strong>';
									}
									?>
								</article>
								<article class="fee textright">
									<?php
									if ($fee['bold_line'] !== false) {
										echo '<strong>';
									}
									echo $fee['fundraising'];
									if ($fee['bold_line'] !== false) {
										echo '</strong>';
									}
									?>
								</article>
								<article class="fee textright">
									<?php
									if ($fee['bold_line'] !== false) {
										echo '<strong>';
									}
									echo $fee['total'];
									if ($fee['bold_line'] !== false) {
										echo '</strong>';
									}
									?>
								</article>
								<article class="fee textright">
									<?php
									if ($fee['bold_line'] !== false) {
										echo '<strong>';
									}
									?>
									<span><?php echo $fee['notes']; ?></span>
									<?php
									if ($fee['bold_line'] !== false) {
										echo '</strong>';
									}
									?>
								</article>
								<!--
										<article class="fee textright">
											<?php
											if ($fee['bold_line'] !== false) {
												echo '<strong>';
											}
											?>
											<span><?php echo $fee['prior_year_approved_fee']; ?></span>
											<?php
											if ($fee['bold_line'] !== false) {
												echo '</strong>';
											}
											?>
										</article>
									-->
							<?php
							} //end foreach($breakdown['breakdown_of_fees']
							?>
						</section>
			<?php
					} // end if($breakdown['location'] == 'location')
				} // end foreach $query_meta['location_specific_fees']
			} //end foreach $post_ids_array
			if (empty($post_ids_array)) {
				echo ('No school fees currently found for this location');
			}
			?>
			<div class="clear"></div>
		</article>
		</div>
	<?php get_sidebar('school-fees'); ?>
</main>
<?php
get_footer();
?>