<?php
/**
 * @package New Plugin Prac
 */


class CreateAdminMenu {

	public function init() {

		$this->hooks();

	}

	public function hooks() {

		add_action( 'admin_menu', array($this, 'addMenuPage') );
		add_action( 'admin_init', array($this, 'display_options') );

	}

	public function addMenuPage() {

		add_menu_page(
			"Save your information",
			"Your Information",
			"administrator",
			"theme_options",
			array($this, "theme_options_page")
		);

	}

	public function theme_options_page() {

		$filePath =  plugin_dir_path( __FILE__ ) . 'templates/admin.php';

		include $filePath;

	} 

	public function display_options() {

		add_settings_section(
			'header_section', 
			'Save your information', 
			array($this, 'display_header_options_content'), 
			'theme_options'
		);

		add_settings_field(
			'first_name',
			'First Name',
			array($this, 'display_first_name'),
			'theme_options',
			'header_section'
		);

		add_settings_field(
			'last_name',
			'Last Name',
			array($this, 'display_last_name'),
			'theme_options',
			'header_section'
		);

		register_setting('header_section', 'first_name');
		register_setting('header_section', 'last_name');

	}

	public function display_header_options_content() {

		echo "<p>Save your information to see your all details</p>";

	}

	public function display_first_name() {

		?>
		<input type="text" placeholder="Enter your first name" class="wide-fat" id="first_name" name="first_name" value="<?php echo get_option('first_name');?>">
		<?php
	
	}

	public function display_last_name() {

		?>
		<input type="text" placeholder="Enter your last name" >
		<?php
	
	}

};

if(class_exists('CreateAdminMenu')) {
	$create_admin_menu = new CreateAdminMenu();
	$create_admin_menu->init();
};