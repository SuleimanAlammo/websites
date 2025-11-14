<?php
/**
 * Single Post Template
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container content-section">
    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="margin-bottom: 2rem;">
                <h1 style="margin-bottom: 1rem;"><?php the_title(); ?></h1>

                <div class="entry-meta" style="color: #888; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border-color);">
                    Posted on <?php echo get_the_date(); ?>
                    <?php if (get_the_author()) : ?>
                        by <?php the_author(); ?>
                    <?php endif; ?>
                    <?php if (has_category()) : ?>
                        in <?php the_category(', '); ?>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px;')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="max-width: 800px; line-height: 1.8;">
                <?php the_content(); ?>
            </div>

            <?php if (has_tag()) : ?>
                <div class="entry-tags" style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                    <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                </div>
            <?php endif; ?>

            <div class="post-navigation mt-3" style="display: flex; justify-content: space-between; gap: 2rem;">
                <div class="nav-previous">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                        <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-secondary">
                            &laquo; Previous Post
                        </a>
                    <?php endif; ?>
                </div>

                <div class="nav-next">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-secondary">
                            Next Post &raquo;
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </article>

        <?php
        // Comments template
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
