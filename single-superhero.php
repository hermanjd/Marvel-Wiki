<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marvel
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
		<div class="row">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="col-md-9">
			<h1><?php the_title();?></h1></br>
			<?php
			the_content();
			?></div><div class="col-md-3 grayish" style="float:right;">
			<?php the_post_thumbnail();?>
			<?php 
			$term = get_queried_object();
			$fullname = get_field('fullname', $term);
			
			echo "<p><span class='font-weight-bold'>Fullname: </span></br>" . $fullname . "</p>";
			echo "<p><span class='font-weight-bold'>Equipment list: </span></br>" . get_the_term_list( $term, 'equipment') . "</br></p>";
			echo "<p><span class='font-weight-bold'>Affiliated Groups: </span></br>" . get_the_term_list( $term, 'group') . "</br></p>";
			echo "<span class='font-weight-bold'>Abilities: </span><br>" . get_the_term_list( $term, 'ability') . "</br>";
			echo "<span class='font-weight-bold'>Hero Type: </span><br>" . get_the_term_list( $term, 'herotype') . "</br>";
			?>
			</div>
			<?php
		endwhile;
		
		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
