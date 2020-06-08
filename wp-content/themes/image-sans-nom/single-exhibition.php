<?php get_header(); ?>
    <style>
        .header__heading {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        .header {
            margin: 0;
            background: transparent;
            border: none;
            height: auto;
            min-height: initial;
            max-width: initial;
            position: static;
            width: 100%;
        }

        .global {
            transform: translate(0, 0);
            background: transparent;
            height: auto;
            width: auto;
            min-height: auto;
            min-width: auto;
            position: static;
        }

        .global__link {
            font-family: "Proxima Nova Alt Rg", sans-serif;
            font-size: 1rem;
        }

        .header__label--open, .header__label--close  {
            display: none;
        }

        .global__list {
            border: none;
            flex-direction: row;
            position: static;
            height: auto;
            width: auto;
            min-height: auto;
            min-width: auto;
            margin: 0;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .header__scroll-link {
            display: none;
        }

        @media screen and (min-width: 0) and (max-width: 760px) {
            .global {
                position: absolute !important;
                width: 1px !important;
                height: 1px !important;
                padding: 0 !important;
                margin: -1px !important;
                clip: rect(0, 0, 0, 0) !important;
                white-space: nowrap !important;
                border: 0 !important;
            }
        }
    </style>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="exhibition" aria-labelledby="exhibition-heading" itemscope
             itemtype="https://schema.org/ExhibitionEvent">
        <div class="exhibition__header">
            <h2 class="exhibition__heading" id="exhibition-heading" role="heading"
                aria-level="2" itemprop="name"><?= the_title(); ?></h2>
            <span class="exhibition__author">By <span itemprop="actor"><?= get_field('artists'); ?></span></span>
            <p class="exhibition__date">Du <span itemprop="startDate"> <?= get_field('startDate'); ?></span> au
                <span itemprop="endDate"> <?= get_field('endDate'); ?></span></p>
            <?php if (get_field('poster')): ?>
            <a href="<?= get_field('poster') ?>" class="exhibition__download" download="">Télécharger l'affiche</a>
            <?php endif; ?>
        </div>
        <p class="exhibition__content">
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
                            <img src="<?php echo $image['sizes']['single-mobile']; ?>"
                                 srcset="<?php echo $image['sizes']['single-mobile']; ?> 375vw, <?php echo $image['sizes']['single-tablet']; ?> 783vw, <?php echo $image['sizes']['single-desktop']; ?> 1024vw, <?php echo $image['sizes']['single-big-screens']; ?> 1280vw"
                                 sizes="(max-width: 375px) 375px, (max-width: 783px) 783px, (max-width: 1024px) 1024px, (min-width: 1280px) 1280px"
                                 alt="<?php if ($image['alt']) {
                                echo $image['alt'];
                            } else {
                                echo __('Image montrant l’exposition'  . the_title(), 'isn');
                            } ?>" class="gallery__img">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!--    end get attached images    -->
    </article>
    <a href="javascript:history.back()" class="back-btn btn">Retour<span class="sro"> à la page précédente</span></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>