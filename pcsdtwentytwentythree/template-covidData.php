<?php
/*
	Template Name: Covid Data
*/
get_header();
?>
<main id="mainContent">
	<section class="content page">
		<?php custom_breadcrumbs(); ?>
		<article id="activePost" class="activePost">

			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>

					<h1><?php the_title(); ?></h1>


					<h2>Current Student - Totals</h2>
					<?php $currentStudents = get_field('current_student_totals'); ?>
					<table>
						<thead>
							<tr>
								<th><strong>Category</strong></th>
								<th><strong>Totals</strong></th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td>Students in PCSD</td>
								<td><?php echo $currentStudents['students_in_pcsd']; ?></td>
							</tr>
							<tr>
								<td>Positive COVID-19 Cases</td>
								<td><?php echo $currentStudents['positive_covid-19_cases']; ?></td>
							</tr>
							<tr>
								<td>Quarantined for Possible Exposure</td>
								<td><?php echo $currentStudents['quarantined_for_possible_exposure']; ?></td>
							</tr>
						</tbody>
					</table>
					<h2>Current Student - Totals by Levels</h2>
					<?php $totals_by_levels = get_field('current_student_-_totals_by_levels'); ?>
					<table>
						<thead>
							<tr>
								<th><strong>Category</strong></th>
								<th><strong>Totals</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Elementary Positive COVID-19 Cases</td>
								<td><?php echo $totals_by_levels['elementary_positive_covid-19_cases']; ?></td>
							</tr>
							<tr>
								<td>Elementary Quarantined</td>
								<td><?php echo $totals_by_levels['elementary_quarantined']; ?></td>
							</tr>
							<tr>
								<td>Secondary Positive COVID-19 Cases</td>
								<td><?php echo $totals_by_levels['secondary_positive_covid-19_cases']; ?></td>
							</tr>
							<tr>
								<td>Secondary Quarantined</td>
								<td><?php echo $totals_by_levels['secondary_quarantined']; ?></td>
							</tr>
						</tbody>
					</table>
					<h2>Current Employee - Totals</h2>
					<?php $employeeTotals = get_field('current_employee_-_totals'); ?>
					<table>
						<thead>
							<tr>
								<th><strong>Category</strong></th>
								<th><strong>Totals</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Employees in PCSD</td>
								<td><?php echo $employeeTotals['employees_in_pcsd']; ?></td>
							</tr>
							<tr>
								<td>Positive COVID-19 Cases</td>
								<td><?php echo $employeeTotals['positive_covid-19_cases']; ?></td>
							</tr>
							<tr>
								<td>Quarantined for Possible Exposure</td>
								<td><?php echo $employeeTotals['quarantined_for_possible_exposure']; ?></td>
							</tr>
						</tbody>
					</table>
					<h2>Current Positive Cases by Schools</h2>
					<?php $positiveBySchool = get_field('current_positive_cases_by_schools'); ?>
					<table>
						<thead>
							<tr>
								<th><strong>Data Range</strong></th>
								<th><strong>Schools</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>0-10</td>
								<td><?php echo $positiveBySchool['0-10']; ?></td>
							</tr>
							<tr>
								<td>10-20</td>
								<td><?php echo $positiveBySchool['10-20']; ?></td>
							</tr>
							<tr>
								<td>20+</td>
								<td><?php echo $positiveBySchool['20+']; ?></td>
							</tr>
						</tbody>
					</table>
					<h2>Current Quarantine by Schools</h2>
					<?php $quarantineBySchool = get_field('current_quarantine_by_schools'); ?>
					<table>
						<thead>
							<tr>
								<th><strong>Data Range</strong></th>
								<th><strong>Schools</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>0-25</td>
								<td><?php echo $quarantineBySchool['0-25']; ?></td>
							</tr>
							<tr>
								<td>25-99</td>
								<td><?php echo $quarantineBySchool['25-99']; ?></td>
							</tr>
							<tr>
								<td>100+</td>
								<td><?php echo $quarantineBySchool['100+']; ?></td>
							</tr>
						</tbody>
					</table>


			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
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