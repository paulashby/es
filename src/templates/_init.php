<?php namespace ProcessWire;

$template_path = $config->urls->templates;
$js_url = $template_path . glob("js/main.min.*.js")[0];
$css_url = $template_path . glob("css/main.min.*.css")[0];
$title = $page->title;