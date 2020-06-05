<?php

add_action('init', 'isn_start_session', 1);
add_action('admin_post_isn_custom_form_treatment', 'isn_handleForm');
add_action('admin_post_nopriv_isn_custom_form_treatment', 'isn_handleForm');

function isn_start_session()
{
    if (session_id()) return;
    session_start();
}

function isn_handleForm()
{
    $nonce = $_POST['_wpnonce'] ?? null;
    $action = $_POST['action'] ?? null;

    if (!wp_verify_nonce($nonce, 'isn_custom_form')) {
        return false;
    }

    $name = sanitize_text_field($_POST['isn_name']);
    $firstName = sanitize_text_field($_POST['isn_first-name']);
    $mail = sanitize_text_field($_POST['isn_mail']);
    if (!empty($_POST['isn_date'])) {
        $date = (strtotime($_POST['isn_date']));
        $date = Date('d/m/Y', $date);
        if (!$date) {
            $errors['errors']['date'] = __('Veuillez donner une date correct.', 'isn');
        } else {
            $errors['good']['trueDate'] = Date('Y-m-d', $date);
        }
    }
    if (!empty($_POST['isn_time'])) {
        $time = Date('H:i', strtotime($_POST['isn_time']));
        if (!$time) {
            $errors['errors']['time'] = __('Veuillez donner une heure correct (10:00).', 'isn');
        } else {
            $errors['good']['trueTime'] = Date('H:i', $time);
        }

    }
    $visitors = (int)$_POST['isn_visitors'];
    $message = sanitize_text_field($_POST['isn_content']);
    $errors = [];

    if (!strlen($name)) {
        $errors['errors']['name'] = __('Veuillez renseigner votre nom.', 'isn');
    } else {
        $errors['good']['trueName'] = $name;
    }

    if (!strlen($firstName)) {
        $errors['errors']['firstName'] = __('Veuillez renseigner votre nom.', 'isn');
    } else {
        $errors['good']['trueFirstName'] = $name;
    }


    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['errors']['mail'] = __('Veuillez respecter le format du courriel (example@domaine.be).', 'isn');
    } else {
        $errors['good']['trueMail'] = $mail;
    }

    if (!strlen($message)) {
        $errors['errors']['message'] = __('Veuillez à écrire un message.', 'isn');
    } else {
        $errors['good']['trueMessage'] = $message;
    }

    if ($errors['errors']) {
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return isn_formRedirectFeedback($action, $errors);
    }
    $content = 'Un nouveau message est arrivé :' . PHP_EOL;
    $content .= 'Nom et prénom: ' . $name . ' ' . $firstName . PHP_EOL;
    $content .= 'Nombre de personnes : ' . $visitors . PHP_EOL;
    $content .= 'Mail : ' . $mail . PHP_EOL;
    if ($date || $time) {
        $content .= 'Le : ' . $date . ' à ' . $time . PHP_EOL;
    }
    $content .= 'Message :' . PHP_EOL;
    $content .= $message;

    if (wp_mail('lysander.hans@hotmail.com', 'Contact de Lysanderhans.com', $content)) {
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return isn_formRedirectFeedback($action, [
            'success' => true,
            'sendMessage' => __('Merci ! Votre message a été envoyé.', 'isn')
        ]);
    }

    /** @noinspection PhpVoidFunctionResultUsedInspection */
    return isn_formRedirectFeedback($action, [
        'success' => false,
        'sendMessage' => __('Woups, votre mail n’a pas été envoyé.', 'isn')
    ]);
}

function isn_formRedirectFeedback($action, $feedback)
{
    $url = wp_get_referer();

    $_SESSION['feedback_' . $action] = $feedback;

    wp_safe_redirect($url . '#contact');

    exit;
}

function isn_formFeedback($action)
{
    if (!isset($_SESSION['feedback_' . $action])) {
        return false;
    }
    $feedback = $_SESSION['feedback_' . $action];
    unset($_SESSION['feedback_' . $action]);
    return $feedback;
}