<?php
/**
 * Template Name: Events Page
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container" style="padding: 3rem 0;">
    <div style="max-width: 900px; margin: 0 auto;">
        <h1 style="color: #CDDC39; text-align: center; margin-bottom: 2rem;">Events</h1>

        <div style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #CDDC39; font-size: 1.2rem; text-align: center; margin-bottom: 1.5rem;">
                The cost of playing at Delta Team 3 will depend on your level of experience and equipment you already own
            </p>

            <div style="margin-bottom: 2rem;">
                <h2 style="color: #CDDC39; margin-bottom: 1rem;">Green Fee</h2>
                <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                    The basic cost to play, or 'Green fee', is <span style="color: #CDDC39;">£20.00</span> this includes:
                </p>
                <ul style="color: #FFFFFF; margin-left: 2rem; list-style-type: disc;">
                    <li>Full day on site</li>
                    <li>Lite lunch and soft drinks*</li>
                    <li>Eye/face protection</li>
                    <li>Use of combat fatigues</li>
                </ul>
            </div>

            <div style="margin-bottom: 2rem;">
                <h2 style="color: #CDDC39; margin-bottom: 1rem;">Gun Hire</h2>
                <p style="color: #FFFFFF;">
                    A Variety of guns are available for hire. The cost of hire is <span style="color: #CDDC39;">£10</span>, however there is a deposit payble for each hire of another <span style="color: #CDDC39;">£10</span> (so bring <span style="color: #CDDC39;">£20</span> for you hire) which will be refunded if the gun is returned in the same condition as it was hired
                </p>
            </div>

            <div style="margin-bottom: 2rem;">
                <h2 style="color: #CDDC39; margin-bottom: 1rem;">Ammunition</h2>
                <p style="color: #FFFFFF;">
                    At Delta Team 3's woodland site you may only use Biodegradable BBs, these are available on site, usually for about <span style="color: #CDDC39;">£10/pack</span>
                </p>
            </div>

            <div style="margin-bottom: 2rem;">
                <h2 style="color: #CDDC39; margin-bottom: 1rem;">Pyrotechnics</h2>
                <p style="color: #FFFFFF;">
                    You can use any Enola Gaye, TLSFX, TAG or Blank Firing devices at delta anything else may not be used
                </p>
            </div>

            <div style="background: rgba(76, 175, 80, 0.1); border-left: 4px solid #CDDC39; padding: 1.5rem; margin-top: 2rem;">
                <p style="color: #FFFFFF; margin-bottom: 0.5rem;">
                    For more information regarding the time and place of these events, please visit our <a href="<?php echo esc_url(home_url('/calendar')); ?>" style="color: #CDDC39;">calendar page</a>. If you have any questions or concerns, please visit our <a href="<?php echo esc_url(home_url('/contact-us')); ?>" style="color: #CDDC39;">'Contact Us'</a> section to speak with a Delta Team 3 representative.
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <p style="color: #888;">
                [<a href="<?php echo esc_url(home_url('/')); ?>" style="color: #4CAF50;">Home</a>]
                [<a href="<?php echo esc_url(home_url('/contact-us')); ?>" style="color: #4CAF50;">Contact Us</a>]
                [<a href="<?php echo esc_url(home_url('/events')); ?>" style="color: #4CAF50;">Events</a>]
                [<a href="<?php echo esc_url(home_url('/calendar')); ?>" style="color: #4CAF50;">Calendar</a>]
                [<a href="<?php echo esc_url(home_url('/photo-gallery')); ?>" style="color: #4CAF50;">Photo Gallery</a>]
                [<a href="<?php echo esc_url(home_url('/private-events')); ?>" style="color: #4CAF50;">Private Events</a>]
            </p>
        </div>
    </div>
</div>

<?php
get_footer();
?>
