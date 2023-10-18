<?php namespace ProcessWire;

function getImageMarkup($item) {
    $is_portrait = $item->template->name === "about" || $item->format->name === "portrait";
    $image = $is_portrait ? $item->portrait_image : $item->image;
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

        // Provide regular and art directed versions of image to LazyResponsiveImages
        $img_options["image"] = [
            "art_directed_image" => [
                "image" => $art_directed,
                "media" => "(max-width: 749px)",
                "sizes" => "95.24vw"
            ],
            "image" => [
                "image" => $image,
                "media" => "(min-width: 750px)",
                "sizes" => "(min-width: 1580px) 1484px, 95.24vw"
            ]
        ];
    } else {
        // Provide regular version of image to LazyResponsiveImages
        $img_options["image"] = $image;
        if ($is_portrait) {
            $img_options["field_name"] = "portrait_image";
            $img_options["sizes"] = "(min-width: 1600px) 738px, (min-width: 760px) calc(45.12vw + 25px), calc(100vw - 16px)";
        } else {
            $img_options["field_name"] = "image";
            $img_options["sizes"] = "(min-width: 1580px) 1484px, 95.24vw";
        }
    }

    // Get the picture element for this image
    $lazyImages = wire("modules")->get("LazyResponsiveImages");
    $img_out["mark_up"] = $lazyImages->renderImage($img_options);  

    return $img_out;
}