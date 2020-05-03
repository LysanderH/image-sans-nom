<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="book" aria-labelledby="book-heading">
        <div class="book__header">
            <h2 class="about__heading" id="book-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span>By Cathy Alvarez</span>
        </div>
        <p class="book__video">
            <?= the_content(); ?>
        </p>
        <!--    @TODO: if video exist echo video metha (acf)    -->

        <!--    endif    -->
        <img src="#" srcset="" sizes="" alt="" class="book__img book__img--big">
        <img src="#" srcset="" sizes="" alt="" class="book__img">
        <img src="#" srcset="" sizes="" alt="" class="book__img">
        <img src="#" srcset="" sizes="" alt="" class="book__img">
        <img src="#" srcset="" sizes="" alt="" class="book__img">
        <img src="#" srcset="" sizes="" alt="" class="book__img">
    </article>
    <a href="<?= get_site_url(); ?>"></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>