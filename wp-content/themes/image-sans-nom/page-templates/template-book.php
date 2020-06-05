<?php
/* Template Name: books */
$loop = new WP_Query([
        'post_type' => 'book',
        'posts_per_page' => -1
    ]
);
?>
<?php get_header(); ?>
<?php if (have_posts()): while ($loop->have_posts()): $loop->the_post(); ?>
    <article class="books" aria-labelledby="books-heading">
        <div class="books__header">
            <h2 class="books__heading" id="books-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span class="books__author">Nom du fotographe</span>
            <a href="<?php the_permalink(); ?>" class="books__link">Découvrir le livre <span
                        class="sro">"<?= the_title(); ?>"</span></a>
        </div>
        <!--    Get attached images  -->
        <?php
        $i = 0;
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
                    <?php $i++;
                    if ($i == 3) break; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!--    end get attached images    -->
    </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>