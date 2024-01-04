<?php

/**
 * Dokan Custom module class
 */
class Custom_Module
{

	/**
	 * Constructor for the Custom_Module class
	 */
	public function __construct() {

		$this->run();

		add_action( 'dokan_activated_module_custom_module', array( self::class, 'activate' ) );
		// Use 'dokan_activated_module_' . Your custom module ID
		
		add_action( 'init', array( $this, 'init_hooks' ) );
	}

	/**
	 * Run function
	 *   define all need constants
	 *   enqueue all need JS and CSS
	 *   include all need files
	 *   activate all need classes
	 *   add all need shortcodes
	 */
	public function run() {
		
	}

	/**
	 * Activation function
	 *   add all need
	 *      Roles
	 *      Capabilities
	 *      Pages
	 *      Database tables
	 *      etc.
	 */
	public static function activate() {
		
	}

	/**
	 * Plugin hooks
	 */
	public function init_hooks() {

		add_filter( 'dokan_settings_sections', array( $this, 'load_settings_section'), 5 );
		// Priority affects the order of display in the Settings menu
		
		add_filter( 'dokan_settings_fields', array( $this, 'load_settings_fields') );
		
		add_action( 'woocommerce_before_shop_loop', array( $this, 'display_settings' ) );
	}
	
	/**
     * Load admin settings section
     */
    public function load_settings_section( $section ) {
		
        $section[] = array(
            'id'					=> 'custom_module',
            'title'					=> __( 'Custom module' ), // Custom module Settings tab Title
			'description'			=> __( 'Custom module description' ), // Custom module Settings tab Description
            'icon_url'				=> plugin_dir_url( __FILE__ ) . 'settings-icon.png', // Your Custom module Settings icon
            'document_link'			=> 'https://upsite.top/', // Your Custom module Settings Description page
            'settings_title'		=> __( 'Custom module Settings' ), // Custom module Settings menu Title
            'settings_description'	=> __( 'Custom module Settings description' ), // Custom module Settings menu Description
        );

        return $section;
    }
	
	/**
     * Load all settings fields
     */
    public function load_settings_fields( $fields ) {
        $fields['custom_module'] = array(
			// Sub section example
			'test_sub_section_example' => array(
				'name'  => 'test_sub_section_example',
				'label' => __( 'Sub section example' ),
				'type'  => 'sub_section',
			),
			// Text field example
			'test_text_field_example'    => array(
				'name'    => 'test_text_field_example',
				'label'   => __( 'Text field example' ),
				'type'    => 'text',
				'desc'    => __( 'Text field example description' ),
				'tooltip' => __( 'Tooltip example' ),
			),
			// Radio example
            'test_radio_example' => array(
                'name'    => 'test_radio_example',
                'label'   => __( 'Radio example' ),
                'type'    => 'radio',
                'desc'    => __( 'Radio example description' ),
                'default' => 'radio_example_1',
                'options' => array(
                    'radio_example_1'	=> __( 'Radio example 1' ),
                    'radio_example_2'	=> __( 'Radio example 2' ),
                ),
            ),
			// Checkbox example
            'test_checkbox_example' => array(
                'name'    => 'test_checkbox_example',
                'label'   => __( 'Checkbox example' ),
                'type'    => 'checkbox',
                'desc'    => __( 'Checkbox example description' ),
                'default' => 'no',
            ),
			// Select example
            'test_select_example' => array(
                'name'    => 'test_select_example',
                'label'   => __( 'Select example' ),
                'type'    => 'select',
                'desc'    => __( 'Select example description use HTML' ),
                'default' => 'select_example_2',
                'options' => array(
                    'select_example_1' => __( 'Select example 1' ),
                    'select_example_2'  => __( 'Select example 2' ),
					'select_example_3'  => __( 'Select example 3' ),
                ),
            ),
			// HTML module example
			'test_html_example'	=> array(
				'name'    => 'test_html_example',
				'label'   => __( 'HTML example', 'dokan' ),
				'type'    => 'html',
				'desc'    => '<div style="color: white; background-color: blue; padding: 10px; margin: 10px;">'
								. __( 'HTML module example' ) .
							'</div>', // Any HTML code
			),
        );

        return $fields;
    }
	
	/**
     * Display settings data in the Woocommerce Shop page
     */
    public function display_settings() {
		
		?>
		<pre style="font-size: 20px;">
		<?php
		print_r( get_option( 'custom_module' ) );
		?>
		</pre>
		<?php
	}
}
