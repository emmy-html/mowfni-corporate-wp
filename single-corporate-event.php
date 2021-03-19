<?php
/*
Template Name: Corporate Event
Template Post Type: corporate_events
*/
?>
<?php get_header(secondary); ?>
<main id="content">
    <section id="single-partner-event-page">
        <h1><?php the_field('event_name'); ?> <br>with <span><?php the_field('company_name'); ?></span></h1>
        <div class="single-partner-event-page-wrapper">
            <article class="single-event-page-info">
                <aside style="background-image: linear-gradient(
                                to bottom,
                                transparent,
                                rgba(255, 255, 255, 1)
                                ), url('<?php the_field('sidebar_image'); ?>')">
                </aside>
                <aside class="content-wrapper">
                    <h2><span><?php the_field('company_name'); ?></span> <?php the_field('event_year'); ?></h2>
                    <p><?php the_field('event_description'); ?></p>
                </aside>
                <div class="button-container">
                    <a href="<?php the_field('company_landing_page'); ?>">&#8249; Back to
                        <?php the_field('company_name'); ?></a>
                </div>
            </article>
            <article class="single-partner-event-page-slideshow">
                <?php the_field('slideshow'); ?>
            </article>
        </div>
    </section>
</main>

<?php get_footer(); ?>