<?php /* Template Name: contact */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="about" aria-labelledby="about-heading">
        <h2 class="about__heading" id="about-heading" role="heading" aria-level="2">À-propos</h2>
        <img src="#" srcset="" sizes="" alt="" class="about__img">
        <div class="about__content wysiwyg"><?= the_content(); ?></div>
    </section>
<?php endwhile; endif; ?>
    <section class="contact">
        <h2 class="contact__heading" role="heading" aria-level="2">Contact</h2>
        <img src="#" srcset="" sizes="" alt="" class="contact__img">
        <form action="/contact" method="post" class="contact__form" role="form" aria-label="Contact">
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
                <label for="name" class="contact__label">Nom</label>
                <input type="text" id="name" class="contact__input contact__input--text" name="name">
                <label for="first-name" class="contact__label">Prénom</label>
                <input type="text" name="first-name" id="first-name" class="contact__input contact__input--text">
                <label for="mail" class="contact__label">Adresse mail</label>
                <input type="text" name="mail" id="mail" class="contact__input contact__input--mail">
                <label for="date" class="contact__label">Date du rendez-vous</label>
                <input type="date" name="date" id="date" class="contact__input contact__input--date">
                <label for="visitors" class="contact__label">Nombre de visiteurs</label>
                <input type="number" name="visitors" id="visitors" class="contact__input contact__input--number">
                <label for="content" class="contact__label">Votre message</label>
                <textarea name="content" id="content" cols="30" rows="10">J’aimerai prendre rendez-vous pour visiter une exposition seul, avec un groupe ou une classe d’école. Nombre</textarea>
                <input type="submit" value="Envoyer">
            </fieldset>
        </form>
    </section>
    <aside class="map" aria-label="Carte interactive pointant sur l’adresse&nbsp;: Place Vivegnis 6, B-4000 Liège">
        <h2 class="map__heading sro" role="heading" aria-level="2">Carte interactive</h2>
    </aside>
    <aside class="info">
        <h2 class="info__heading" role="heading" aria-level="2">Informations de contact</h2>
        <dl class="info__list">
            <dt class="info__therm sro">Adresse de l’image sans nom</dt>
            <dd class="info__definition">Place Vivegnis 6, B-4000 Liège</dd>
            <dt class="info__therm sro">Adresse mail</dt>
            <dd class="info__definition"><a href="mailto:limagesansnom@gmail.com">limagesansnom@gmail.com</a></dd>
            <dt class="info__therm sro">Téléphone</dt>
            <dd class="info__definition"><a href="tel:0032485847977">+32 (0)485 847 977</a></dd>
        </dl>
    </aside>
<?php get_footer(); ?>