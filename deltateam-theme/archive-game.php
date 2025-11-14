<?php
/**
 * Game Archive Template
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container content-section">
    <h1 class="section-title">All Missions</h1>

    <?php if (have_posts()) : ?>

        <div class="card-grid">
            <?php while (have_posts()) : the_post(); ?>

                <?php
                $game_date = get_post_meta(get_the_ID(), '_game_date', true);
                $game_time = get_post_meta(get_the_ID(), '_game_time', true);
                $game_location = get_post_meta(get_the_ID(), '_game_location', true);
                $is_past = $game_date && strtotime($game_date) < strtotime('today');
                ?>

                <article id="game-<?php the_ID(); ?>" class="card">
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

                        <?php if ($game_date) : ?>
                            <div class="card-meta">
                                <strong style="color: <?php echo $is_past ? '#888' : 'var(--success-color)'; ?>">
                                    <?php echo $is_past ? '🏁 Completed' : '📅 Scheduled'; ?>
                                </strong><br>
                                <?php echo deltateam_format_game_date($game_date, $game_time); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($game_location) : ?>
                            <div class="card-meta">
                                <strong>📍 Location:</strong> <?php echo esc_html($game_location); ?>
                            </div>
                        <?php endif; ?>

                        <div class="card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                            View Details
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
            <h2>No Games Found</h2>
            <p>No games have been scheduled yet. Check back soon!</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn mt-2">
                Return Home
            </a>
        </div>

    <?php endif; ?>
</div>

<?php
get_footer();
?>
