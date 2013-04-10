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

?>
<h1 style="text-align: center; font-size: 40px;">Vertrieb und IT (Marv)</h1>
<div class="contact-wrapper">
<div class="contact-left1">
<div class="layer-0">
<h2>E-Mail-Beratung<br />
      <a href="mailto:marv@dreadfactory.de">marv@dreadfactory.de</a></h2>
<p>Durchschnittliche Reaktionszeit: 48h</p>
</p></div>
</p></div>
<div class="contact-left2">
<div class="layer-0 layer-1">
<h3>Telefon &#8211; Beratung<br />
      0178 &#8211; 1445533<br />
      Montags bis Freitags von 12-18 Uhr</h3>
</p></div>
<p>      Hinweise: </p>
<ul>
<li>jss salkd jklsdj asdlkjasl</li>
<li>uewhrkh hrjk ehkjh kjr</li>
</ul></div>
</div>
<div class="informationen">
<h2>Informationen</h2>
<p><a href="http://it.marvin-pollock.com/wp-content/uploads/2012/05/Marvin1.jpg"><img src="http://it.marvin-pollock.com/wp-content/uploads/2012/05/Marvin1.jpg" alt="PageLines- Marvin.jpg" width="150" height="225" class="alignright size-full wp-image-7985" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu lacus massa. In vehicula turpis ut mi hendrerit id bibendum sem consectetur. In sagittis luctus neque vitae eleifend. In lectus erat, tincidunt ac laoreet ac, consectetur sed orci. Ut a sagittis nibh. Fusce lectus erat, ultrices et suscipit id, sollicitudin porttitor orci. Praesent id lacus risus, eu aliquam lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent eget mauris est, nec faucibus ligula. Quisque sagittis viverra accumsan. Quisque luctus, erat eu convallis consequat, nulla felis feugiat ante, et dignissim ligula nibh quis orci. Fusce congue luctus dapibus. Morbi posuere convallis blandit.</p>
<p>Nulla auctor pharetra nisi ut iaculis. Sed convallis, quam ac condimentum varius, neque libero tempus libero, vitae elementum libero turpis a diam. Nullam lobortis magna nec orci rhoncus consequat. Aenean lacinia aliquam lorem, nec adipiscing tellus placerat vel. Donec leo enim, sollicitudin sit amet elementum eu, condimentum et sem. Phasellus interdum eleifend bibendum. Praesent vitae aliquet erat. Aliquam eu magna massa, sagittis accumsan est. Aenean sapien nisi, varius scelerisque scelerisque non, adipiscing at velit. Nulla arcu magna, dictum in tristique vel, egestas eget velit. Etiam elit augue, iaculis nec malesuada nec, scelerisque ut justo. Curabitur scelerisque blandit rhoncus. Aliquam aliquet lectus ac nisi fringilla in varius mauris blandit. Proin ullamcorper tincidunt dictum. Vivamus ullamcorper consectetur mi, ut convallis ligula gravida eget. Curabitur gravida elementum odio vel rutrum.
</p></div>
<div class="portfolio">
<h2>Portfolio</h2>
[Portfolio]
</div>
<div class="workshops">
<h2>Workshops</h2>
<p>-DreadFactory Treffen 2012
</p></div>
<?php
}
