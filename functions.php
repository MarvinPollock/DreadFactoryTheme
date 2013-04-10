<?php
// Register footer widgets
register_sidebar( array(
	'name' => __( 'Footer Widget One', 'tto' ),
	'id' => 'sidebar-4',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Footer Widget Two', 'tto' ),
	'id' => 'sidebar-5',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => __( 'Footer Widget Three', 'tto' ),
	'id' => 'sidebar-6',
	'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'tto' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => "</aside>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );


// --------------- Profilseiten ------------- //
// ---Creates the custom field for "city" --- //
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>
	<h3>Extra profile information</h3>
	<table class="form-table">
		<tr>
			<th><label for="city">City</label></th>
			<td>
				<input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your City.</span>
			</td>


			<td>
				<input type="text" name="position_value" id="position_value" value="<?php echo esc_attr( get_the_author_meta( 'position_value', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your position value.</span>
			</td>


		</tr>

	</table>

<table class="form-table">
		<tr>
			<th><label for="infotext">Info</label></th>
			<td>
				<textarea rows="3" cols="30" name="infotext" id="infotext" class="regular-text"><?php echo esc_attr( get_the_author_meta( 'infotext', $user->ID ) ); ?></textarea>
			</td>
		</tr>
</table>




<?php } 

// ---Saves the custom field for "city" --- //
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
	/* Copy and paste this line for additional fields. Make sure to change 'city' to the field ID. */
	update_usermeta( $user_id, 'city', $_POST['city'] );
	update_usermeta( $user_id, 'position_value', $_POST['position_value'] );
	update_usermeta( $user_id, 'infotext', $_POST['infotext'] );
}

// --- Creates List of Users (Needs Plugin "user Photo") --- //
// --- To exclude a Profile set display_name = inactive --- //
function contributors() {
	global $wpdb;

	$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name <> 'admin' AND display_name <> 'inactive' ORDER BY 'position_value'");
	
	foreach ($authors as $author ) {
			echo "<li>";
				echo "<a href='";
				the_author_meta('user_url', $author->ID);
				echo "'>";
				echo userphoto($author->ID);
				echo "</a>";
				echo '<div>';
					echo "<a href='";
					the_author_meta('user_url', $author->ID);
					echo "'>";
						echo "<h3>";
						the_author_meta('first_name', $author->ID);
						echo "</h3>";
					echo "</a>";
					echo "<a href='";
					the_author_meta('user_url', $author->ID);
					echo "'>";
						echo "<h3>(";
						the_author_meta('last_name', $author->ID); //TODO: Change to 'city'
						echo ")</h3>";
					echo "</a>";
					echo "<br />";
					echo "<p>";
						the_author_meta('description', $author->ID);
					echo "</p>";
					echo "<br />";
					echo "<a href='";
					the_author_meta('user_url', $author->ID);
					echo "'>";
						echo "Termine und Kontakt ->";
					echo "</a>";				
				echo "</div>";
			echo "</li>";
	}
}

// --- Creates a Portfolio (Needs Plugin "user Photo") --- //
// --- To exclude a Profile set display_name = inactive --- //
function portfolio() {

	global $wpdb;
		$users = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name = 'bine'");

	foreach ($users as $user ) {
		echo "<h1 style='text-align: center; font-size: 40px;'>";
		the_author_meta('city', $user->ID);
		echo " (";
		the_author_meta('first_name', $user->ID);
		echo ")</h1>";

		echo "<div class='contact-wrapper'>";
		echo "<div class='contact-left1'>";
		echo "<div class='layer-0'>";
		echo "<h2>E-Mail-Beratung<br />";
			echo "<a href='mailto:";
			the_author_meta('user_email', $user->ID);
			echo "'>";
			the_author_meta('user_email', $user->ID);
			echo "</a></h2>";
		echo "<p>Durchschnittliche Reaktionszeit: 48h</p>";
		echo "</p></div>";
		echo "</p></div>";
		echo "<div class='contact-left2'>";
		echo "<div class='layer-0 layer-1'>";
		echo "<h3>Telefon &#8211; Beratung<br />";
			echo "0178 &#8211; 1445533<br />";
			echo "Montags bis Freitags von 12-18 Uhr</h3>";
		echo "</p></div>";
		echo "<p>      Hinweise: </p>";
		echo "<ul>";
		echo "<li>jss salkd jklsdj asdlkjasl</li>";
		echo "<li>uewhrkh hrjk ehkjh kjr</li>";
		echo "</ul></div>";
		echo "</div>";
		echo "<div class='informationen'>";
		echo "<h2>Informationen</h2>";
/*		// regular expression:
		$matchSrc = "/src=[\"' ]?([^\"' >]+)[\"' ]?[^>]*>/i" ;
		// get the <img src="... from the plugin, via one on various methods explained in the documentation...
		$avatar = get_avatar($user->ID, 64); // for example
		// preg match to extract the src= bit
		preg_match($matchSrc, $avatar, $matches);
		$theImageUrl = $matches[1];
		echo "<img src='$theImageUrl' alt='PageLines- Marvin.jpg' width='150' height='225' class='alignright size-full wp-image-7985' />";*/
the_content();
/*		the_author_meta('infotext', $user->ID); */
		echo "</div>";
		echo "<div class='portfolio'>";
		echo "<h2>Portfolio</h2>";
		echo "[Portfolio]";
		echo "</div>";
		echo "<div class='workshops'>";
		echo "<h2>Workshops</h2>";
		echo "<p>-DreadFactory Treffen 2012";
		echo "</p></div>";


	}

?>

<?php
}
