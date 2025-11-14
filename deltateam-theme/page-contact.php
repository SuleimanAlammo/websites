<?php
/**
 * Template Name: Contact Page
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container" style="padding: 3rem 0;">
    <div style="max-width: 1000px; margin: 0 auto;">
        <h1 style="color: #CDDC39; text-align: center; margin-bottom: 2rem;">Contact Us</h1>

        <div style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #FFFFFF; margin-bottom: 1.5rem;">
                At Delta Team 3, your input is expected to our business. If you have any questions or comments regarding our events, please contact us at via the methods listed below:
            </p>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <div>
                    <h3 style="color: #CDDC39; margin-bottom: 1rem;">Site Location</h3>
                    <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                        <strong style="color: #CDDC39;">Skelmersdale</strong><br>
                        Ormskirk<br>
                        Merseyside<br>
                        WL8 4JJT
                    </p>

                    <h3 style="color: #CDDC39; margin-top: 2rem; margin-bottom: 1rem;">Other Contact Details</h3>
                    <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                        <strong style="color: #CDDC39;">Phone Number (Site Operator):</strong><br>
                        Tel: <a href="tel:07971659666" style="color: #FFFFFF;">07971 659 666</a>
                    </p>
                    <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                        <strong style="color: #CDDC39;">E-mail:</strong><br>
                        <a href="mailto:info@deltateamthree.co.uk" style="color: #CDDC39;">info@deltateamthree.co.uk</a>
                    </p>
                    <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                        <strong style="color: #CDDC39;">Facebook page:</strong><br>
                        <a href="https://www.facebook.com/groups/deltateamthree" target="_blank" style="color: #CDDC39;">facebook.com/deltateamthree</a>
                    </p>

                    <div style="background: rgba(76, 175, 80, 0.1); border-left: 4px solid #CDDC39; padding: 1rem; margin-top: 1.5rem;">
                        <p style="color: #FFFFFF; font-size: 0.9rem; margin: 0;">
                            The facebook page is a closed group so you will need to ask to join
                        </p>
                    </div>
                </div>

                <div>
                    <h3 style="color: #CDDC39; margin-bottom: 1rem;">Directions from Google maps please click <a href="https://goo.gl/maps/Delta-Team-3" target="_blank" style="color: #CDDC39;">HERE</a></h3>

                    <!-- Google Map Embed -->
                    <div style="background: rgba(0,0,0,0.5); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2365.123456789!2d-2.7834!3d53.5567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTPCsDMzJzI0LjEiTiAywrA0NycwMC4yIlc!5e0!3m2!1sen!2suk!4v1234567890"
                            width="100%"
                            height="350"
                            style="border:2px solid #4CAF50; border-radius: 4px;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>

                    <div style="background: rgba(139, 0, 0, 0.2); border-left: 4px solid #FF6B6B; padding: 1rem;">
                        <p style="color: #FFFFFF; font-size: 0.9rem; margin: 0;">
                            <strong>Please visit the events page for upcoming events,</strong> please note when choosing Alas for the first time it's recommend that you play a few more standard events as possible.
                        </p>
                    </div>
                </div>
            </div>

            <div style="background: rgba(76, 175, 80, 0.1); border-left: 4px solid #CDDC39; padding: 1.5rem; margin-top: 2rem;">
                <p style="color: #FFFFFF; margin: 0;">
                    Before contacting us regarding <span style="color: #CDDC39;">start times</span>, <span style="color: #CDDC39;">hire limits</span> and <span style="color: #CDDC39;">cost</span> please read the <span style="color: #CDDC39;">FAQ</span> and/or <span style="color: #CDDC39;">Rules</span> pages as this information is already covered there
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <p style="color: #888;">
                [<a href="<?php echo esc_url(home_url('/')); ?>" style="color: #4CAF50;">Home</a>]
                [<a href="<?php echo esc_url(home_url('/contact-us')); ?>" style="color: #4CAF50;">Contact Us</a>]
                [<a href="<?php echo esc_url(home_url('/events')); ?>" style="color: #4CAF50;">Events</a>]
                [<a href="<?php echo esc_url(home_url('/faq')); ?>" style="color: #4CAF50;">FAQ</a>]
                [<a href="<?php echo esc_url(home_url('/rules')); ?>" style="color: #4CAF50;">Rules</a>]
            </p>
        </div>
    </div>
</div>

<?php
get_footer();
?>
