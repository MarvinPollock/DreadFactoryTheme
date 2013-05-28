<?php
/*
Template Name: Startseite
*/
?>
<?php get_header(); ?>
<?php get_stylesheet_directory() ?>


	<div id="primary" class="site-content" style="width: 100%;">
		<div id="content" role="main">
			<div class="entry-content">
				<div id="boxContainer">
				  <div id="leftBoxes">
				    <div id="galleryBox"><a href="test"><img id='galleryImage' src=' <?php bloginfo('stylesheet_directory'); ?>/DreadFactory-Galerie-Box2.png' /></a></div>
				    <div id="shopBox" class="bigBox"><a href="http://poppydreads.com"><img id='shopImage' src=' <?php bloginfo('stylesheet_directory'); ?>/dreadfactory-shop-startseite.PNG' /></a></div>				    
<div id="partnerBox" class="smallBox"><a href="http://dreadfactory.tv"><img id='partnerImage' src=' <?php bloginfo('stylesheet_directory'); ?>/dreafactory-angebot-startseite.jpg' /></a></div>
				    
				  </div>
				  <div id="rightBoxes">
				    <div id="teamBox" class="bigBox"><a href="test"><img id='teamImage' src=' <?php bloginfo('stylesheet_directory'); ?>/team-dreadfactory-dreadlocks.jpg' /></a></div>
				    <div id="locationBox" class="smallBox"><a href="test"><img id='tvImage' src=' <?php bloginfo('stylesheet_directory'); ?>/dreadfactory-tv-vlog.jpg' /></a></div>
				    <div id="TVBox"class="smallBox"><a href="test"><img id='tvImage' src=' <?php bloginfo('stylesheet_directory'); ?>/standorte-dreadfactory-dreads.jpg' /></a></div>
				    <div id="poppyBox" class="bigBox"><a href="http://www.poppydreads.com/"><img id='poppyImage' src=' <?php bloginfo('stylesheet_directory'); ?>/poppy-startseite-dreadfactory.jpg' /></a></div>
				    <div id="partnerBox" class="bigBox"><a href="test"><img id='partnerImage' src=' <?php bloginfo('stylesheet_directory'); ?>/partner-dreadlocks-ruffy-john.jpg' /></a></div>
				    <div id="infoBox" class="smallBox"><a href="test"><img id='infoImage' src=' <?php bloginfo('stylesheet_directory'); ?>/infos-faq-dreadlocks-startseite.jpg' /></a></div>
				  </div>
				</div>
	                	<?php the_content(); ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
