<?php
/*
 * Template Name: Accueil
 */ get_header(); ?>

<?php $exhibitionLoop = new WP_Query([
        'post_type' => 'exhibition',
        'posts_per_page' => 1
    ]);
if (have_posts()): while ($exhibitionLoop->have_posts()): $exhibitionLoop->the_post(); ?>
    <article class="last-exhibition" aria-labelledby="last-exhibition-heading">
        <label for="last-exhibition-input" class="last-exhibition__label last-exhibition__label--open">Lire le text</label>
        <input type="checkbox" class="last-exhibition__input" id="last-exhibition-input">
        <div class="last-exhibition__content">
            <label for="last-exhibition-input" class="last-exhibition__label last-exhibition__label--close">fermer</label>
            <h2 class="last-exhibition__heading" id="last-exhibition-heading" role="heading"
                aria-level="2"><?= the_title(); ?></h2>
            <span class="last-exhibition__author"><?php the_field('artist'); ?></span>
            <p class="last-exhibition__excerpt"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="last-exhibition__link">Découvrir l’exposition <span
                        class="sro">"<?= the_title(); ?>"</span></a>
        </div>
        <img src="<?php the_post_thumbnail_url('home'); ?>"
             srcset="<?php the_post_thumbnail_url('home-2x'); ?> x2"
             sizes="" alt="Image de l’exposition <?= the_title(); ?>">
    </article>
    <?php wp_reset_postdata(); ?>
<?php endwhile; endif; ?>

<?php $bookLoop = new WP_Query([
        'post_type' => 'book',
        'posts_per_page' => 1
    ]);
if (have_posts()): while ($bookLoop->have_posts()): $bookLoop->the_post(); ?>
    <article class="last-book" aria-labelledby="last-book-heading">
        <label for="last-book-input" class="last-book__label">Lire le text</label>
        <input type="checkbox" class="last-book__input" id="last-book-input">
        <div class="last-book__content">
            <h2 class="last-book__heading" id="last-book-heading" role="heading"
                aria-level="2"><?= the_title(); ?></h2>
            <span class="last-book__author"><?php the_field('artist'); ?></span>
            <p class="last-book__excerpt"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="last-book__link">Découvrir l’exposition <span
                        class="sro">"<?= the_title(); ?>"</span></a>
        </div>
        <img src="<?php the_post_thumbnail_url('home'); ?>"
             srcset="<?php the_post_thumbnail_url('home-2x'); ?> x2, <?php the_post_thumbnail_url('home-3x'); ?> 3x"
             sizes="" alt="Image montrant une partie de l’exposition <?= the_title(); ?>">
    </article>
    <?php wp_reset_postdata(); ?>
<?php endwhile; endif; ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="citation">
        <blockquote class="blockquote"><?php the_field('isn_quote'); ?></blockquote>
        <cite class="cite">–<?php the_field('isn_cited'); ?></cite>
    </div>
<?php endwhile; endif; ?>
<section class="newsletter" aria-label="S’inscrire au newsletter">
    <h2 class="newsletter__title" role="heading" aria-level="2">Newsletter</h2>
    <form action="https://lysanderhans.us19.list-manage.com/subscribe/post?u=0003759f72c5892412ad177ed&amp;id=a614a982d1" class="newsletter__form" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" rel="noopener noreferrer" novalidate>
        <label for="mail" class="newsletter__label">Adresse mail</label>
        <input type="email" id="mail" class="newsletter__input" name="EMAIL" placeholder="exemple@mail.com">
        <label for="according" class="newsletter__label">Vous acceptez de recevoir les dernières informations de l’image sans nom par voie électronique. Vous pouvez vous désinscrire à tout moment en utilisant le lien de désinscription.</label>
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0003759f72c5892412ad177ed_a614a982d1" tabindex="-1" value=""></div>
        <input type="checkbox" id="according" name="ok">
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
