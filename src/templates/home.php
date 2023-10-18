<?php namespace ProcessWire;

$image_entries = $pages->get("template=gallery")->children;
$gallery = "";
if (count($image_entries)) {
    $gallery = $files->render("components/gallery/index.php", ["entries" => $image_entries]);
}

?>

<main data-pw-id="main-region">
    <h1 id="headline">
        <?= $title ?>
    </h1>
    <?= $gallery ?>
</main>	