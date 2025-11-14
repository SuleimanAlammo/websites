<?php
/**
 * Single Game Template
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container content-section">
    <?php while (have_posts()) : the_post(); ?>

        <article id="game-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="margin-bottom: 2rem; text-align: center;">
                <h1 style="font-size: 3rem;">Mission: <?php the_title(); ?></h1>
            </header>

            <?php
            $game_date = get_post_meta(get_the_ID(), '_game_date', true);
            $game_time = get_post_meta(get_the_ID(), '_game_time', true);
            $game_location = get_post_meta(get_the_ID(), '_game_location', true);
            $game_location_address = get_post_meta(get_the_ID(), '_game_location_address', true);
            $game_meeting_point = get_post_meta(get_the_ID(), '_game_meeting_point', true);
            $game_cost = get_post_meta(get_the_ID(), '_game_cost', true);
            ?>

            <div class="next-game-container" style="margin-bottom: 3rem;">
                <div class="next-game-header">
                    <span class="next-game-icon">🎯</span>
                    <h2 class="next-game-title">Game Details</h2>
                </div>

                <div class="game-details">
                    <?php if ($game_date) : ?>
                    <div class="game-detail-item">
                        <span class="game-detail-icon">📅</span>
                        <span class="game-detail-label">Date & Time:</span>
                        <span class="game-detail-value">
                            <?php echo deltateam_format_game_date($game_date, $game_time); ?>
                        </span>
                    </div>
                    <?php endif; ?>

                    <?php if ($game_location) : ?>
                    <div class="game-detail-item">
                        <span class="game-detail-icon">📍</span>
                        <span class="game-detail-label">Location:</span>
                        <span class="game-detail-value"><?php echo esc_html($game_location); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if ($game_location_address) : ?>
                    <div class="game-detail-item">
                        <span class="game-detail-icon">🗺️</span>
                        <span class="game-detail-label">Full Address:</span>
                        <span class="game-detail-value"><?php echo nl2br(esc_html($game_location_address)); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if ($game_meeting_point) : ?>
                    <div class="game-detail-item">
                        <span class="game-detail-icon">🚩</span>
                        <span class="game-detail-label">Meeting Point:</span>
                        <span class="game-detail-value"><?php echo esc_html($game_meeting_point); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if ($game_cost) : ?>
                    <div class="game-detail-item">
                        <span class="game-detail-icon">💷</span>
                        <span class="game-detail-label">Cost:</span>
                        <span class="game-detail-value"><?php echo esc_html($game_cost); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px;')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="max-width: 900px; margin: 0 auto; line-height: 1.8;">
                <h3>Mission Briefing</h3>
                <?php the_content(); ?>
            </div>

            <div class="text-center mt-3">
                <a href="<?php echo esc_url(home_url('/game')); ?>" class="btn btn-secondary">
                    &laquo; Back to All Games
                </a>
            </div>
        </article>

    <?php endwhile; ?>
</div>

<?php
get_footer();
?>
