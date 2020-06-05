<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="book" aria-labelledby="book-heading">
        <div class="book__header">
            <h2 class="about__heading" id="book-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span>By <?php the_field('artist'); ?></span>
        </div>
        <p class="book__wysiwyg">
            <?php the_content(); ?>
        </p>
        <!--    Get attached images  -->
        <?php

        $images = get_field('gallery');

        if ($images): ?>
            <ul class="gallery">
                <?php foreach ($images as $image): ?>
                    <li class="gallery__item">
                        <a href="<?php echo $image['url']; ?>" target="_blank" rel="noreferrer noopener"
                           class="gallery__link">
                            <!-- todo: srcset -->
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"
                                 class="gallery__img"/>
                        </a>
                        <p class="gallery__caption"><?php echo $image['caption']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!--    end get attached images    -->
    </article>
    <a href="<?= get_site_url(); ?>"></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>