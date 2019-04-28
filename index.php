<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marvel
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
		<h1>The superhero Archives</h1>
		<p>Welcome to Marvels super cool encyclepedia, here you can read about all your favorite heroes</p>
		<h2 class="text-center">Recently added heroes:</h2>
		<div class="flox">
		<?php
		$recent_posts = wp_get_recent_posts(array('post_type'=>'superhero','numberposts' => '3'));
			foreach( $recent_posts as $recent ){
				echo '<div><a href="' . get_permalink($recent["ID"]) . '" >';
				if ( has_post_thumbnail( $recent["ID"]) ) {
					echo  get_the_post_thumbnail($recent["ID"],'thumbnail');
				}
				echo '</br>' . $recent["post_title"].'</a> </div> ';
			}
		?>
		</div>
		<h2 class="text-center">Recently added groups:</h2>
		<div class="flox">
		<?php  
		$terms = get_terms( array(
			'taxonomy' => 'group',
			'hide_empty' => false,
			'number' => 3
		) );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $termo ) {
				$imageo = get_field('equipment_image', $termo);
				echo "<div><a href='" . get_term_link($termo) . "' ><img src='" . $imageo['url'] . "' style='width:150px;height:150px;'><br>";
				echo $termo->name . '</a></div>';
			}
		} ?>
				
		
	</div>
	</main>
	</div><!-- #primary -->

<?php
get_footer();
