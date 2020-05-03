<?php
/*
 * Template Name: Accueil
 */

$exhibitionLoop = new WP_Query([
        'post_type' => 'exhibition',
        'posts_per_page' => 1
    ]
);
$bookLoop = new WP_Query([
        'post_type' => 'book',
        'posts_per_page' => 1
    ]
);

get_header();
?>


<?php if (have_posts()): while ($exhibitionLoop->have_posts()): $exhibitionLoop->the_post(); ?>
    <article class="last-exhibition" aria-labelledby="last-exhibition-heading">
        <div class="last-exhibition__header">
            <h2 class="last-exhibition__heading" id="last-exhibition-heading" role="heading"
                aria-level="2"><?= the_title(); ?></h2>
            <span class="last-exhibition__author"><?php the_field('artist'); ?></span>
            <a href="<?php the_permalink(); ?>" class="last-exhibition__link">Découvrir l’exposition <span
                        class="sro">"<?= the_title(); ?>"</span></a>
        </div>
        <?php the_post_thumbnail('', ['alt' => 'Image montrant une partie de l’exposition ' . get_the_title()]); ?>
    </article>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<?php if (have_posts()): while ($bookLoop->have_posts()): $bookLoop->the_post(); ?>
    <article class="last-book" aria-labelledby="last-book-heading">
        <div class="last-book__header">
            <h2 class="last-book__heading" id="last-book-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span class="last-book__author"><?php the_field('artist'); ?></span>
            <a href="<?php the_permalink(); ?>" class="last-book__link">Découvrir l’exposition <span
                        class="sro">"<?= the_title(); ?>"</span></a>
        </div>
        <?php the_post_thumbnail('', ['alt' => 'Image montrant une partie de l’exposition ' . get_the_title()]); ?>
    </article>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
    <?php wp_reset_query(); ?>
<?php endwhile; endif; ?>

<section class="newsletter">
    <h2 class="newsletter__title"></h2>
    <form action="/" class="newsletter__form" method="post">
        <label for="" class="newsletter__label">Adresse mail</label>
        <input type="email" class="newsletter__input">
        <input type="submit" class="newsletter__submit button" value="S’abonner">
    </form>
</section>

<section class="fb-submit">
    <h2 class="fb-submit__heading">Suivez nous sur Facebook</h2>
    <img src="https://graph.facebook.com/limagesansnom/picture?type=large" alt="Foto de profil de l’image sans nom"
         class="fb-submit__img">
    <a href="https://www.facebook.com/limagesansnom/" class="fb-submit__link button"><span class="sro">S’abonner à notre page </span>Facebook</a>
</section>

<a href="<?php echo esc_url(get_permalink(get_page_by_title('contact'))); ?>" class="cta">Contact</a>
<?php get_footer(); ?>
