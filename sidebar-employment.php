<aside id="rightSidebar" class="rightSidebar">
	
	<ul class="imagelist">
		<li>
			<a href="https://ap.erplinq.com/provo/search.php">
				<img src="//globalassets.provo.edu/image/icons/employment-vacancy-lt.svg" alt="" />
				<span class="ext">Employment Vacancies</span>
			</a>
		</li>
	</ul>

	<h2>Human Resources Contacts</h2>

	<?php
	echo file_get_contents('https://provo.edu/directory_page/human-resources/');
	?>
</aside>