<?php
/*
	Template Name: Covid Summary
*/

get_header();
?>
<main id="mainContent" class="sidebar">
	
		<ol class="breadcrumbs" id="breadcrumbs">
			<li><a href="https://provo.edu/">Home</a> / </li>
			<li><a href="https://provo.edu/covid-19-updates/">COVID-19 Stats</a> / </li>
			<li><?php the_title(); ?></li>
		</ol>
		<div id="currentPage">
		<article class="activePost">
			
			<h1><?php the_title(); ?></h1>
			<p><em>Last modified: <?php the_modified_date(); ?></em></p>

			<!--
				<p>The following dashboard contains data related to COVID-19 cases in schools throughout Provo City School District. The information will be updated regularly.</p>
			-->
			<ul>
				<li><a href="https://provo.edu/covid-19-updates/">District COVID-19 Resource Page</a></li>
				<li><a href="https://provo.edu/business-and-finance/esser-funding/"><span>ESSER Funding Plan</span></a></li>
				<li><a href="https://health.utahcounty.gov/covid-19-coronavirus/">Utah County Health Department COVID-19 Information</a></li>
				<li><a href="https://coronavirus.utah.gov/case-counts/">Utah Department of Health COVID-19 Dashboard</a></li>
			</ul>
			<h2>Provo City School District Summary of Positive COVID-19 Cases</h2>

			<p>The total active cases are based on the Utah County Health Department's database of a "14-day rolling count" of students who have tested positive for COVID–19.</p>
			<div class="responsiveTable">
				<table class="covidTable">
					<tr>
						<th></th>
						<th>Total Students</th>

						<th>Total</th>

					</tr>
					<tr>
						<th>Cases</th>
						<?php
						$alltotal =		get_field('total_students_&_employees');
						$studentCases = get_field('active_student_cases');
						$employeeCases = get_field('active_employee_cases');
						$totalCases = 	$studentCases + $employeeCases;
						$average = $totalCases / $alltotal * 100;
						?>
						<td><?php echo number_format($alltotal); ?></td>

						<td><?php echo $totalCases ?></td>

					</tr>

				</table>
			</div>
			<h2>Summary of Positive COVID-19 Cases By School</h2>
			<p>Below are the total number of active cases by school site within the 14-day rolling count. All test to stay protocols have been suspended by the state until further notice.</p>

			<h3>Elementary Schools</h3>
	
			<?php 
			// print_r(get_field('elementary_schools'));
			$elemVals = get_field('elementary_schools');  ?>
			<div class="responsiveTable">
				<table class="covidTable">
					<tr>
						<th width="40%">School</th>
						<th width="15%">Status</th>
						<th width="20%">Total Students</th>
						<th width="10%">Positive COVID-19 Cases</th>

					</tr>

					<?php
					foreach ($elemVals['schools_info'] as $school) {
					?>
						<tr>
							<td><?php echo $school['school_name']; ?></td>
							<td><?php echo $school['school_status']; ?></td>
							<td><?php echo $school['total_students_&_employees']; ?></td>
							<td><?php echo $school['positive_covid-19_cases']; ?></td>

						</tr>
					<?php
					}
					?>
				</table>

			</div>
			<h3>Secondary Schools</h3>



			<?php 
			
			$hsVals = get_field('high_schools');  
			// print_r($hsVals);
			?>
		
			<div class="responsiveTable">
				<table class="covidTable">
					<tr>
						<th width="35%">School</th>
						<th width="15%">Status</th>
						<th width="15%">Total Students</th>
						<th width="10%">Positive COVID-19 Cases</th>


					</tr>

					<?php

					foreach ($hsVals['schools_info'] as $hsschool) {
						// print_r($hsschool);
						// $percentageCases = round(($hsschool['positive_cases_number'] / $hsschool['total_students_&_employees']) * 100, 2);
					?>
						<tr>
							<td><?php echo $hsschool['school_name']; ?></td>
							<td><?php echo $hsschool['school_status']; ?></td>
							<td><?php echo $hsschool['total_students_&_employees']; ?></td>
							<td><?php echo $hsschool['positive_covid-19_cases']; ?></td>


						</tr>
					<?php
					}
					?>
				</table>
			</div>
			<h3>Special Purpose Schools</h3>
			<?php $specVals = get_field('special_purpose_schools');  ?>
			<div class="responsiveTable">
				<table class="covidTable">
					<tr>
						<th width="40%">School</th>
						<th width="15%">Status</th>
						<th width="20%">Total Students</th>
						<th width="10%">Positive COVID-19 Cases</th>

					</tr>

					<?php
					foreach ($specVals['schools_info'] as $school) {
					?>
						<tr>
							<td><?php echo $school['school_name']; ?></td>
							<td><?php echo $school['school_status']; ?></td>
							<td><?php echo $school['total_students_&_employees']; ?></td>
							<td><?php echo $school['positive_covid-19_cases']; ?></td>

						</tr>
					<?php
					}
					?>
				</table>
			</div>
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