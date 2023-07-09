<?php
  /*
    * Plugin Name: Asset Manager by Kanno Software
    * Description: Easy asset management on the website. Enable and disable any CSS and JS on any page or post.
    * Plugin URI: https://github.com/kanno-software/wordpress-asset-manager
    * Version: 1.0
    * Author: Kanno Software
    * License: GPLv3
    * License URI: https://www.gnu.org/licenses/quick-guide-gplv3.html
    * Text Domain: asset-manager
    * Domain Path: /languages
    */

    add_action('admin_menu', 'register_am_kanno_page');
    function register_am_kanno_page() {
      $plugin_title = __('Asset Manager', 'kanno-am');
      $parent_slug = 'kanno-am';
      $parent_callback = 'am_kanno_render_all_assets_page';
      $capability = 'manage_options';

      add_menu_page(
        $plugin_title,
        $plugin_title,
        $capability,
        $parent_slug,
        $parent_callback,
        'dashicons-superhero'
      );

      add_submenu_page(
        $parent_slug,
        $plugin_title,
        __('All assets', 'kanno-am'),
        $capability,
        $parent_slug,
        $parent_callback
      );

      
      add_submenu_page(
        $parent_slug,
        __('Dependencies - Asset Manager', 'kanno-am'),
        __('Dependencies', 'kanno-am'),
        $capability,
        'kanno-am-dependencies',
        'am_kanno_render_dependencies_page'
      );

      add_submenu_page(
        $parent_slug,
        __('Settings - Asset Manager', 'kanno-am'),
        __('Settings', 'kanno-am'),
        $capability,
        'kanno-am-settings',
        'am_kanno_render_settings_page'
      );

      add_submenu_page(
        $parent_slug,
        __('Documentation - Asset Manager', 'kanno-am'),
        __('Documentation', 'kanno-am'),
        $capability,
        'kanno-am-docs',
        'am_kanno_render_docs_page'
      );
    }

    function am_kanno_render_all_assets_page() {
      
    }

    function am_kanno_render_dependencies_page() {
      
    }

    function am_kanno_render_settings_page() {
      
    }

    function am_kanno_render_docs_page() {
      
    }

    add_action('plugins_loaded', 'am_kanno_textdomain');
    function am_kanno_textdomain() {
      load_plugin_textdomain('kanno-am', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'); 
    }