<?php get_header(); ?>
<div class="container">
<?php 
$term = get_queried_object();
$image = get_field('equipment_image', $term);
echo "<div class='col-md-9' style='float:left;'><h1>";
echo single_term_title();
echo "</h1>";
echo term_description() . "</div>";
echo "<div class='col-md-3 grayish' style='float:right;'><h3>Group image</h3><img style='max-width:200px; height:auto;' src='" . $image['url'] . "'></div>";
echo "<h2>Group members in ";
echo single_term_title();
echo ":</h2><div class='flox'>";


if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php if ( has_post_thumbnail() ) { ?>
                    <div><a rel="bookmark" href="<?php
                    the_permalink();
                    ?>">
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
						<?php the_title(); ?>
                    </a></div>

                <?php } ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
		</div>
<div class="container">
<?php

 get_footer();
 ?>