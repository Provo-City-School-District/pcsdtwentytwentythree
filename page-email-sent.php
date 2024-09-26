<?php
//get info from post request and sanitizes the inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$from = test_input($_POST['senderemail']);
	//make email all lower case for validation
	$from = strtolower($from);
	$boundarySchool = test_input($_POST['boundarySchool']);
	$staff_id = test_input($_POST['staff_id']);
	$submitsubject = test_input($_POST['subject']);
	$submitmessage = test_input($_POST['message']);
	$carbon = test_input($_POST['carbon']);
	$phone = test_input($_POST['senderphone']);
	$role = test_input($_POST['role']);
	$studentName = test_input($_POST['studentName']);
}
//Switch Role for sending
switch ($role) {
	case "Community Member":
	case "Parent":
		$role = "Provo " . $role;
		break;
	case "Vendor":
		// do nothing, leave it unchanged
		break;
	default:
		break;
}



//input validation function
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if (!$_POST['senderemail'] || isset($_POST['sanity'])) {
	echo '<script>setTimeout(function(){window.location.href="https://provo.edu"},100);</script>';
	die();
}
$email_blacklist = array(
	'vetus_republic_iii_percent@protonmail.com',
	'bademail@gmail.com',
	'bayville@gmail.com',
	'chrisfuhriman9@gmail.com',
	'kindnessbeginswithme@gmail.com',
	'iuri@schoolpulse.org',
	'emailoffice359@gmail.com',
	'mathforrealsv@gmail.com',
	'officemail01087@gmail.com',
	'officemail33229@gmail.com'
);
if (array_search($from, $email_blacklist) !== false) {
?>
	<p>Message delivery failed...error h!fbcak</p>
	<p><a href="https://provo.edu/district-office-directory/email-form/?staff=<?php echo $_POST['staff_id'] . '&subject=' . $_POST['subject'] . '&from=' . $_POST['senderemail'] . '&carbon=' . $_POST['carbon'] . '&senderphone=' . $_POST['senderphone'] . '&message=' . $_POST['message']; ?>">Go back to the previous email form to try and send again</a></p>
<?php
	echo '<script>setTimeout(function(){window.location.href="https://provo.edu"},100);</script>';
	die();
}
get_header();
?>
<main id="mainContent" class="">

	<section class="content page">
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
			<?php
			if (strpos($from, 'safffsmail') !== false) {
				echo ('not a valid email');
			} else {
				//checks if the email input is a district email
				if (strpos($from, '@provo.edu') !== false || strpos($from, '@st.provo.edu') !== false || strpos($from, '@stu.provo.edu') !== false) {
					echo "this email form is for non district patrons only. Please use your district email to contact district employees";
				} else {
					//fetch destination email from database
					$to = get_post_field('email', $staff_id);

					// HR requested: temporarily any emails sent to post ID erinh to HR instead
					// added 11-06-2023 - request came through JP from HR
					// if ($to == 'erinh@provo.edu') {
					// 	$to = 'rebeccar@provo.edu';
					// }
					// removed on 05-14-2024 at the request of Rebecca through JP.
					//build email headers
					$subject = 'A ' . $role . ' Has Contacted You ';
					// Check if $studentName is not empty
					if (!empty($studentName) && $role == 'Provo Parent') {
						// Add $studentName to the subject string
						$subject .= ' | Student Name: ' . $studentName;
					}
					$subject .= ' |  From: ' . $from;
					$headers[] = 'From: PCSD Website <donotreply@provo.edu>';
					$headers[] = 'Reply-To: ' . $from;
					$headers[] = 'Bcc: ' . $to;
					$headers[] = 'Content-Type: text/html;charset=utf-8';
					//if user requested email cc
					if ($carbon == 'on') {
						$headers[] = 'Bcc: ' . $from;
					}

					//email body message
					$newPhone = '(' . substr_replace($phone, ')', 3, 0);
					$emailedmessage = '<html><head><style>
                    img {
                        float: right;
                        margin: 0 0 10px 10px;
                    }
					p.message {
						padding: 1em 2em;
						border: 2px dashed #eee;
					}
                    strong {
                        font-weight: bold;
                    }
                </style></head><body>';

					if ($role == 'Vendor') {
						$emailedmessage .= '<p><strong>The sender of this email identified themselves as a vendor. Their message has not been vetted or approved by Provo City School District beforehand.</strong></p>';
					} else {
						// Add the main submitted message
						$emailedmessage .= "<p>The Sender claimed they are a $role</p>";
					}
					// Initialize the emailed message
					$emailedmessage .= '<img src="https://provo.edu/wp-content/uploads/2024/04/pcsd-logo-website-header-x2.png" /><br>';

					// Check if the staff ID is for the entire Board of Education
					if ($staff_id == '76000') {
						$emailedmessage .= '<strong>To: Entire Board Of Education</strong><br><br>';
					}


					$emailedmessage .= '<strong>Subject Received</strong>: <p class="subject">' . $submitsubject . '</p>';
					if (!empty($studentName) && $role == 'Provo Parent') {
						$emailedmessage .= '<strong>Student\'s Name</strong>: ' . $studentName . '<br><br>';
					}
					$emailedmessage .= '<strong>Message Received</strong>: <p class="message">' . $submitmessage . "</p><br>";
					if (isset($newPhone) && $newPhone == null) {
						$emailedmessage .= "<strong>Return Phone</strong>: $newPhone<br><br>";
					}

					// $emailedmessage .= 'Please DO NOT respond to this email. This account is designated for incoming messages only! You can contact the person who sent this message at: ' . $from . '<br><br>';

					// Add a warning for emails originating from outside the district
					if ($staff_id != '76000') {
						$emailedmessage .= '<strong>Warning: This email originated from outside of Provo City School District.</strong><br>';
						$emailedmessage .= 'Be cautious about sharing sensitive information. Do not click links or reply unless you know the content is safe.<br><br>';
						$emailedmessage .= 'If you have any questions or concerns regarding the origin of this email, please contact the PCSD Helpdesk (801-374-4878)';
					}

					// Add boundary school information if applicable
					if ($staff_id == '76000') {
						$emailedmessage .= 'Boundary School: ' . $boundarySchool . '<br><br>';
					}
					$emailedmessage .= '</body></html>';



					//send mail
					openlog("emailFormLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
					$emaildate = date('d.m.Y h:i:s');

					if (!isset($to) || !isset($subject) || !isset($emailedmessage) || !isset($headers)) {
			?>
						<p>Message delivery failed...Please Contact inform the web team via the <a href="https://provo.edu/website-feedback/">Website Feedback Form</a></p>
						<p><a href="https://provo.edu/district-office-directory/email-form/?staff=<?php echo $_POST['staff_id'] . '&subject=' . $_POST['subject'] . '&from=' . $_POST['senderemail'] . '&carbon=' . $_POST['carbon'] . '&senderphone=' . $_POST['senderphone'] . '&message=' . $_POST['message']; ?>">Go back to the previous email form to try and send again</a></p>
			<?php
						syslog(LOG_WARNING, "Date: " . $emaildate . " Email Error. Email Not Sent " . $from . " to " . $to . " Email Subject: " . test_input($_POST['subject']) . " Email Content: " . str_replace(PHP_EOL, '', $submitmessage));
					} else {
						wp_mail($to, $subject, $emailedmessage, $headers);
						echo ('Your Message successfully sent!');
						echo '<script>setTimeout(function(){window.location.href="https://provo.edu"},10000);</script>';
						syslog(LOG_WARNING, "Date: " . $emaildate . " Email Sent Successfully from " . $from . " to " . $to . " Email Subject: " . test_input($_POST['subject']) . " Email Content: " . str_replace(PHP_EOL, '', $submitmessage));
						unset($to, $subject, $emailedmessage, $headers);
					}
					closelog();
				}
			}
			?>
			<script>
				if (window.history.replaceState) {
					window.history.replaceState(null, null, window.location.href);
				}
			</script>
			<div class="clear"></div>
		</div>
	</section>
	<?php
	// $sidebar = get_field('sidebar');
	// get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>