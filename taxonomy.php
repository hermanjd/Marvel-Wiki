<?php get_header(); ?>
<div class="container">
<?php 
echo "<h1>";
echo single_term_title();
echo "</h1>";
echo term_description();
echo "<h2>Group members in ";
echo single_term_title();
echo ":</h2>";
if (have_posts()) : ?>
			
            <?php while (have_posts()) : the_post(); ?>

                <?php if ( has_post_thumbnail() ) { ?>

                    <a title="" rel="bookmark" href="<?php
                    $attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' =>'thumbnail') );
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        echo wp_get_attachment_url( $attachment_id, 'medium' );
                    } ?>"><h3><?php the_title(); ?></h3>
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>

                <?php } ?>
        <?php endwhile; ?>
        <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
<div class="container">
<?php get_footer(); ?>