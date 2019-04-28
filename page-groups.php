<?php get_header(); ?>
<div class="container">
<h1>List of Marvel groups:</h1>
<p>An alphabetical list of marvel groups</p>
		<div class="flox">
		<?php  
		$terms = get_terms( array(
			'taxonomy' => 'group',
			'hide_empty' => false
		) );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $termo ) {
				$imageo = get_field('equipment_image', $termo);
				echo "<div><a href='" . get_term_link($termo) . "'><img src='" . $imageo['url'] . "' style='width:150px;height:150px;'><br>";
				echo $termo->name . '</a></div>';
			}
		} ?>
				
		
	</div>
</div>
<?php  get_footer(); ?>