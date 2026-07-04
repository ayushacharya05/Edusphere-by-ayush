<?php
/**
 * Template part for displaying an event card
 *
 * @package EduSphere_By_Ayush
 */
$edate = get_post_meta( get_the_ID(), 'edu_event_date', true );
$etime = get_post_meta( get_the_ID(), 'edu_event_time', true );
$eloc  = get_post_meta( get_the_ID(), 'edu_event_location', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 's-event-card' ); ?> style="grid-column:1/-1;">
	<div class="s-event-date-block">
		<?php if ( $edate ) : ?>
			<strong><?php echo esc_html( date_i18n( 'd', strtotime( $edate ) ) ); ?></strong>
			<span><?php echo esc_html( date_i18n( 'M', strtotime( $edate ) ) ); ?></span>
		<?php endif; ?>
	</div>
	<div class="s-event-info">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="s-event-meta">
			<?php if ( $etime ) : ?><span>&#128337; <?php echo esc_html( $etime ); ?></span><?php endif; ?>
			<?php if ( $eloc ) : ?><span>&#128205; <?php echo esc_html( $eloc ); ?></span><?php endif; ?>
		</div>
		<p class="s-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
	</div>
</article>
