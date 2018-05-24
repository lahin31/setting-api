<form action="options.php" method="post">
	<?php 
		settings_fields('header_section'); 

		do_settings_sections('theme_options');

		submit_button();
	?>
</form>
