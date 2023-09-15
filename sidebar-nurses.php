<aside id="rightSidebar" class="rightSidebar">
	<ul class="imagelist">
		<li>
			<a href="https://provo.edu/nurses/medicalhealth-forms/">
				<img src="//globalassets.provo.edu/image/icons/nurse-form.svg" alt="" />
				<span>Medical/Health Forms</span>
			</a>
		</li>
		<li>
			<a href="https://provo.edu/category/news/programsopportunities/health-services/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Health Services News</span>
			</a>
		</li>
	</ul>
	<h2>Nurses Contacts</h2>

	<?php
	echo file_get_contents('https://provo.edu/directory_page/nurse/');
	?>
	<!-- <?php dynamic_sidebar('globalsidebar'); ?> -->
</aside>