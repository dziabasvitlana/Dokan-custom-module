# Dokan custom module
 Add custom Dokan module practical solution and demo plugin for WordPress/WooCommerce/Dokan sites
 ![logo](https://upsite.top/wp-content/uploads/2023/12/UPsiteLogo_800x800-150x150.png, "UPsite Top - IT development company from Ukraine creates and supports custom WordPress plugins" )
+ [**UPsite Top** custom WordPress plugins creates and supports](https://upsite.top/wordpress-development/)
### Dependencies
+ [Woocommerce](https://woocommerce.com/download/)
+ [Dokan](https://dokan.co/wordpress/download/)
### Process description
Add Custom module to Dokal module list in the file dokan_custom_module_example.php
```php
add_filter( 'dokan_pro_modules', 'add_custom_module' );
function add_custom_module( $modules ) {
 $modules['custom_module'] = array(
  'id'           => 'custom_module',
  'name'         => __( 'Added My custom module' ),
  'description'  => __( 'My custom module description' ),
  'thumbnail'    => plugin_dir_url( __FILE__ ) . 'dokan-custom-module.png', // Custom module Image 
  'module_file'  => plugin_dir_path( __FILE__ ) . 'module.php', // Main module class File
  'module_class' => 'Custom_Module', // Main module Class
  'plan'         => [ 'starter', 'professional', 'business', 'enterprise', ], // Your plan list
  'doc_id'       => 991375017, // Any unique digital ID
  'doc_link'     => 'https://upsite.top/wordpress-development/', // Your Custom module Description page
 );
 return $modules;
}
```
Add new Custom module Settings Tab to the Admin panel Dokan Settings
```php
add_filter( 'dokan_settings_sections', 'load_settings_section' );
function load_settings_section( $section ) {
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
```
Add new fields to the Custom module Settings Page
```php
add_filter( 'dokan_settings_fields', 'load_settings_fields' );
function load_settings_fields( $fields ) {
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
  ... // Other fields examples
}
```
### Used WordPress hooks
+ dokan_pro_modules
+ dokan_activated_module_
+ dokan_settings_sections
+ dokan_settings_fields
### Video denonstration
[![video](http://upsite.top/wp-content/uploads/2024/01/Git_caption_dmc.png)](https://youtu.be/1__whDX4WFE)

