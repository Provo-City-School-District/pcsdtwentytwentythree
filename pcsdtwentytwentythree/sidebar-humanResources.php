<aside id="rightSidebar" class="rightSidebar">

	<ul class="imagelist">
		<li>
			<a href="https://provo.applicantportal.com/search.php">
				<img src="//globalassets.provo.edu/image/icons/employment-vacancy-lt.svg" alt="" />
				<span class="ext">Employment Vacancies</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/category/news/human-resources/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Human Resources News</span>
			</a>
		</li>
	</ul>
	<h2>Human Resource Contacts</h2>

	<?php
	echo file_get_contents('https://provo.edu/directory_page/human-resources/');
	?>
</aside>