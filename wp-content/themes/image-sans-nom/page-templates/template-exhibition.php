<?php
/* Template Name: exhibitions */
$loop = new WP_Query([
        'post_type' => 'exhibition',
        'posts_per_page' => 3,
        'paged' => get_query_var('exhibitions-pagination') ?: 1,
    ]
);
?>
<?php get_header(); ?>
<?php if (have_posts()): while ($loop->have_posts()): $loop->the_post(); ?>
    <article class="books" aria-labelledby="books-heading">
        <div class="books__header">
            <h2 class="books__heading" id="books-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span class="books__author"><?php the_field("artists"); ?></span>
            <a href="<?php the_permalink(); ?>" class="books__link btn">Découvrir l’exposition<span
                        class="sro"> "<?= the_title(); ?>"</span></a>
        </div>
        <!--    Get attached images  -->
        <?php
        $i = 0;
        $images = get_field('gallery');

        if ($images): ?>
            <?php foreach ($images as $image): ?>
                <a href="<?php the_permalink(); ?>" target="_blank" rel="noreferrer noopener"
                   title="Découvrir le livre <?= the_title(); ?>"
                   class="books__img-wrapper books__img-wrapper--<?= $i; ?>">
                    <!-- todo: srcset -->
                    <img src="<?php echo $image['sizes']['books']; ?>"
                         alt="Image montrant le livre <?= the_title(); ?>"
                         class="books__img books__img--<?= $i; ?>"/>
                </a>
                <?php $i++;
                if ($i == 2) break; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <!--    end get attached images    -->
    </article>
<?php endwhile; endif; ?>
    <div class="pagination-links">
        <?= paginate_links([
            'format' => '?exhibitions-pagination=%#%',
            'current' => get_query_var('exhibitions-pagination') ?: 1,
            'total' => $loop->max_num_pages
        ]); ?>
    </div>
    <div class="follow">
        <section class="newsletter" aria-label="S’inscrire au newsletter">
            <h2 class="newsletter__heading" role="heading" aria-level="2"><?= __('Newsletter', 'isn'); ?></h2>
            <form action="https://lysanderhans.us19.list-manage.com/subscribe/post?u=0003759f72c5892412ad177ed&amp;id=a614a982d1"
                  class="newsletter__form" method="post" id="mc-embedded-subscribe-form"
                  name="mc-embedded-subscribe-form"
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
            <img src="https://graph.facebook.com/limagesansnom/picture?type=large"
                 alt="Foto de profil de l’image sans nom"
                 class="fb-submit__img">
            <a href="https://www.facebook.com/limagesansnom/" class="fb-submit__link btn"><span class="sro">S’abonner à notre page </span>Facebook</a>
        </section>
    </div>
    <a href="<?php echo esc_url(get_permalink(get_page_by_title('contact'))); ?>" class="cta">Contact</a>

<?php get_footer(); ?>