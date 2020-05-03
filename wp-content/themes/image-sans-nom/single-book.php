<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="book" aria-labelledby="book-heading">
        <div class="book__header">
            <h2 class="about__heading" id="book-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span>By Cathy Alvarez</span>
        </div>
        <p class="book__wysiwyg">
            <?= the_content(); ?>
        </p>
        <!--    Get attached images  -->
        <?php $images = get_attached_media('image');
        foreach ($images as $image) {
            echo wp_get_attachment_image($image->ID, 'small', '', ['class' => 'exhibition__img', 'alt' => 'Image montrant le livre ' . get_the_title()]);
        }; ?>
        <!--    end get attached images    -->
    </article>
    <a href="<?= get_site_url(); ?>"></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>