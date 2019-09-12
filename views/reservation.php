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
                <li class="category_item"><a href="/reservation/category/stomatolog">Стоматолог</a></li>
                <li class="category_item"><a href="/reservation/category/nevrolog">Невролог</a></li>
                <li class="category_item"><a href="/reservation/category/terapevt">Терапевт</a></li>
                <li class="category_item"><a href="/reservation/category/okulist">Окулист</a></li>
                <li class="category_item"><a href="/reservation/category/hirurg">Хирург</a></li>
            </ul>
        </nav>
        
        <?php if (ReservationController::$category !== null):?>
        <label for="start">Выбрать дату:</label>
<input type="date" 
         id="start"
       name="trip-start"
       value="<?=date("Y-m-d")?>"
       min="<?=date("Y-m-d")?>" 
       max="<?=date("Y-m-d", time() + 30 * 24 * 60 * 60);?>">
<?php endif;?>
    <div class="times"></div>
    </div>
    <div class="hidden_popUp">
       <h2>Подтверждение записи:</h2>
        <p>Вы действительно желаете записаться на число и время?</p>
        <form class="buttons" action="reservation">
        <button id="no" name="btn" value="no">Нет</button>
        <button id="yes" name="btn" value="yes">Да</button>
        </form>
        
    </div>
    
</main>

 <?php require_once VIEWS . '/footer.php'; ?>

 <?php for ($h = 0; $h < 4; $h++):?>
            <?php for ($i = 0; $i < 2; $i++):?>
                    <?php $date->setTime(9 + 1 * $h, 30 * $i);?>
                        <a href="">
                          <?php if ($queue->timeAvailable($date->format("Y-m-d"), $date->format("h:i:s"))) :?> 
                            <a style="color:blue" href=""><?=$date->format("h:i");?></a><br>
                            <?php else:?>
                            <a style="color:#ddd; pointer-events: none; cursor: default" href=""><?=$date->format("h:i");?></a><br>
                            <?php endif;?>
            <?php endfor;?>
        <?php endfor;?>