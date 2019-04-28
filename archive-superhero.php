<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marvel
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container">
		<h1>Marvel Superheroes</h1>
		<p>Our superheroes listed alphabeticly</p>
		<div class="flox">
		<?php
		$recent_posts = wp_get_recent_posts(array('post_type'=>'superhero','orderby'=> 'title', 'order' => 'ASC'));
			foreach( $recent_posts as $recent ){
				echo '<div><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >';
				if ( has_post_thumbnail( $recent["ID"]) ) {
					echo  get_the_post_thumbnail($recent["ID"],'thumbnail');
				}
				echo $recent["post_title"].'</a> </div>';
			}
		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
