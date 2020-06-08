<?php
/*
 * Template Name: Accueil
 */
get_header(); ?>
<div class="wrapper">

    <?php $exhibitionLoop = new WP_Query([
        'post_type' => 'exhibition',
        'posts_per_page' => 1
    ]);
    if (have_posts()): while ($exhibitionLoop->have_posts()): $exhibitionLoop->the_post(); ?>
        <input type="checkbox" class="last-article__input last-exhibition__input" id="last-exhibition-input">
        <article class="last-article last-exhibition" aria-labelledby="last-exhibition-heading">
            <label for="last-exhibition-input"
                   class="last-article__label last-article__label--left last-exhibition__label last-exhibition__label--open" tabindex="0">Lire
                le text</label>
            <div class="last-article__content last-article__content--left last-exhibition__content">
                <label for="last-exhibition-input"
                       class="last-article__label last-article__label--close last-exhibition__label last-exhibition__label--close" tabindex="0">fermer</label>
                <h2 class="last-article__heading last-exhibition__heading" id="last-exhibition-heading" role="heading"
                    aria-level="2"><?= the_title(); ?></h2>
                <span class="last-article__author last-exhibition__author"><?php the_field('artist'); ?></span>
                <p class="last-article__excerpt last-exhibition__excerpt"><?= get_the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn last-article__link last-exhibition__link">Découvrir
                    l’exposition <span
                            class="sro">"<?= the_title(); ?>"</span></a>
            </div>
            <img src="<?php the_post_thumbnail_url('home-mobile'); ?>"
                 srcset="<?php the_post_thumbnail_url('home-mobile'); ?> 600w, <?php the_post_thumbnail_url('home'); ?> 1024w, <?php the_post_thumbnail_url('home-big-screens'); ?> 1280w"
                 sizes="(max-width: 375px) 375px, (max-width: 1024px) 1024px, (max-width: 1280px) 1280px" alt="Image de l’exposition <?= the_title(); ?>" class="last-article__img">
        </article>
        <?php wp_reset_postdata(); ?>
    <?php endwhile; endif; ?>

    <?php $bookLoop = new WP_Query([
        'post_type' => 'book',
        'posts_per_page' => 1
    ]);
    if (have_posts()): while ($bookLoop->have_posts()): $bookLoop->the_post(); ?>
        <input type="checkbox" class="last-article__input last-book__input" id="last-book-input">
        <article class="last-article last-book" aria-labelledby="last-book-heading">
            <label for="last-book-input" class="last-article__label last-article__label--open last-book__label last-book__label--open" tabindex="0">Lire le
                text</label>
            <div class="last-article__content last-article__content--right last-book__content">
                <label for="last-book-input"
                       class="last-article__label last-article__label--close last-exhibition__label--close last-book__label--close" tabindex="0">fermer</label>
                <h2 class="last-article__heading last-book__heading" id="last-book-heading" role="heading"
                    aria-level="2"><?= the_title(); ?></h2>
                <p class="last-article__excerpt last-book__excerpt"><?= get_the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn last-article__link last-book__link">Découvrir
                    l’exposition
                    <span
                            class="sro">"<?= the_title(); ?>"</span></a>
            </div>
            <img src="<?php the_post_thumbnail_url('home-mobile'); ?>"
                 srcset="<?php the_post_thumbnail_url('home-mobile'); ?> 600w, <?php the_post_thumbnail_url('home'); ?> 1024w, <?php the_post_thumbnail_url('home-big-screens'); ?> 1280w"
                 sizes="(max-width: 375px) 375px, (max-width: 783px) 783px, (max-width: 1280px) 1280px" alt="Image montrant une partie de l’exposition <?= the_title(); ?>" class="last-article__img">
        </article>
        <?php wp_reset_postdata(); ?>
    <?php endwhile; endif; ?>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="citation">
            <blockquote class="citation__blockquote"><?php the_field('isn_quote'); ?></blockquote>
            <cite class="citation__cite">–<?php the_field('isn_cited'); ?></cite>
        </div>
    <?php endwhile; endif; ?>
    <section class="newsletter" aria-label="S’inscrire au newsletter">
        <h2 class="newsletter__heading" role="heading" aria-level="2"><?= __('Newsletter', 'isn'); ?></h2>
        <form action="https://lysanderhans.us19.list-manage.com/subscribe/post?u=0003759f72c5892412ad177ed&amp;id=a614a982d1"
              class="newsletter__form" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
              target="_blank" rel="noopener noreferrer" novalidate>
            <p class="newsletter__sub-heading"><?= __('Inscriver vous à notre newsletter', 'isn'); ?></p>
            <label for="mail" class="newsletter__label">Adresse mail</label>
            <input type="email" id="mail" class="newsletter__input" name="EMAIL" placeholder="exemple@mail.com">
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_0003759f72c5892412ad177ed_a614a982d1" tabindex="-1" value="">
            </div>
            <p class="newsletter__trust"><?= __('Votre vie privée est importante pour nous, lisez nos' . ' ', 'isn'); ?>
                <a
                        href="<?php echo esc_url(get_permalink(get_page_by_title('Privacy Policy'))); ?>"
                        class="newsletter__link"><?= __('conditions d’utilisation', 'isn'); ?></a>.</p>
            <button type="submit" class="newsletter__submit btn"><?= __('S’abonner', 'isn'); ?></button>
        </form>
    </section>

    <section class="fb-submit">
        <h2 class="fb-submit__heading">Suivez nous sur Facebook</h2>
        <img src="https://graph.facebook.com/limagesansnom/picture?type=large" alt="Foto de profil de l’image sans nom"
             class="fb-submit__img">
        <a href="https://www.facebook.com/limagesansnom/" class="fb-submit__link btn"><span class="sro">S’abonner à notre page </span>Facebook</a>
    </section>

    <a href="<?php echo esc_url(get_permalink(get_page_by_title('contact'))); ?>" class="cta">Contact</a>
</div>

<?php get_footer(); ?>
