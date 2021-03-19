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
            <?php
            $args = array('post_type' => 'corporate_events', 'posts_per_page' => 10, 'orderby' => 'title', 'order' => 'ASC', 'tag' => get_field('company_name'));
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <aside>

                        <div class="content-wrapper">
                            <img src="<?php the_field('sidebar_image'); ?>" />
                            <h2><?php the_field('event_name'); ?></h2>
                            <h3><?php the_field('event_year'); ?></h3>
                            <div class="button-container volunteer-opp-button">
                                <a href="<?php the_field('event_page_url'); ?>">View More &#8250;</a>
                            </div>
                        </div>
                    </aside>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else :  ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </article>
    </section>
</main>

<?php get_footer(); ?>