<?php
/**
 * Front Page Template
 *
 * @package DeltaTeam
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Delta Team Three</h1>
            <p>Elite Airsoft Operations</p>
            <a href="#next-game" class="btn">View Next Game</a>
        </div>
    </div>
</section>

<!-- Next Game Section -->
<section class="next-game-section" id="next-game">
    <div class="container">
        <?php
        $next_game = deltateam_get_next_game();

        if ($next_game) :
            $game_date = get_post_meta($next_game->ID, '_game_date', true);
            $game_time = get_post_meta($next_game->ID, '_game_time', true);
            $game_location = get_post_meta($next_game->ID, '_game_location', true);
            $game_location_address = get_post_meta($next_game->ID, '_game_location_address', true);
            $game_meeting_point = get_post_meta($next_game->ID, '_game_meeting_point', true);
            $game_cost = get_post_meta($next_game->ID, '_game_cost', true);
        ?>

        <div class="next-game-container">
            <div class="next-game-header">
                <span class="next-game-icon">🎯</span>
                <h2 class="next-game-title">Next Mission: <?php echo esc_html($next_game->post_title); ?></h2>
            </div>

            <div class="game-details">
                <?php if ($game_date) : ?>
                <div class="game-detail-item">
                    <span class="game-detail-icon">📅</span>
                    <span class="game-detail-label">Date:</span>
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
                    <span class="game-detail-label">Address:</span>
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

            <?php if ($next_game->post_content) : ?>
            <div class="game-description">
                <h4>Mission Briefing:</h4>
                <?php echo wpautop($next_game->post_content); ?>
            </div>
            <?php endif; ?>

            <div class="text-center mt-2">
                <a href="<?php echo get_permalink($next_game->ID); ?>" class="btn btn-primary">
                    Full Mission Details
                </a>
            </div>
        </div>

        <?php else : ?>

        <div class="next-game-container">
            <div class="no-upcoming-game">
                <h3>No Upcoming Games Scheduled</h3>
                <p>Check back soon for our next mission briefing.</p>
            </div>
        </div>

        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">About Delta Team Three</h2>
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <p>
                Delta Team Three is an elite airsoft team specializing in tactical operations
                and competitive gameplay. We pride ourselves on teamwork, strategy, and
                maintaining the highest standards of sportsmanship in the airsoft community.
            </p>
            <p>
                Whether you're a seasoned veteran or new to airsoft, we welcome players who
                share our passion for tactical gaming and camaraderie.
            </p>
            <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-secondary mt-2">
                Learn More About Us
            </a>
        </div>
    </div>
</section>

<!-- Recent News -->
<section class="content-section" style="background: var(--light-bg);">
    <div class="container">
        <h2 class="section-title">Latest News & Updates</h2>

        <div class="card-grid">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ));

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>

            <article class="card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('card-image', array('class' => 'card-image')); ?>
                    </a>
                <?php endif; ?>

                <div class="card-content">
                    <h3 class="card-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <div class="card-meta">
                        <?php echo get_the_date(); ?>
                    </div>

                    <div class="card-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                        Read More
                    </a>
                </div>
            </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>

            <div class="no-posts" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <p>No news updates yet. Check back soon!</p>
            </div>

            <?php endif; ?>
        </div>

        <div class="text-center mt-3">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn">
                View All News
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="content-section">
    <div class="container">
        <div style="text-align: center; padding: 3rem; background: var(--light-bg); border-radius: 10px; border: 2px solid var(--accent-color);">
            <h2>Join Delta Team Three</h2>
            <p style="font-size: 1.2rem; max-width: 600px; margin: 1rem auto 2rem;">
                Interested in joining our team or participating in our next game?
                Get in touch with us today!
            </p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                Contact Us
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
