<?php
namespace ProcessWire;

$intro = $page->text;

?>

<main data-pw-id="main-region">
    <h1 id="headline">
        <?= $title ?>
    </h1>
    <?= $intro ?>
    <form action="/contact">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Name">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="Email">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="8" cols="50" placeholder="Message"></textarea>
        <fieldset class="consent-fields">
            <label class="consent-label" for="consent">I consent to the storage of my personal data for the duration of our conversation.</label>
            <input type="checkbox" id="consent" name="consent" value="granted">
        </fieldset>
        <input type="submit" value="Submit">
    </form>
</main>