<?php namespace ProcessWire;
	
/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */
	
$home = $pages->get('/'); /** @var HomePage $home */

?><!DOCTYPE html>
<html lang="en">
	<head id="html-head">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?= $page->title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?= $css_url ?>">
	</head>
	<body id="html-body" class="<?= $name ?>">
        <header>
            <nav>
                <a href="/" class="home-link"><span>Home</span></a>
                <ul class="page-links">
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main data-pw-id="main-region">
            <h1 id="headline">
                <?= $title ?>
            </h1>
        </main>
        <footer>
            <p>&copy; Esme Ashby, <?= $year ?></p>
        </footer>
        <script src="<?= $js_url ?>"></script>
	</body>
</html>