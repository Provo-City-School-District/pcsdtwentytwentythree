<?php
/*
	Template Name: School Listing
*/
get_header();
?>
<main id="mainContent" class="sidebar">

		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">

		<article class="activePost">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="postgrid">
						<?php the_content(); ?>
					</div>
				<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			wp_reset_postdata();
			$school_demographics = get_field('school_demographics');
			//print_r($school_demographics);
			foreach ($school_demographics as $school_listing) {
				$category_header = $school_listing['category_header'];
				$display_category = $school_listing['display_category'];
				//print_r($school_listing);
				?>
				<h2><?php echo $school_listing['category_header']; ?></h2>
				<?php
				$schoolargs = array('post_type'  => 'schools', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'school', 'field' => 'term_id', 'terms' => $display_category)));
				$school_query = new WP_Query($schoolargs);
				if ($school_query->have_posts()) :
					while ($school_query->have_posts()) : $school_query->the_post();
				?>
						<article class="demographics">
							<?php
							$the_title = get_the_title();
							$anchor = str_replace(" ", "_", $the_title);

							?>
							<a name="<?php echo $anchor; ?>"></a>

							<div class="schoolContact">
								<h3><?php the_title(); ?></h3>
								<ul>
									<?php
									if (get_field('school_phone_number')) { ?>
										<li class="phone"><?php the_field('school_phone_number') ?></li>
									<?php
									}
									if (get_field('school_website_address')) { ?>
										<li class="website"><a href="<?php the_field('school_website_address') ?>"><?php the_title(); ?> Website</a></li>
									<?php
									}
									?>
								</ul>
							</div>

							<div class="schoolImgTable">
								<img class="" src="<?php echo the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />

								<?php $demographicsschool_profile = get_field('demographicsschool_profile');

								//print_r($demographicsschool_profile);
								?>

								<section class="demoDisplay">
									<p class="clear"><strong>Demographics/School Profile</strong></p>
									<?php
									//fetch School Demographics group
									$demographicsschool_profile = get_field('demographicsschool_profile');
									?>
									<article class="demo-info">
										<ul>
											<li>School Year</li>
											<li><strong>Total Enrollment</strong></li>
											<li>Hispanic/Latino</li>
											<li>American Indian</li>
											<li>Asian</li>
											<li>Black</li>
											<li>Pacific Islander</li>
											<li>White</li>
											<li class="demo_ell"></li>
											<li class="demo_eco"></li>
										</ul>
									</article>
									<?php
									foreach ($demographicsschool_profile as $demo_year) {
									?>
										<article class="demo-info">
											<ul>
												<li><?php echo $demo_year['school_year']; ?></li>
												<li><strong><?php echo $demo_year['enrollment']; ?></strong></li>
												<li><?php echo $demo_year['hispaniclatino']; ?></li>
												<li><?php echo $demo_year['american_indian']; ?></li>
												<li><?php echo $demo_year['asian']; ?></li>
												<li><?php echo $demo_year['black']; ?></li>
												<li><?php echo $demo_year['pacific_islander']; ?></li>
												<li><?php echo $demo_year['white']; ?></li>
												<li><?php echo $demo_year['english_language_learners_ell']; ?></li>
												<li><?php echo $demo_year['economically_disadvantaged']; ?></li>
											</ul>
										</article>
									<?php
									}
									?>
								</section>

							</div>
							<div class="mapFeederNewsSocialPrincipal">
								<?php
								if (get_field('boundary_map_url')) { ?>
									<a title="<?php the_title(); ?> Boundaries" href="<?php the_field('boundary_map_url'); ?>"><img src="https://provo.edu/wp-content/uploads/2017/04/Boundary.jpg" alt="<?php the_title(); ?> Boundary" /></a>
								<?php
								}
								?>
								<div>
									<ul>
										<?php
										if (get_field('feeder_middle_school')) { ?>
											<li class="feeder">Feeder Middle School: <?php the_field('feeder_middle_school'); ?></li>
										<?php
										}
										if (get_field('feeder_high_school')) { ?>
											<li class="feeder">Feeder High School: <?php the_field('feeder_high_school'); ?></li>
										<?php
										} ?>
										<li class="inNews"><a href="<?php the_field('news_category'); ?>"><?php the_title(); ?> in District News</a></li>
										<?php
										if (get_field('facebook_link')) { ?>
											<li class="facebook socialicons"><a href="<?php the_field('facebook_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Facebook.png" alt="<?php the_title(); ?> Facebook" /></a></li>
										<?php
										}
										if (get_field('instagram_link')) { ?>
											<li class="insta socialicons"><a href="<?php the_field('instagram_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Instagram.png" alt="<?php the_title(); ?> Instagram" /></a></li>
										<?php
										}
										if (get_field('twitter_link')) { ?>
											<li class="twitter socialicons"><a href="<?php the_field('twitter_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Twitter.jpg" alt="<?php the_title(); ?> Twitter" /></a></li>
										<?php
										}
										if (get_field('peachjar_link')) { ?>
											<li class="peachjar socialicons"><a href="<?php the_field('peachjar_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2019/06/peachjar.png" alt="<?php the_title(); ?> PeachJar Link" /></a></li>
										<?php
										} ?>
									</ul>
								</div>
								<div>
									<ul>
										<?php
										if (get_field('principal_name')) { ?>
											<li class="principal"><?php if (get_field('principal_name') !== 'Keith Rittel') {
																		echo 'Principal';
																	} else {
																		echo 'Superintendent';
																	} ?>: <?php the_field('principal_name') ?></li>
										<?php
										}
										if (get_field('principal_email')) { ?>

											<li class="princemail"><a href="<?php the_field('principal_email') ?>">Email <?php the_field('principal_name') ?></a></li>
										<?php
										}
										if (get_field('pricipal_photo')) { ?>
											<li class="princimg"><img src="<?php the_field('pricipal_photo') ?>" alt="<?php the_field('principal_name') ?>" /></li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
							<!--
											<div class="schoolimg">

												<img class="" src="<?php echo the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
											</div>
											<div class="schoolinfo">
												<ul>
													<?php
													if (get_field('school_website_address')) { ?>
														<li class="website"><a href="<?php the_field('school_website_address') ?>"><?php the_title(); ?> Website</a></li>
													<?php
													}
													if (get_field('principal_name')) { ?>
														<li class="principal"><?php if (get_field('principal_name') !== 'Keith Rittel') {
																					echo 'Principal';
																				} else {
																					echo 'Superintendent';
																				} ?>: <?php the_field('principal_name') ?></li>
													<?php
													}
													if (get_field('principal_email')) { ?>

														<li class="princemail"><a href="<?php the_field('principal_email') ?>">Email <?php the_field('principal_name') ?></a></li>
													<?php
													}
													if (get_field('pricipal_photo')) { ?>
														<li class="princimg"><img src="<?php the_field('pricipal_photo') ?>" alt="<?php the_field('principal_name') ?>" /></li>
													<?php
													}
													if (get_field('principal_profile_url')) { ?>
														<li class="princprof"><a title="View <?php the_field('principal_name') ?>'s Profile" href="<?php the_field('principal_profile_url') ?>">View Profile</a></li>
													<?php
													}
													if (get_field('school_phone_number')) { ?>
														<li class="phone"><?php the_field('school_phone_number') ?></li>
													<?php
													}
													?>
												</ul>
											</div>
											<div class="schoolinfo-cont">
												<ul>
													<?php
													if (get_field('boundary_map_url')) { ?>
														<li class="boundary"><a title="<?php the_title(); ?> Boundaries" href="<?php the_field('boundary_map_url'); ?>"><img src="https://provo.edu/wp-content/uploads/2017/04/Boundary.jpg" alt="<?php the_title(); ?> Boundary" /></a></li>
													<?php
													}
													if (get_field('feeder_middle_school')) { ?>
														<li class="feeder">Feeder Middle School: <?php the_field('feeder_middle_school'); ?></li>
													<?php
													}
													if (get_field('feeder_high_school')) { ?>
														<li class="feeder">Feeder High School: <?php the_field('feeder_high_school'); ?></li>
													<?php
													} ?>
													<li class="inNews"><a href="<?php the_field('news_category'); ?>"><?php the_title(); ?> in District News</a></li>
													<?php
													if (get_field('facebook_link')) { ?>
														<li class="facebook socialicons"><a href="<?php the_field('facebook_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Facebook.png" alt="<?php the_title(); ?> Facebook" /></a></li>
													<?php
													}
													if (get_field('instagram_link')) { ?>
														<li class="insta socialicons"><a href="<?php the_field('instagram_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Instagram.png" alt="<?php the_title(); ?> Instagram" /></a></li>
													<?php
													}
													if (get_field('twitter_link')) { ?>
														<li class="twitter socialicons"><a href="<?php the_field('twitter_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2016/12/Twitter.jpg" alt="<?php the_title(); ?> Twitter" /></a></li>
													<?php
													}
													if (get_field('peachjar_link')) { ?>
													<li class="peachjar socialicons"><a href="<?php the_field('peachjar_link'); ?>"><img src="https://provo.edu/wp-content/uploads/2019/06/peachjar.png" alt="<?php the_title(); ?> PeachJar Link" /></a></li>
													<?php
													} ?>
												</ul>
											</div>
											<?php
											if (get_field('demographicsschool_profile')) {
											?>
													<section class="demoDisplay">
														<p class="clear"><strong>Demographics/School Profile</strong></p>
														<?php
														//fetch School Demographics group
														$demographicsschool_profile = get_field('demographicsschool_profile');
														?>
														<article class="demo-info">
															<ul>
																<li>School Year</li>
																<li><strong>Total Enrollment</strong></li>
																<li>Hispanic/Latino</li>
																<li>American Indian</li>
																<li>Asian</li>
																<li>Black</li>
																<li>Pacific Islander</li>
																<li>White</li>
																<li class="demo_ell"></li>
																<li class="demo_eco"></li>
															</ul>
														</article>
														<?php
														foreach ($demographicsschool_profile as $demo_year) {
														?>
																<article class="demo-info">
																	<ul>
																		<li><?php echo $demo_year['school_year']; ?></li>
																		<li><strong><?php echo $demo_year['enrollment']; ?></strong></li>
																		<li><?php echo $demo_year['hispaniclatino']; ?></li>
																		<li><?php echo $demo_year['american_indian']; ?></li>
																		<li><?php echo $demo_year['asian']; ?></li>
																		<li><?php echo $demo_year['black']; ?></li>
																		<li><?php echo $demo_year['pacific_islander']; ?></li>
																		<li><?php echo $demo_year['white']; ?></li>
																		<li><?php echo $demo_year['english_language_learners_ell']; ?></li>
																		<li><?php echo $demo_year['economically_disadvantaged']; ?></li>
																	</ul>
																</article>
																<?php
															}
																?>
													</section>
													<?php
												}
													?>
										-->
						</article>
				<?php
					endwhile;
				else :
				endif;
				wp_reset_postdata();
				?>
			<?php
			}
			?>
			<p><em>Utah Report Card from Utah State Board of Education - https://datagateway.schools.utah.gov Enrollment, Diversity and ELL pulled from the Annual Statistical Report (S3)</em></p>
			<div class="clear"></div>
		</article>

		</div>
		

	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>