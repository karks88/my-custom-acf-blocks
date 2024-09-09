<?php
/**
 * Block template file: file-list.php
 *
 * File List Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'file-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-file-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( have_rows( 'documents' ) ) : // Check to see if any files have been added to the list. ?>
	
		<ul class="my-file-list-block">
		
		<?php while ( have_rows( 'documents' ) ) : the_row(); // We have files! Let's create a new <li> for each one. ?>
			<?php $file = get_sub_field( 'file' ); // The URL of the uploaded file. ?>
			<?php if ( $file ) : ?>
				<li>
					<a href="<?php echo $file['url']; ?>" target="_blank">
					<?php the_sub_field( 'title' ); // The custom title for the file. ?>
					</a>
				</li>
			<?php endif; ?>
		
		<?php endwhile; ?>
	
		</ul>
		
	<?php endif; ?>
</div>