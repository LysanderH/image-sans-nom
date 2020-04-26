<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="book" aria-labelledby="book-heading">
        <div class="book__header">
            <h2 class="about__heading" id="book-heading" role="heading" aria-level="2"><?= the_title(); ?></h2>
            <span>By Cathy Alvarez</span>
        </div>
        <p class="book__video">
            <?= get_the_content(); ?>
        </p>
        <!--    @TODO: if video exist echo video metha (acf)    -->
        <iframe width="787" height="443" src="https://www.youtube.com/embed/asDlYjJqzWE?list=RDiywaBOMvYLI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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