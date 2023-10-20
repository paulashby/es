<?php namespace ProcessWire;
	
/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */
	
$home = $pages->get('/'); /** @var HomePage $home */

?><!DOCTYPE html>
<html lang="en">
	<head id="html-head">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
		<title><?= $page->title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?= $css_url ?>">
	</head>
	<body id="html-body" class="<?= $name ?>">
        <section>
            <div class="wrapper">
                <header>
                    <nav>
                        <a href="/" class="home-link"><span>Home</span></a>
                        <ul class="page-links">
                            <li><a id="about" href="/about">About</a></li>
                            <li><a id="contact" href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </header>
                <main data-pw-id="main-region">
                    <h1 id="headline">
                        <?= $title ?>
                    </h1>
                </main>
                <footer>
                    <p><?= $copyright ?></p>
                    <div class="insta-link"><a href="http://instagram.com/eddie.sews" target="_blank"><span class="link-text">Instagram</span></a></div>
                </footer>
            </div>
        </section>
    <script src="<?= $js_url ?>"></script>
	</body>
</html>