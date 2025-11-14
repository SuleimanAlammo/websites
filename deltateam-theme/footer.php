    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Delta Team Three</h3>
                    <p>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        echo $description ? $description : 'Elite airsoft team specializing in tactical operations and competitive gameplay.';
                        ?>
                    </p>
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'fallback_cb'    => 'deltateam_footer_default_menu',
                    ));
                    ?>
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <h3>Connect With Us</h3>
                    <p style="color: #FFFFFF; margin-bottom: 1rem;">
                        <strong>Phone:</strong> <a href="tel:07971659666" style="color: #CDDC39;">07971 659 666</a><br>
                        <strong>Email:</strong> <a href="mailto:info@deltateamthree.co.uk" style="color: #CDDC39;">info@deltateamthree.co.uk</a>
                    </p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/groups/deltateamthree" target="_blank" class="social-link" aria-label="Facebook" title="Facebook">F</a>
                    </div>
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date('Y'); ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    . All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
