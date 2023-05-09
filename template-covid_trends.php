<?php
/*
	Template Name: COVID-19 Trends In Our Schools
	working on this on https://provo.edu/covid-trends-test/
*/
get_header();
?>
<main id="mainContent">
	<section class="content page">
		<?php custom_breadcrumbs(); ?>
		<article id="activePost" class="activePost">
			<h1><?php the_title(); ?></h1>
			<?php

			wp_reset_postdata();
			wp_reset_query();

			$args = array(
				'post_type'			=> 'covid_19_trends',
				'orderby'			=> 'date',
				'order'				=> 'ASC',
				'posts_per_page'	=> 10
			);
			$query = new WP_Query($args);
			$image1 = get_field('student_spread_trend_line_graph');
			$image2 = get_field('staff_spread_trend_line_graph');
			$image3 = get_field('community_spread_line_graph');
			?>

			<p class="right">Modified: <?php echo get_field('updated_date'); ?></p>
			<h2>Student Spread Trend Line Graph</h2>
			<p><em>Total Exposures (Cases Plus Quarantines)</em></p>
			<img src="<?php echo $image1; ?>" alt="" />
			<?php
			if ($query->have_posts()) {
				//First Section
				$dataDate = '';
				$rowData1 = '';
				$rowData2 = '';
				$trendTotals = '';
				while ($query->have_posts()) {
					$query->the_post();
					$dataDate .= '<th><strong>' . get_the_title() . '</strong></th>';
					$rowData1 .= '<td>' . get_field('elementary_student') . '</td>';
					$rowData2 .= '<td>' . get_field('secondary_student') . '</td>';
					$rowsAdded = intval(get_field('elementary_student')) + intval(get_field('secondary_student'));
					$trendTotals .= '<td>' . $rowsAdded . '</td>';
				}
				echo '
							    <table>     
							        
							            <tr>
							                <th><strong>Date</strong></th>
							                ' . $dataDate . '
							            </tr>
							            <tr>
							                <td>Elementary</td>
							                ' . $rowData1 . '
							            </tr>
							            <tr>
							                <td>Secondary</td>
							                ' . $rowData2 . '
							            </tr>
							           <tr>
							                <td>Total</td>
							                ' . $trendTotals . '
							            </tr>
							        
							    </table>
							';
			}
			if ($query->have_posts()) {
			?>

				<h2>Staff Spread Trend Line Graph</h2>
				<p><em>Total Exposures (Cases Plus Quarantines)</em></p>
				<img src="<?php echo $image2; ?>" alt="" />
				<?php
				//Second Section
				$dataDate = '';
				$rowData1 = '';
				$rowData2 = '';
				$trendTotals = '';
				while ($query->have_posts()) {
					$query->the_post();
					$dataDate .= '<th><strong>' . get_the_title() . '</strong></th>';
					$rowData1 .= '<td>' . get_field('elementary_staff') . '</td>';
					$rowData2 .= '<td>' . get_field('secondary_staff') . '</td>';
					$rowsAdded = intval(get_field('elementary_staff')) + intval(get_field('secondary_staff'));
					$trendTotals .= '<td>' . $rowsAdded . '</td>';
				}
				echo '
							    <table>     
							        
							            <tr>
							                <th><strong>Date</strong></th>
							                ' . $dataDate . '
							            </tr>
							            <tr>
							                <td>Elementary Staff</td>
							                ' . $rowData1 . '
							            </tr>
							            <tr>
							                <td>Secondary Staff</td>
							                ' . $rowData2 . '
							            </tr>
							           <tr>
							                <td>Total</td>
							                ' . $trendTotals . '
							            </tr>
							        
							    </table>
							';
			}
			if ($query->have_posts()) {
				?>
				<h2>Community Spread Line Graph</h2>
				<p><em>Total Cases</em></p>
				<img src="<?php echo $image3; ?>" alt="" />
			<?php
				//Third Section
				$dataDate = '';
				$rowData1 = '';
				$rowData2 = '';
				$trendTotals = '';
				while ($query->have_posts()) {
					$query->the_post();
					$dataDate .= '<th><strong>' . get_the_title() . '</strong></th>';
					$rowData1 .= '<td>' . get_field('provo_cases') . '</td>';
					$rowData2 .= '<td>' . get_field('state_average') . '</td>';
					//$rowsAdded = intval(get_field('elementary_staff')) + intval(get_field('secondary_staff'));
					//$trendTotals .= '<td>'. $rowsAdded . '</td>';	
				}
				echo '
							    <table>     
							        
							            <tr>
							                <th><strong>Date</strong></th>
							                ' . $dataDate . '
							            </tr>
							            <tr>
							                <td>Provo Cases</td>
							                ' . $rowData1 . '
							            </tr>
							            <tr>
							                <td>State Average</td>
							                ' . $rowData2 . '
							            </tr>
							           
							        
							    </table>
							';
			}

			wp_reset_postdata();
			wp_reset_query();

			?>
			<div class="clear"></div>
		</article>
	</section>
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>