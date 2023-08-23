<aside id="rightSidebar" class="rightSidebar">
	
	<ul class="imagelist">
		<li>
			<a href="https://provo.edu/category/news/superintendent">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Superintendent News</span>
			</a>
		</li>
	</ul>
	<h2>Superintendent Contacts</h2>
	<?php
	echo file_get_contents('https://provo.edu/directory_page/superintendent/');
	?>
</aside>