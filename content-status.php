<?php
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Soigne
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'soigne' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Status', 'soigne' ); ?></h3>
			</hgroup>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'soigne' ) . '</span>', _x( '1', 'comments number', 'soigne' ), _x( '%', 'comments number', 'soigne' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'soigne_status_avatar', '65' ) ); ?></div>

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'soigne' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'soigne' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php soigne_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'soigne' ) . '</span>', __( '<b>1</b> Reply', 'soigne' ), __( '<b>%</b> Replies', 'soigne' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'soigne' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
