<?php namespace ProcessWire;

$gallery_items = "";
$portrait_pair = "";

foreach ($entries as $item) {
    $image_details = getImageMarkup($item);

    $figure_markup = "<figure class='image-entry {$image_details['aspect_class']}'>
        {$image_details['mark_up']}
        <figcaption>
            <h2 class='caption-title'>{$image_details['title']}</h2>{$image_details['dsc']}
        </figcaption>
    </figure>";

    if ($image_details["is_portrait"]) {
        if (strlen($portrait_pair)) {
            $gallery_items .= $portrait_pair . $figure_markup;
            $portrait_pair = "";
        } else {
            $portrait_pair .= $figure_markup;
        }

    } else {
        $gallery_items .= $figure_markup;
    }
}

?>

<div class="gallery">
    <?= $gallery_items ?>
</div>

	