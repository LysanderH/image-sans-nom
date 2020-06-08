<?php /* Template Name: contact */ ?>
<?php get_header();
$feedback = isn_formFeedback('isn_custom_form_treatment'); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="about" aria-labelledby="about-heading">
        <h2 class="about__heading" id="about-heading" role="heading" aria-level="2">À-propos</h2>
        <?php
        $image = get_field('isn_image_about');
        if (!empty($image)): ?>
            <img src="<?= esc_url($image['sizes']['home']); ?>" srcset="<?= esc_url($image['sizes']['home-mobile']); ?> 600w, <?= esc_url($image['sizes']['home']); ?> 780w, <?= esc_url($image['sizes']['home-big-screens']); ?> 1024w" sizes="(max-width: 375px) 375px, (max-width: 783px) 783px, (max-width: 1024px) 1024px"
                 alt="Image illustrant la section à propos" class="about__img">
        <?php endif; ?>
        <p class="about__content wysiwyg"><?php the_field('description_isn'); ?></p>
    </section>
<?php endwhile; endif; ?>
    <section class="contact" id="contact">
        <h2 class="contact__heading" role="heading" aria-level="2">Contact</h2>
        <?php
        $image = get_field('isn_image_about');
        if (!empty($image)): ?>
            <img src="<?= esc_url($image['sizes']['home']); ?>" srcset="<?= esc_url($image['sizes']['home-mobile']); ?> 600w, <?= esc_url($image['sizes']['home']); ?> 780w, <?= esc_url($image['sizes']['home-big-screens']); ?> 1024w" sizes="(max-width: 375px) 375px, (max-width: 783px) 783px, (max-width: 1024px) 1024px"
            alt="Image illustrant la section contact"
                 class="contact__img">
        <?php endif; ?>
        <form action="<?= admin_url('admin-post.php'); ?>" method="post" class="contact__form" role="form"
              aria-label="Contact">
            <?php if ($feedback['sendMessage']): ?>
                <legend><?= $feedback['sendMessage']; ?></legend>
            <?php endif; ?>
            <legend class="contact__legend sro">Vos informations</legend>
            <label for="name" class="contact__label"><?= __('Nom', 'isn'); ?></label>
            <input type="text" id="name" class="contact__input contact__input--text" name="isn_name"
                   placeholder="Mustermann" value="<?= $feedback['good']['trueName']; ?>">
            <?php if ($feedback['errors']['name']): ?>
                <label for="name" class="contact__error"><?= $feedback['errors']['name']; ?></label>
            <?php endif; ?>

            <label for="fist-name" class="contact__label"><?= __('Prénom', 'isn'); ?></label>
            <input type="text" id="first-name" class="contact__input contact__input--text" name="isn_first-name"
                   placeholder="Max" value="<?= $feedback['good']['trueFirstName']; ?>">
            <?php if ($feedback['errors']['firstName']): ?>
                <label for="first-name" class="contact__error"><?= $feedback['errors']['firstName']; ?></label>
            <?php endif; ?>

            <label for="mail" class="contact__label"><?= __('Adresse mail', 'isn'); ?></label>
            <input type="email" name="isn_mail" id="mail" class="contact__input contact__input--mail"
                   placeholder="example@mail.com" value="<?= $feedback['good']['trueMail']; ?>">
            <?php if ($feedback['errors']['mail']): ?>
                <label for="mail" class="contact__error"><?= $feedback['errors']['mail']; ?></label>
            <?php endif; ?>

            <label for="date" class="contact__label"><?= __('Date du rendez-vous', 'isn'); ?></label>
            <input type="date" id="date" class="contact__input contact__input--date" name="isn_date"
                   value="<?= $feedback['good']['trueDate']; ?>">
            <?php if ($feedback['errors']['date']): ?>
                <label for="date" class="contact__error"><?= $feedback['errors']['date']; ?></label>
            <?php endif; ?>

            <label for="time" class="contact__label"><?= __('Heure du rendez-vous', 'isn'); ?></label>
            <input type="time" id="time" class="contact__input contact__input--time" name="isn_time"
                   value="<?= $feedback['good']['trueDate']; ?>">
            <?php if ($feedback['errors']['time']): ?>
                <label for="time" class="contact__error"><?= $feedback['errors']['time']; ?></label>
            <?php endif; ?>

            <label for="visitors" class="contact__label"><?= __('Nombre de visiteurs', 'isn'); ?></label>
            <input type="number" id="visitors" class="contact__input contact__input--number" name="isn_visitors"
                   value="<?= $feedback['good']['trueVisitors']; ?>">
            <?php if ($feedback['errors']['visitors']): ?>
                <label for="visitors" class="contact__error"><?= $feedback['errors']['visitors']; ?></label>
            <?php endif; ?>

            <label for="content" class="contact__label"><?= __('Votre message', 'isn'); ?></label>
            <textarea name="isn_content" id="content" cols="30" rows="10" class="contact__input"
                      placeholder="<?= __('J’aimerai prendre rendez-vous pour visiter une exposition seul, avec un groupe ou une classe d’école. Nombre', 'isn'); ?>"><?= $feedback['good']['trueMessage']; ?></textarea>
            <?php if ($feedback['errors']['message']): ?>
                <label for="name" class="contact__error"><?= $feedback['errors']['message']; ?></label>
            <?php endif; ?>

            <input type="hidden" name="_wpnonce" value="<?= wp_create_nonce('isn_custom_form'); ?>">
            <input type="hidden" name="action" value="isn_custom_form_treatment">
            <button type="submit" class="contact__btn btn"><?= __('Envoyer', 'isn'); ?></button>
        </form>
    </section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <aside class="map" aria-label="Carte interactive pointant sur l’adresse&nbsp;: Place Vivegnis 6, B-4000 Liège">
        <h2 class="map__heading sro" role="heading" aria-level="2">Carte interactive</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10118.63737053776!2d5.5890223!3d50.6520175!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3c386ea52038923!2sL&#39;image%20Sans%20Nom!5e0!3m2!1sde!2sbe!4v1591542320511!5m2!1sde!2sbe"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0" class="map__gmap"></iframe>
    </aside>
    <aside class="info">
        <h2 class="info__heading sro" role="heading" aria-level="2">Informations de contact</h2>
        <dl class="info__list">
            <dt class="info__therm sro">Adresse de l’image sans nom</dt>
            <dd class="info__definition info__street"><?php the_field('isn_street'); ?> <?php the_field('isn_house-number'); ?>,
            </dd>
            <dd class="info__definition info__country"><?php the_field('isn_postal-code'); ?><?php the_field('isn_country'); ?></dd>
            <dt class="info__therm sro">Adresse mail</dt>
            <dd class="info__definition"><a
                        href="mailto:<?php the_field('isn_email'); ?>"><?php the_field('isn_email'); ?></a></dd>
            <dt class="info__therm sro">Téléphone</dt>
            <dd class="info__definition"><a href="tel:0032485847977"><?php the_field('isn_phone'); ?></a></dd>
        </dl>
    </aside>
<?php endwhile; endif; ?>
<?php get_footer(); ?>