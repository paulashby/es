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

function getImageMarkup($item) {
    $image = $item->image;
    $is_portrait = $image->ratio < 1;
    
    $img_out = [
        "title" => $item->title,
        "dsc" => $image->description,
        "is_portrait" => $is_portrait,
        "aspect_class" => $is_portrait ? "portrait" : "landscape"
    ];

    // Default options for call to LazyResponsiveImages
    $img_options = [
        "class" => "",
        "context" => "gallery",
        "lazy_load" => true,
        "webp" => true
    ];
    
    $dsc = $image->description;
    $img_options["alt_str"] = $img_out["dsc"] ? $dsc : "Example of costume by Es";
    $art_directed = $item->art_directed_image;
    
    if ($art_directed) {
        $img_out["aspect_class"] .= " art-directed";
    }


    if ($art_directed) {
        // Provide regular and art directed versions of image to LazyResponsiveImages
        $img_options["image"] = [
            "image" => [
                "image" => $image,
                "media" => "(min-width: 750px)",
                "sizes" => $is_portrait ? "100%" : "calc(100vw - 2rem)"
            ],
            "art_directed_image" => [
                "image" => $art_directed,
                "media" => "(max-width: 749px)",
                "sizes" => "100%"
            ]
        ];
    } else {
        // Provide regular version of image to LazyResponsiveImages
        $img_options["image"] = $image;
        $img_options["field_name"] = "image";
        $img_options["sizes"] = "100%";
    }
    // Get the picture element for this image
    $lazyImages = wire("modules")->get("LazyResponsiveImages");
    $img_out["mark_up"] = $lazyImages->renderImage($img_options);  

    return $img_out;
}

?>

<div class="gallery">
    <?= $gallery_items ?>
</div>

	