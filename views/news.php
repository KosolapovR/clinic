<?php require_once VIEWS . '/header.php'; ?>
<main>
    <div class="whrapper">
        <?php foreach ($this->news as $col):?>
        <div class="news-card">
            <div class="news-card_img"></div>
            <div class="news-card_description">
                <h2 class="subject"><?=$col['subject']?></h2>
                <div class="icon_block">
                    <div class="date"><?=$col['date']?></div>
                    <div class="like"></div>
                    <div class="number_of_like"><?=$col['love']?></div>
                </div>
                <p class="text"><?=$col['text']?></p>
                <div class="btn">Кнопка</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once VIEWS . '/footer.php'; ?>