<?php
/**
 * Template Name: FAQ Page
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container" style="padding: 3rem 0;">
    <div style="max-width: 900px; margin: 0 auto;">
        <h1 style="color: #CDDC39; text-align: center; margin-bottom: 2rem;">FAQ</h1>

        <div style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #FFFFFF;">
                At Delta Team 3, we've done our best to create a Web site that anticipates and satisfies our customers' needs. With that goal in mind, we've compiled a list of frequently asked questions. If you do not find an answer to your question here, contact us at <strong>07986 053 076</strong> or <a href="mailto:info@deltateamthree.co.uk" style="color: #CDDC39;">info@deltateamthree.co.uk</a>
            </p>
        </div>

        <div class="faq-item" style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <h3 style="color: #CDDC39;">QUESTION: What is Airsoft?</h3>
            <p style="color: #FFFFFF;">
                <strong>ANSWER:</strong> Airsoft is a sport, hobby, pastime or obsession that is often referred to as being 'like paintball' because the action seems to be the same as in paintball in that one must 'mark' another player with a 6mm propelled projectile at each other. The key differences between Airsoft and Paintball are that Airsoft ammo is smaller and cheaper than paintball and as the ammunition doesn't have a mark Airsoft players will spend more on their ammunition and pay attention to detail to make their uniforms look as close to real issue uniforms as possible.
            </p>
        </div>

        <div class="faq-item" style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <h3 style="color: #CDDC39;">QUESTION: What do I need to start playing Airsoft at your site?</h3>
            <p style="color: #FFFFFF;">
                <strong>ANSWER:</strong> Your game fee includes the cost of eye protection or full face protection (your choice) as well as the loan of camouflage gear (this is limited to pre-book to avoid disappointment). If you don't already own an Airsoft you'll need to hire a gun. While good ammunition which is available on site or you can use your own so long as it is biodegradable quality.
            </p>
            <p style="color: #FFFFFF;">
                It is highly recommended that you wear appropriate footwear, with good ankle support to prevent twists or sprains.
            </p>
        </div>

        <div class="faq-item" style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <h3 style="color: #CDDC39;">QUESTION: How much will a day cost & what time do you start?</h3>
            <p style="color: #FFFFFF;">
                <strong>ANSWER:</strong> £20 per person Green fee (see the <a href="<?php echo esc_url(home_url('/events')); ?>" style="color: #CDDC39;">Events</a> page).
            </p>
            <p style="color: #FFFFFF;">
                <strong>BBs</strong> about £10 and.
            </p>
            <p style="color: #FFFFFF;">
                If your old enough, <strong>Pyro</strong> is usually available from £3.00
            </p>
            <p style="color: #FFFFFF;">
                You can start arriving on site from around 07:30 and we try to go game on about 09:43.
            </p>
        </div>

        <div class="faq-item" style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <h3 style="color: #CDDC39;">QUESTION: You say you are UKARA registered but I can't find you listed on the UKARA website</h3>
            <p style="color: #FFFFFF;">
                <strong>ANSWER:</strong> We are listed under the parent company Black Ops Solutions, all UKARA Registrations for the site start with DTT
            </p>
        </div>

        <div class="faq-item" style="background: rgba(0,0,0,0.7); padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
            <h3 style="color: #CDDC39;">QUESTION: Can I use RPA at Delta?</h3>
            <p style="color: #FFFFFF;">
                <strong>ANSWER:</strong> No. Delta does not allow the use of HPA and please don't try and make an argument for us use. No MEANS NO.
            </p>
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
