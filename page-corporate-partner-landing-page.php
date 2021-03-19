<?php
/*
Template Name: Corporate Partners Landing Page
*/
?>
<?php get_header(secondary); ?>
<main id="content">
<section id="corporate-partner-page">
            <h1>Our Corporate <span>Partners</span></h1>
            <article class="corporate-partner-page-hero">
            </article>
            <article class="corporate-partner-page-view-all">
            <?php
            $args = array('post_type' => 'corporate_partner', 'posts_per_page' => 10, 'orderby' => 'title', 'order' => 'ASC');
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <aside>
                        <div class="content-wrapper">
                            <img src="<?php the_field('logo'); ?>" />
                            <h2><?php the_field('company_name'); ?></h2>
                            <div class="button-container">
                                <a href="<?php the_field('landing_page'); ?>">Learn More &#8250;</a>
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