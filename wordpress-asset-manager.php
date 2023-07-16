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

    require_once(plugin_dir_path(__FILE__) . 'config.php');

    add_action('admin_menu', 'register_am_kanno_page');
    function register_am_kanno_page() {
      $plugin_title = __('Asset Manager', AMKS_LANG_DOMAIN);
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
        __('All assets', AMKS_LANG_DOMAIN),
        $capability,
        $parent_slug,
        $parent_callback
      );

      
      add_submenu_page(
        $parent_slug,
        __('Dependencies - Asset Manager', AMKS_LANG_DOMAIN),
        __('Dependencies', AMKS_LANG_DOMAIN),
        $capability,
        'kanno-am-dependencies',
        'am_kanno_render_dependencies_page'
      );

      add_submenu_page(
        $parent_slug,
        __('Settings - Asset Manager', AMKS_LANG_DOMAIN),
        __('Settings', AMKS_LANG_DOMAIN),
        $capability,
        'kanno-am-settings',
        'am_kanno_render_settings_page'
      );

      add_submenu_page(
        $parent_slug,
        __('Documentation - Asset Manager', AMKS_LANG_DOMAIN),
        __('Documentation', AMKS_LANG_DOMAIN),
        $capability,
        'kanno-am-docs',
        'am_kanno_render_docs_page'
      );
    }

    function am_kanno_render_all_assets_page() {
      require_once(AMKS_PLUGIN_DIR . 'views/all-assets.php');
    }

    function am_kanno_render_dependencies_page() {
      require_once(AMKS_PLUGIN_DIR . 'views/dependencies.php');
    }

    function am_kanno_render_settings_page() {
      require_once(AMKS_PLUGIN_DIR . 'views/settings.php');
    }

    function am_kanno_render_docs_page() {
      require_once(AMKS_PLUGIN_DIR . 'views/docs.php');
    }

    add_action('plugins_loaded', 'am_kanno_textdomain');
    function am_kanno_textdomain() {
      load_plugin_textdomain(AMKS_LANG_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'); 
    }