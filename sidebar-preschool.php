<aside id="rightSidebar" class="rightSidebar">
	<h2>Contact Preschool</h2>
	<?php
		echo "<h3>Sunrise</h3>";
		echo file_get_contents('https://provo.edu/directory_page/school-preschool-sunrise/');
		echo "<h3>Title I</h3>";
		echo file_get_contents('https://provo.edu/directory_page/school-preschool-district-title-i/');
		echo "<h3>Highschools</h3>";
		echo file_get_contents('https://provo.edu/directory_page/school-preschool-ths-preschool/');
	?>
</aside>