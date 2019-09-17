<?php require_once VIEWS . '/header.php'; ?>
<main>
    <div class="whrapper">
        <?php $like_red = false;?>
        <?php foreach ($this->news as $col):?>
        <div class="news-card">
            <div class="news-card_img"><img src="<?=$col['img_path']?>" alt="img"></div>
            <div class="news-card_description">
                <h2 class="subject"><?=$col['subject']?></h2>
                <div class="icon_block">
                    <div class="date"><?=$col['date']?></div>
                    <?php 
                         if(!empty($_SESSION[session_id()])){
                            foreach ($this->likes as $field){
                            if($col['id'] == $field['news_id']){
                            $like_red = true;
                            break;
                            }
                        }
                        
                    }?>
                    <?php if($like_red): ?>
                    <div class="like" style="background: url(../img/icons/like.svg)"><?=$col['id']?></div>
                    <?php else :?>
                    <div class="like" style="background: url(../img/icons/like_gray.svg)"><?=$col['id']?></div>
                    
                   
                    <?php endif; ?>
                    
                    <?php if($like_red): ?>
                    <div class="number_of_like" style="color: #D75A4A"><?=$col['love']?></div>
                    <?php else :?>
                    <div class="number_of_like" style="color: #333"><?=$col['love']?></div>
                    <?php endif; ?>
                    <?php $like_red = false;?>
                    <div class="views" ></div>
                    <div class="number_of_views"><?=$col['views']?></div>
                </div>
                <p class="text"><?=$col['text']?></p>
                <div class="btn"><a href="http://blog.loc/news/<?=$col['id']?>">Читать далее...</a></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once VIEWS . '/footer.php'; ?>