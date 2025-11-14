<?php
/**
 * Page Template
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container content-section">
    <?php while (have_posts()) : the_post(); ?>

        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="margin-bottom: 2rem;">
                <h1><?php the_title(); ?></h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px;')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="line-height: 1.8;">
                <?php the_content(); ?>
            </div>
        </article>

    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
