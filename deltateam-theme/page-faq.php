<?php
/**
 * Template Name: FAQ Page
 *
 * @package DeltaTeam
 */

get_header();
?>

<div class="container page-container">
    <div class="page-wrapper">
        <h1 class="page-title">FAQ</h1>

        <div class="content-box">
            <p class="text-white">
                At Delta Team 3, we've done our best to create a Web site that anticipates and satisfies our customers' needs. With that goal in mind, we've compiled a list of frequently asked questions. If you do not find an answer to your question here, contact us at <strong>07986 053 076</strong> or <a href="mailto:info@deltateamthree.co.uk" class="link-accent">info@deltateamthree.co.uk</a>
            </p>
        </div>

        <div class="faq-item">
            <h3>QUESTION: What is Airsoft?</h3>
            <p>
                <strong>ANSWER:</strong> Airsoft is a sport, hobby, pastime or obsession that is often referred to as being 'like paintball' because the action seems to be the same as in paintball in that one must 'mark' another player with a 6mm propelled projectile at each other. The key differences between Airsoft and Paintball are that Airsoft ammo is smaller and cheaper than paintball and as the ammunition doesn't have a mark Airsoft players will spend more on their ammunition and pay attention to detail to make their uniforms look as close to real issue uniforms as possible.
            </p>
        </div>

        <div class="faq-item">
            <h3>QUESTION: What do I need to start playing Airsoft at your site?</h3>
            <p>
                <strong>ANSWER:</strong> Your game fee includes the cost of eye protection or full face protection (your choice) as well as the loan of camouflage gear (this is limited to pre-book to avoid disappointment). If you don't already own an Airsoft you'll need to hire a gun. While good ammunition which is available on site or you can use your own so long as it is biodegradable quality.
            </p>
            <p>
                It is highly recommended that you wear appropriate footwear, with good ankle support to prevent twists or sprains.
            </p>
        </div>

        <div class="faq-item">
            <h3>QUESTION: How much will a day cost & what time do you start?</h3>
            <p>
                <strong>ANSWER:</strong> £20 per person Green fee (see the <a href="<?php echo esc_url(home_url('/events')); ?>" class="link-accent">Events</a> page).
            </p>
            <p>
                <strong>BBs</strong> about £10 and.
            </p>
            <p>
                If your old enough, <strong>Pyro</strong> is usually available from £3.00
            </p>
            <p>
                You can start arriving on site from around 07:30 and we try to go game on about 09:30.
            </p>
        </div>

        <div class="faq-item">
            <h3>QUESTION: You say you are UKARA registered but I can't find you listed on the UKARA website</h3>
            <p>
                <strong>ANSWER:</strong> We are listed under the parent company Black Ops Solutions, all UKARA Registrations for the site start with DTT
            </p>
        </div>

        <div class="faq-item">
            <h3>QUESTION: Can I use HPA at Delta?</h3>
            <p>
                <strong>ANSWER:</strong> No. Delta does not allow the use of HPA and please don't try and make an argument for us to allow it. No MEANS NO.
            </p>
        </div>

        <div class="nav-links-footer">
            <p style="color: #888;">
                [<a href="<?php echo esc_url(home_url('/')); ?>">Home</a>]
                [<a href="<?php echo esc_url(home_url('/contact-us')); ?>">Contact Us</a>]
                [<a href="<?php echo esc_url(home_url('/events')); ?>">Events</a>]
                [<a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a>]
                [<a href="<?php echo esc_url(home_url('/rules')); ?>">Rules</a>]
            </p>
        </div>
    </div>
</div>

<?php
get_footer();
?>
