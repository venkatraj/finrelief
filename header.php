<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package FinRelief
 */
?><!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"><?php
if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
} ?>
<?php wp_head(); ?>  
</head>
  
<body <?php body_class(); ?>>  
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'finrelief' ); ?></a>
	<?php do_action('fin_relief_before_header'); ?>
	<header id="masthead" class="site-header" role="banner">   
		
		<div class="branding header-image">			
			<div class="container">
				<div class="eight columns">
					<div class="site-branding">
						<?php 
							$logo_title = get_theme_mod( 'logo_title' );   
							$tagline = get_theme_mod( 'tagline',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) :
                                the_custom_logo();     
                            else : ?>
								<h1 class="site-title"><a style="color: #<?php header_textcolor(); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
						<?php if( $tagline ) : ?>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="eight columns"><?php
				if( is_active_sidebar( 'header-top-right' ) ) { ?>
                    <div class="cart-right">
						<?php dynamic_sidebar('header-top-right'); ?>
					</div><?php
				} ?>
				</div>
			</div>
	    </div>
	    <div class="nav-wrap">
		    <div class="container"><?php
			if ( get_theme_mod ('header_search',true) ){ ?>
				<div class="thirteen columns">
					<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-align-justify fa-2x" aria-hidden="true"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				<div class="three columns">
					<div class="header-search-box">
					   <?php get_search_form(); ?>
					</div>
				</div><?php 
			}else{ ?>
			    <div class="sixteen columns">
					<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-align-justify fa-2x" aria-hidden="true"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			<?php } ?>
			</div>
		</div>


	</header><!-- #masthead --> 

	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_checkout' ) ) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
	   <?php $breadcrumb = get_theme_mod( 'breadcrumb',true ); ?>    
		   <div class="breadcrumb">
				<div class="container"><?php
				   if( !is_search() && !is_archive() && !is_404() ) : ?>
						<div class="breadcrumb-left eight columns">
							<h4><?php woocommerce_page_title(); ?></h4>   			
						</div><?php
					endif; ?>
					<?php if( $breadcrumb ) : ?>  
						<div class="breadcrumb-right eight columns">
							<?php woocommerce_breadcrumb(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
	<?php } 
	endif; ?>

	


