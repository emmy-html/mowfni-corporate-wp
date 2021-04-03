<?php
/*
Template Name: Front Page
*/
?>
<?php get_header(); ?>
<main id="content">
    <section id="hero">
        <article class="hero-content">
            <div class="content-wrapper">
                <h1>
                    Doing Good Together
                    <span>In Northern Illinois</span>
                    <span>With the Help of</span>
                    <!-- (Auto slideshow but with text?)-->
                    <span id="slides-companies">
                        <p class="slide showing"><?php the_field('company_1'); ?></p>
                        <p class="slide"><?php the_field('company_2'); ?></p>
                        <p class="slide"><?php the_field('company_3'); ?></p>
                        <p class="slide"><?php the_field('company_4'); ?></p>
                        <p class="slide"><?php the_field('company_5'); ?></p>
                        <p class="slide"><?php the_field('company_6'); ?></p>
                    </span>
                </h1>
                <div class="hero-description">
                    <p>
                        With the help of people like you and your team, we're able to
                        provide thousands of meals to underserved groups. Take action
                        and join us today!
                    </p>
                    <a href="#volunteer"><i class="fas fa-chevron-down fa-2x"></i></a>
                </div>
            </div>
        </article>
    </section>
    <section id="about">
        <article>
            <div class="content-wrapper">
                <h2>We have team building service projects for everyone!</h2>
                <p>Whether you are an individual, part of a group, or corporation, you can help seniors in your community with a fun team-building project. Your kindness makes a difference in not only the lives of your co-workers, friends, or family you team up with, but also the lives of seniors in need.</p>
                <br>
                <div class="button-container">
                    <a href="/volunteer">Learn More &#8250;</a>
                </div>
            </div>
        </article>
        <article>
            <div class="content-wrapper">
                <h2>Double the Donation</h2>
                <p>Did you know many companies offer matching gift programs to encourage philanthropy among their
                    employees? Your company, your spouses’ company, or even a company you are retired from may match
                    your gift! </p>
                <div class="button-container">
                    <a href="/gift-matching">Match A Gift &#8250;</a>
                </div>
            </div>
        </article>
    </section>
    <section id="impact">
        <article class="volunteer-impact">
            <div class="content-wrapper">
                <h1>Make An <span>Impact</span></h1>
                <aside class="volunteer-stats">
                    <h3>
                        850+
                        <span>Volunteers</span>
                    </h3>
                    <h3>
                        7,300
                        <span>Older Americans Served</span>
                    </h3>
                    <h3>
                        73,000
                        <span>Hours Volunteered</span>
                    </h3>
                    <h3>
                        830,000
                        <span>Meals Delivered</span>
                    </h3>
                </aside>
                <div class="button-container">
                    <a href="/volunteer">Get Involved &#8250;</a>
                </div>
            </div>
        </article>
    </section>
    <section id="volunteer">
        <h1>Team Building <span>Activities</span></h1>
        <div class="content-wrapper">
            <article class="volunteer-opp">
                <?php
                $args = array('post_type' => 'volunteer_opp', 'orderby' => 'title', 'posts_per_page' => 3);
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
            <div class="button-container view-all">
                <a href="/volunteer/corporate">Corporate &#8250;</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/volunteer/small-groups">Small Groups &#8250;</a>
            </div>
        </div>
    </section>
    <section id="spotlight">
        <div class="content-wrapper">
            <h1>Thank you to Our <span>Recent Partners!</span></h1>
        </div>
        <article class="spotlight-partners">
            <aside>
                &nbsp;
            </aside>
            <aside class="spotlight-container">
                <div class="controls-container">
                    <a class="prev" id="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" id="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <?php
                $args = array('post_type' => 'corporate_events', 'posts_per_page' => 4, 'orderby' => 'title', 'order' => 'ASC');
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <article class="mySlides fade">
                            <div class="content-wrapper">
                                <img src="<?php the_field('sidebar_image'); ?>" />
                                <h2><?php the_field('company_name'); ?></h2>
                                <h3><?php the_field('event_name'); ?></h3>
                                <div class="button-container volunteer-opp-button">
                                    <a href="<?php the_field('event_page_url'); ?>">Learn More &#8250;</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else :  ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </aside>
        </article>
        <div class="button-container spotlight-button">
            <a href="/our-corporate-partners">View All of Our Partners &#8250;</a>
        </div>
    </section>
    <section id="faq">
        <div class="content-wrapper">
            <h1>Frequently Asked <span>Questions</span></h1>
            <h4>What is Charitable Team Building?</h4>
            <p>Great Question! Charitable team building is when a volunteer opportunity is incorporated with a team
                building initiative that benefits the community!</p>
            <h4>Who can get involved?</h4>
            <p>Anyone! If you are a part of a company, a non profit, or local community group you can take part in a
                team building activity! Please see our available opportunities for more details.
            <h4>How do I get Started?</h4>
            <p>To get started, we just need some basic information about you and your group. Please use this <a href="mailto:volunteer@cnnssa.org">link</a> to sign up and one or our programs team members will connect with you
                shortly!</p>
            <h4>Where are these opportunities held?</h4>
            <p>Team building volunteer opportunities are held at each of our program locations. For more information on
                site locations, please follow this <a href="https://mowfni.org/cafes/find-a-cafe/">link</a>.</p>
            <h4>What are the benefits of these opportunities?</h4>
            <p>The idea behind combining corporate and social responsibility efforts with team building plans is to
                streamline two initiatives under one budget. Rather than just spend money on two distinct efforts,
                combining them allows funds to become tax deductible while lifting the spirits of employees and Meals on
                Wheels clients!</p>
            <h4 class="more-questions">Have additional questions?</h4>
            <div class="button-container">
                <a href="mailto:swallace@mowfni.org">Contact Us &#8250;</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer('front-page'); ?>