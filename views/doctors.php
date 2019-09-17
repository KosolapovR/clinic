<?php require_once VIEWS . '/header.php'; ?>
<main>
    <div class="whrapper">
        <?php foreach ($doctors as $col):?>
        <div class="doctors_card">
            <div class="top_block">
                <div class="photo" style="background: url(<?=$col['img_path']?>); background-size: cover"></div>
                 <h3 class="name"><?=$col['name']?></h3>
                <p class="category"><?=$col['category']?></p>
            </div>
            <div class="info_block">
               
                <p class="description"><?=$col['description']?></p>
            </div>
            <div class="social">
                <div class="vk">vk</div>
                <div class="fb">fb</div>
                <div class="instagramm">in</div>
                <div class="twitter">tw</div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</main>
 <?php require_once VIEWS . '/footer.php'; ?>