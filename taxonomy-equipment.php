<?php get_header(); ?>
<div class="container">
<?php 
$term = get_queried_object();
$image = get_field('equipment_image', $term);
echo "<div class='col-md-9' style='float:left;'><h1>";
echo single_term_title();
echo "</h1>";
echo term_description() . "</div>";
echo "<div class='col-md-3 grayish' style='float:right;'><img style='max-width:200px; height:auto;' src='" . $image['url'] . "'><p>Picture of ";
echo single_term_title() . "</p></div>";
echo "<h2>Heroes who owns this item:</h2>";

if (have_posts()) : ?>
			
            <?php while (have_posts()) : the_post(); ?>

                <?php if ( has_post_thumbnail() ) { ?>
					
                    <a title="" rel="bookmark" href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3>
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>

                <?php } ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
<div class="container">
<?php get_footer(); ?>