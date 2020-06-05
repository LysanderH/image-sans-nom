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
            <?php the_content(); ?>
        </p>
        <!--    Get attached images  -->
        <?php $images = get_field('gallery');

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
    <a href="javascript:history.back()" class="back-btn">Retour<span class="sro"> à la page précédente</span></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>