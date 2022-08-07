<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package helpdesk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'helpdesk' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<?php
			else :
				?>
				<?php
			endif;
			$helpdesk_description = get_bloginfo( 'description', 'display' );
			if ( $helpdesk_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $helpdesk_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">

			<?php
            if(is_user_logged_in()){
                if(!current_user_can('edit_posts')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-logged-in',
                        )
                    );
                }else{
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-editor-admin',
                        )
                    );
                }
            }else{
                wp_nav_menu(
                    array(
                        'theme_location' => 'not-logged-in-normal-user',
                    )
                );
            }

			?>
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'helpdesk' ); ?></button>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
