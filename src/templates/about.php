<?php namespace ProcessWire;

$image_details = getImageMarkup($page);
$image_markup = $image_details['mark_up'];
$figure_class = $image_details['aspect_class'];
$text = $page->text;

?>

<main data-pw-id="main-region">
    <h1 id="headline">
        <?= $title ?>
    </h1>
    <section class="about-section">
        <figure class="image-entry <?= $figure_class ?>">
            <?= $image_markup ?>
        </figure>
        <div class="profile">
            <?= $text ?>
        </div>
    </section>
</main>	