<?php
/**
 * Main Template File
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container content-section">
    <div class="main-content">
        <h1 class="section-title">
            <?php
            if (is_home()) {
                echo 'Latest Updates';
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                echo 'Search Results for: ' . get_search_query();
            } else {
                echo 'Blog';
            }
            ?>
        </h1>

        <?php if (have_posts()) : ?>

            <div class="card-grid">
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('card-image', array('class' => 'card-image')); ?>
                            </a>
                        <?php endif; ?>

                        <div class="card-content">
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="card-meta">
                                Posted on <?php echo get_the_date(); ?>
                                <?php if (get_the_author()) : ?>
                                    by <?php the_author(); ?>
                                <?php endif; ?>
                            </div>

                            <div class="card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                Read More
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <div class="pagination mt-3">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>

        <?php else : ?>

            <div class="no-results" style="text-align: center; padding: 3rem;">
                <h2>Nothing Found</h2>
                <p>Sorry, no posts matched your criteria.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn mt-2">
                    Return Home
                </a>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>
