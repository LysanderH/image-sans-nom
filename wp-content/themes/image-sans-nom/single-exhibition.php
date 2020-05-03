<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="exhibition" aria-labelledby="exhibition-heading">
        <div class="exhibition__header">
            <h2 class="exhibition__heading" id="exhibition-heading" role="heading"
                aria-level="2"><?= the_title(); ?></h2>
            <span>By <?= get_field('artists'); ?></span>
            <p class="date">Du <span> <?= get_field('startDate'); ?></span> au
                <span> <?= get_field('endDate'); ?></span></p>

        </div>
        <p class="exhibition__video">
            <?= the_content(); ?>
        </p>
        <!--    Get attached images  -->
        <?php $images = get_attached_media('image');
        foreach ($images as $image) {
            echo wp_get_attachment_image($image->ID, 'small', '', ['class' => 'exhibition__img', 'alt' => 'Oeuvre de l’exposition ' . get_the_title()]);
        }; ?>
        <!--    end get attached images    -->
    </article>
    <a href="<?= get_site_url(); ?>"></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>