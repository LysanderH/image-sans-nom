<?php /* Template Name: contact */ ?>
<?php get_header();
$feedback = isn_formFeedback('isn_custom_form_treatment');?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="about" aria-labelledby="about-heading">
        <h2 class="about__heading" id="about-heading" role="heading" aria-level="2">À-propos</h2>
        <?php
        $image = get_field('isn_image_about');
        if (!empty($image)): ?>
            <img src="<?php echo esc_url($image['sizes']['contact_a-propos']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
        <?php endif; ?>
        <div class="about__content wysiwyg"><?php the_field('description_isn'); ?></div>
    </section>
<?php endwhile; endif; ?>
    <section class="contact">
        <h2 class="contact__heading" role="heading" aria-level="2">Contact</h2>
        <?php
        $image = get_field('isn_image_about');
        if (!empty($image)): ?>
            <img src="<?= esc_url($image['sizes']['contact_a-propos']); ?>" alt="<?= esc_attr($image['alt']); ?>"/>
        <?php endif; ?>
        <form action="<?= admin_url('admin-post.php'); ?>" method="post" class="contact__form" role="form" aria-label="Contact">
            <?php if ($feedback['sendMessage']): ?>
            <legend><?= $feedback['sendMessage']; ?></legend>
            <?php endif; ?>
            <fieldset>
                <legend class="contact__legend" id="subject">Choix du sujet de contact</legend>
                <label class="contact__label" for="expo">J’aimerai prendre rendez-vous pour visiter une
                    exposition seul, avec un groupe ou une classe
                    d’école</label>
                <input type="radio" name="subject" id="expo" class="contact__input contact__input--radio">
                <label class="contact__label" for="books">J’aimerai prendre rendez-vous pour consulter
                    des livres</label>
                <input type="radio" name="subject" id="books" class="contact__input contact__input--radio">
                <label class="contact__label" for="photographer">Je suis photographe, j’aimerais faire une expo</label>
                <input type="radio" name="subject" id="photographer" class="contact__input contact__input--radio">
                <label class="contact__label" for="else">Autre</label>
                <input type="radio" name="subject" id="else" class="contact__input contact__input--radio">
            </fieldset>
            <fieldset>
                <legend class="contact__legend sro">Vos informations</legend>
                <label for="name" class="contact__label"><?= __('Nom', 'isn'); ?></label>
                <input type="text" id="name" class="contact__input contact__input--text" name="isn_name"
                       placeholder="Mustermann" value="<?= $feedback['good']['trueName']; ?>">
                <?php if ($feedback['errors']['name']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['name']; ?></label>
                <?php endif; ?>

                <label for="fist-name" class="contact__label"><?= __('Prénom', 'isn'); ?></label>
                <input type="text" id="first-name" class="contact__input contact__input--text" name="isn_name"
                       placeholder="Max" value="<?= $feedback['good']['trueFirst-name']; ?>">
                <?php if ($feedback['errors']['first-name']): ?>
                    <label for="first-name" class="contact__error"><?= $feedback['errors']['first-name']; ?></label>
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

                <label for="time" class="contact__label"><?= __('Date du rendez-vous', 'isn'); ?></label>
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
                <textarea name="isn_content" id="content" cols="30" rows="10"
                          placeholder="<?= __('J’aimerai prendre rendez-vous pour visiter une exposition seul, avec un groupe ou une classe d’école. Nombre', 'isn'); ?>"><?= $feedback['good']['trueMessage']; ?></textarea>
                <?php if ($feedback['errors']['message']): ?>
                    <label for="name" class="contact__error"><?= $feedback['errors']['message']; ?></label>
                <?php endif; ?>

                <input type="hidden" name="_wpnonce" value="<?= wp_create_nonce('isn_custom_form'); ?>">
                <input type="hidden" name="action" value="isn_custom_form_treatment">
                <input type="submit" value="<?= __('Envoyer', 'isn'); ?>">
            </fieldset>
        </form>
    </section>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <aside class="map" aria-label="Carte interactive pointant sur l’adresse&nbsp;: Place Vivegnis 6, B-4000 Liège">
        <h2 class="map__heading sro" role="heading" aria-level="2">Carte interactive</h2>
    </aside>
    <aside class="info">
        <h2 class="info__heading" role="heading" aria-level="2">Informations de contact</h2>
        <dl class="info__list">
            <dt class="info__therm sro">Adresse de l’image sans nom</dt>
            <dd class="info__definition"><?php the_field('isn_street'); ?> <?php the_field('isn_house-number'); ?>
                , <?php the_field('isn_postal-code'); ?> <?php the_field('isn_country'); ?></dd>
            <dt class="info__therm sro">Adresse mail</dt>
            <dd class="info__definition"><a
                        href="mailto:<?php the_field('isn_email'); ?>"><?php the_field('isn_email'); ?></a></dd>
            <dt class="info__therm sro">Téléphone</dt>
            <dd class="info__definition"><a href="tel:0032485847977"><?php the_field('isn_phone'); ?></a></dd>
        </dl>
    </aside>
<?php endwhile; endif; ?>
<?php get_footer(); ?>