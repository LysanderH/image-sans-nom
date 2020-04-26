<?php /* Template Name: contact */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="contact">
        <div class="contact__content"><?= the_content(); ?></div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>