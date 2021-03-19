<?php
/*
Template Name: (Single) Corporate Partner Page
*/
?>
<?php get_header(secondary); ?>
<main id="content">
    <section id="single-partner-page-hero">
        <h1><?php the_field('company_name'); ?></h1>
        <article>
            <div class="content-wrapper">
                <img src="<?php the_field('logo'); ?>" alt="<?php the_field('company_name'); ?> Logo" />
                <aside>
                    <h2>About <?php the_field('company_name'); ?></h2>
                    <p><span>Partners since <?php the_field('origin_year'); ?></span></p>
                    <p><?php the_field('brief_description'); ?></p>
                    <div class="button-container">
                        <a href="<?php the_field('website_url'); ?>">Learn More at <?php the_field('website_name'); ?> &#8250;</a>
                    </div>
                </aside>
            </div>
        </article>
    </section>
    <section id="single-partner-page-work">
            <h1>Their Work</h1>
            <article class="single-partner-page-work-container">
                <aside>
                    <div class="content-wrapper">
                        <img src="img/aetna-page/volunteer_01.jpg" alt="Volunteer Opportunity Filler Image" />
                        <h2>Meal Delivery</h2>
                        <h3>2019</h3>
                        <div class="button-container volunteer-opp-button">
                            <a href="single-partner-event-page.html">View More &#8250;</a>
                        </div>
                    </div>
                </aside>
            </article>
        </section>
</main>

<?php get_footer(); ?>