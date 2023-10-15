<?php
declare(strict_types=1);

namespace ProcessWire;

$intro = $page->text;
$form = new \FrontendForms\Form('contact');

$firstname = new \FrontendForms\InputText('firstname');
$firstname->setLabel('Firstname');
$firstname->setRule('required')->setCustomFieldName('The first name');
$firstname->setAttribute('placeholder', 'First name*');
$form->add($firstname);

$lastname = new \FrontendForms\InputText('lastname');
$lastname->setLabel('Lastname');
$lastname->setRule('required')->setCustomFieldName('The last name');
$lastname->setAttribute('placeholder', 'Last name*');
$form->add($lastname);

$email = new \FrontendForms\InputEmail('email');
$email->setLabel('Email address');
$email->setSanitizer('email');
$email->setRule('required')->setCustomFieldName('The Email address');
$email->setAttribute('placeholder', 'Email*');
$form->add($email);

$subject = new \FrontendForms\InputText('subject');
$subject->setLabel('Subject');
$subject->setRule('required')->setCustomFieldName('The subject');
$subject->setAttribute('placeholder', 'Subject*');
$form->add($subject);

$message = new \FrontendForms\Textarea('message');
$message->setLabel('Message');
$message->setRule('required')->setCustomFieldName('The message');
$message->setAttribute('placeholder', 'Message*');
$form->add($message);

$accept = new \FrontendForms\InputCheckbox('accept');
$accept->setLabel('I consent to the storage of my personal data for the duration of our conversation.');
$accept->setRule('required')->setCustomMessage("I can't process your submission without your consent.");
$accept->setRule('accepted');
$form->add($accept);

$button = new \FrontendForms\Button('submit');
$button->setAttribute('value', 'Submit');
$form->add($button);

if ($form->isValid()) {

    // send the form with wireMail
    $m = wireMail();
    $m->to('paul@example.com');
    if($form->getValue('sendcopy')){
        // send copy to sender
        $m->to($form->getValue('email'));
    }
    $m->from($form->getValue('email'));
    $m->subject($form->getValue('subject'));
    $m->title('<h1>A new message via contact form</h1>');

    $body = '<p>[[TITLE]]</p><ul>
            <li>[[FIRSTNAMELABEL]]: [[FIRSTNAMEVALUE]]</li>
            <li>[[LASTNAMELABEL]]: [[LASTNAMEVALUE]]</li>
            <li>[[EMAILLABEL]]: [[EMAILVALUE]]</li>
            <li>[[SUBJECTLABEL]]: [[SUBJECTVALUE]]</li>
            <li>[[MESSAGELABEL]]: [[MESSAGEVALUE]]</li>
          </ul>';
    bd($body);
    $m->bodyHTML($body);
    $m->sendAttachments($form, true);

    if (!$m->send())
    {
        $this->generateEmailSentErrorAlert();
    }

}

$contact_form = $form->render();

?>

<main data-pw-id="main-region">
    <h1 id="headline">
        <?= $title ?>
    </h1>
    <?= $intro ?>
    <?= $contact_form ?>
</main>