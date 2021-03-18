<?php
/*
Template Name: Volunteer Opportunity
Template Post Type: volunteer_opp
*/
?>
<?php get_header(secondary); ?>
<main id="content">
    <section id="activity-page">
        <h1><?php the_field('name'); ?></h1>
        <article class="activity-info">
            <aside class="activity-jump">
                <div class="content-wrapper">
                    <h2>Other <span>Activities:</span></h2>
                    <div class="other-activities-container">
                        <?php
                        $args = array('post_type' => 'volunteer_opp', 'posts_per_page' => 10, 'orderby' => 'title', 'order' => 'ASC');
                        $the_query = new WP_Query($args);
                        ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="button-container">
                                <a href="<?php the_field('page_link'); ?>"><?php the_field('name'); ?></a>
                            </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php else :  ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
            <aside>
                <div class="content-wrapper">
                    <img src="<?php the_field('image'); ?>" />
                    <h3><i class="far fa-clock"></i> <?php the_field('time'); ?> &nbsp; <i class="fas fa-users"></i> <?php the_field('people'); ?></h3>
                    <p><?php the_field('description'); ?></p>
                    <p>We can work with you to tailor a project that will help our seniors and provide you, your corporate or your group team with an impactful experience and the knowledge that you are helping a senior in need. </p>
                    <div class="button-container">
                        <a href="mailto:lreiter@mowfni.org">Schedule A Session</a>
                    </div>
                </div>
            </aside>
            <aside class="activity-hero">
                <img src="<?php echo get_template_directory_uri(); ?>/img/activity-hero.png" />
            </aside>
        </article>
    </section>
</main>

<?php get_footer(); ?>