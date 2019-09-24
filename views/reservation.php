<?php require_once VIEWS . '/header.php'; ?>
<?php 
 $date = new DateTime();
  $date->setDate(2019, 9, 15);
 $date->setTime(12, 30);
 $queue = new \lib\Queue();
 ?>
<main>
    <div class="whrapper" id="block">
        <nav>
            <ul class="category">
                <li class="category_item stomatolog"><a href="/reservation/category/stomatolog">Стоматолог</a></li>
                <li class="category_item nevrolog"><a href="/reservation/category/nevrolog">Невролог</a></li>
                <li class="category_item terapevt"><a href="/reservation/category/terapevt">Терапевт</a></li>
                <li class="category_item okulist"><a href="/reservation/category/okulist">Окулист</a></li>
                <li class="category_item hirurg"><a href="/reservation/category/hirurg">Хирург</a></li>
            </ul>
        </nav>
        <?php if (self::$category !== null):?>
        <div class="date_select">
            <label for="start">Выбрать дату:</label>
            <input type="date" 
                 id="start"
               name="trip-start"
              value="<?=date("Y-m-d")?>"
                min="<?=date("Y-m-d")?>" 
                max="<?=date("Y-m-d", time() + 30 * 24 * 60 * 60);?>">
        </div>
        <?php endif;?>
        <div class="times"><p class="time"></p></div>
    </div>
    <div class="hidden_popUp">
       <h2>Подтверждение записи:</h2>
        <p>Вы действительно желаете записаться на <span id="date_span"></span> в <span id="time_span"></span>?</p>
        <form class="buttons" action="">
        <button id="no">Нет</button>
        <button id="yes">Да</button>
        </form>
        
    </div>
    <div class="hidden_double_popUp">
       <div id="close">
       </div>
       <p>Вы уже записаны к этому специалисту, отмените ранее сделанную запись или выберите другого специалиста</p>
    </div>
    
</main>

 <?php require_once VIEWS . '/footer.php'; ?>

 