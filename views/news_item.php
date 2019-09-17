<?php require_once VIEWS . '/header.php'; ?>
<main>
    <div class="whrapper">
        <?php $like_red = false;?>
        <div class="news-card">
            <div class="news-card_img"><img src="<?=$news['img_path']?>" alt="img"></div>
            <div class="news-card_description">
                <h2 class="subject"><?=$news['subject']?></h2>
                <div class="icon_block">
                    <div class="date"><?=$news['date']?></div>
                    <?php
                        foreach ($likes_current_user as $field){
                        if($like['id'] == $field['news_id']){
                        $like_red = true;
                        break;
                        }
                    } ?>
                    <?php if($like_red): ?>
                    <div class="like" style="background: url(../img/icons/like.svg)"><?=$like['id']?></div>
                    <?php else :?>
                    <div class="like" style="background: url(../img/icons/like_gray.svg)"><?=$like['id']?></div>
                    <?php endif; ?>
                    <?php if($like_red): ?>
                    <div class="number_of_like" style="color: #D75A4A"><?=$like['love']?></div>
                    <?php else :?>
                    <div class="number_of_like" style="color: #333"><?=$like['love']?></div>
                    <?php endif; ?>
                    <?php $like_red = false;?>
                    <div class="views" ></div>
                    <div class="number_of_views"><?=$news['views']?></div>
                </div>
                <p class="text"><?=$news['text']?></p>
            </div>
        </div>
    </div>
</main>
<?php require_once VIEWS . '/footer.php'; ?>