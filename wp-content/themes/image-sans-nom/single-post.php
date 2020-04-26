<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="post">
        <h2 class="post__title"><?php the_title(); ?></h2>
        <div class="post__content"><?php the_content(); ?></div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
