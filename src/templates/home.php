<?php namespace ProcessWire;

$image_entries = $page->children("template=image-entry");
$gallery = "";
if (count($image_entries)) {
    $gallery = $files->render("components/gallery/index.php", ["entries" => $image_entries]);
}

?>

<main data-pw-id="main-region">

    <header>
        <h1 id="headline">
            <?= $title ?>
        </h1>
    </header>
    <?= $gallery ?>
</main>	