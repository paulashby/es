<?php namespace ProcessWire;

include "./helpers.php";

$template_path = $config->urls->templates;
$js_url = $template_path . glob("js/main.min.*.js")[0];
$css_url = $template_path . glob("css/main.min.*.css")[0];
$name = $page->name;
$year = date("Y");

$page_title = $page->title;
if ($page_title === "Home") {
    $title = "stagewear";
    $copyright = "&copy; Esme Ashby $year<br>Last Dinner Party images &copy; <a href='https://www.renegademag.co.uk' target='_blank'>Wez Dale</a> $year";
} else {
    $title = $page_title;
    $copyright = "&copy; Esme Ashby $year";
}