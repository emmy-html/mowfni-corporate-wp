<?php
/*
Template Name: Corporate Volunteer Opportunities Landing Page
*/
?>
<?php get_header(secondary); ?>
<main id="content">
  <section id="volunteer-page">
    <article class="volunteer-page-hero">
      <h1><span><?php the_field('page_type'); ?></span> Team Building <span>Activities</span></h1>
    </article>
    <article class="volunteer-page-opportunities">
      <?php
      $args = array('post_type' => 'volunteer_opp', 'tag' => 'corporate-opp', 'posts_per_page' => 10);
      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <aside>
            <img src="<?php the_field('image'); ?>" />
            <h2><?php the_field('name'); ?></h2>
            <h3><i class="far fa-clock"></i> <?php the_field('time'); ?> &nbsp; <i class="fas fa-users"></i> <?php the_field('people'); ?></h3>
            <p><?php the_field('short_description'); ?></p>
            <div class="button-container volunteer-opp-button">
              <a href="<?php the_field('page_link'); ?>">Learn More &#8250;</a>
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

<?php get_footer(volunteer); ?>