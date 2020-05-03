<?php
/* Template Name: exhibitions */
$loop = new WP_Query([
        'post_type' => 'exhibition',
        'posts_per_page' => 3
    ]
);
?>
<?php get_header(); ?>

    <?php if (have_posts()): while ($loop->have_posts()): $loop->the_post(); ?>
        <article class="books" aria-labelledby="books-heading">
            <div class="books__header">
                <h2 class="books__heading" id="books-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
                <span class="books__author"><?php the_field('artist'); ?></span>
                <a href="<?= the_permalink(); ?>" class="books__link">Découvrir l’exposition <span class="sro">"<?= the_title(); ?>"</span></a>
            </div>
            <img src="#" srcset="" sizes="" alt="" class="books__img">
            <img src="#" srcset="" sizes="" alt="" class="books__img">
        </article>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>