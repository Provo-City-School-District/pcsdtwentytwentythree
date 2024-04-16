<?php
get_header();
$staff_member = $_GET['staff'];
$prefillsubject = $_GET['subject'];
$prefillfrom = $_GET['from'];
$prefillcarbon = $_GET['carbon'];
$prefillsenderphone = $_GET['senderphone'];
$prefillmessage = $_GET['message'];

#Board Districts
$district1 = '(District 1: Lisa Boyce)';
$district2 = '(District 2: Melanie Hall)';
$district3 = '(District 3: Megan Van Wagenen)';
$district4 = '(District 4: Jennifer Partridge)';
$district5 = '(District 5: Teri McCabe)';
$district6 = '(District 6: Rebecca Nielsen)';
$district7 = '(District 7: Gina Hales)';

?>
<main id="mainContent" class="sidebar">

	<section class="content page contact">
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
			<article id="activePost" class="activePost emailForm">
				<h2>Contact <?php echo get_the_title($staff_member); ?></h2>
				<form action="https://provo.edu/email-sent/" method='post' id="emailForm" class="emailForm">
					<label for="from">From: </label>
					<input type="email" id="from" name="senderemail" placeholder="username@example.com" <?php if (!empty($prefillfrom)) {
																											echo 'value="' . $prefillfrom . '"';
																										} ?> required>
					<label for="fromPhone">Phone: </label>
					<input type="tel" id="fromPhone" name="senderphone" placeholder="801-374-4800 (Optional)" <?php if (!empty($prefillsenderphone)) {
																													echo 'value="' . $prefillsenderphone . '"';
																												} ?>>
					<?php
					if ($staff_member == '76000') {
					?>
						<label for="boundarySchool">Which School Do you Live in the Boundary of:</label>
						<select name="boundarySchool" id="boundarySchool" required>
							<option value="" disabled selected>Select an option</option>
							<option value="Amelia Earhart <?php echo $district5; ?>">Amelia Earhart</option>
							<option value="Canyon Crest <?php echo $district1; ?>">Canyon Crest</option>
							<option value="Edgemont <?php echo $district2; ?>">Edgemont</option>
							<option value="Franklin <?php echo $district5; ?>">Franklin</option>
							<option value="Lakeview <?php echo $district6; ?>">Lakeview</option>
							<option value="Provo Peaks <?php echo $district3; ?>">Provo Peaks</option>
							<option value="Provost <?php echo $district4; ?>">Provost</option>
							<option value="Rock Canyon <?php echo $district2; ?>">Rock Canyon</option>
							<option value="Spring Creek <?php echo $district4; ?>">Spring Creek</option>
							<option value="Sunset View <?php echo $district5; ?>">Sunset View</option>
							<option value="Timpanogos <?php echo $district7; ?>">Timpanogos</option>
							<option value="Wasatch <?php echo $district3; ?>">Wasatch</option>
							<option value="Westridge <?php echo $district6; ?>">Westridge</option>
							<option value="Centennial Middle <?php echo $district4; ?>">Centennial Middle</option>
							<option value="Dixon Middle <?php echo $district7; ?>">Dixon Middle</option>
							<option value="Independence High <?php echo $district5; ?>">Independence High</option>
							<option value="Provo High <?php echo $district6; ?>">Provo High</option>
							<option value="Timpview High <?php echo $district1; ?>">Timpview High</option>
							<option value="eSchool <?php echo $district7; ?>">eSchool</option>
							<option value="Oak Springs <?php echo $district7; ?>">Oak Springs</option>
							<option value="Slate Canyon <?php echo $district7; ?>">Slate Canyon</option>
							<option value="Not Assigned to Any School">Not Assigned to Any School</option>
						</select>
					<?php
					}

					?>

					<p><strong>I am a...</strong></p><br>
					<label>
						<input type="radio" name="role" value="Community Member"> Community Member
					</label>
					<br>
					<label>
						<input type="radio" name="role" value="Parent"> Parent
					</label>
					<br>
					<label>
						<input type="radio" name="role" value="Vendor"> Vendor
					</label> 


					<br>
					<label for="to_staff">To: </label>
					<input type="text" name="to_staff" value="<?php echo get_the_title($staff_member); ?>" readonly>
					<label for="subject">Subject: </label>
					<input id="subject" name="subject" <?php if (!empty($prefillsubject)) {
															echo 'value="' . $prefillsubject . '"';
														} ?>>
					<label for="message">Message: </label>
					<textarea id="textareamessage" name="message" minlength="15" placeholder="What would you like to say..." required><?php if (!empty($prefillmessage)) {
																																			echo $prefillmessage;
																																		} ?></textarea>
					<input type="checkbox" name="carbon" <?php if (!empty($prefillcarbon)) {
																echo 'checked';
															} ?>>
					<p>Send a copy to my address</p>
					<label for="staff_id"></label><input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_member; ?>" readonly>
					<input type="checkbox" name="sanity" id="sanity" class="sanity" unchecked><label for="sanity" class="sanity"></label>
					<input type="submit" value="Send Message" class="g-recaptcha">
				</form>

				<div class="clear"></div>
			</article>
		</div>
	</section>
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>