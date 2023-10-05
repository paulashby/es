<?php namespace ProcessWire;

?>

<div class="gallery">
    <?php foreach($entries as $item): ?>
        <div class="image-entry">
            <img src="<?= $item->image->url ?>">
        </div>
    <?php endforeach; ?>
</div>

	