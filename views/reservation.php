<?php require_once VIEWS . '/header.php'; ?>
<?php 
 $date = new DateTime();
 ?>
<main>
    <div class="whrapper">
        <nav>
            <ul class="category">
                <li class="category_item"><a href="/reservation/category/stomatolog">Стоматолог</a></li>
                <li class="category_item"><a href="/reservation/category/nevrolog">Невролог</a></li>
                <li class="category_item"><a href="/reservation/category/terapevt">Терапевт</a></li>
                <li class="category_item"><a href="/reservation/category/okulist">Окулист</a></li>
                <li class="category_item"><a href="/reservation/category/hirurg">Хирург</a></li>
            </ul>
        </nav>
        <h3>Врачи:</h3>
        <?php for ($h = 0; $h < 4; $h++):?>
            <?php for ($i = 0; $i < 2; $i++):?>
                    <?php $date->setTime(9 + 1 * $h, 30 * $i);?>
                        <a href="">
                          <?php if ($date->format("h:i") !== "10:00") :?> 
                            <a style="color:blue" href=""><?=$date->format("h:i");?></a><br>
                            <?php else:?>
                            <a style="color:#ddd; pointer-events: none; cursor: default" href=""><?=$date->format("h:i");?></a><br>
                            <?php endif;?>
            <?php endfor;?>
        <?php endfor;?>
       
       
      
        <?php if (ReservationController::$category == "stomatolog"):?>
        
<ul class="list">
    <li>stoma1</li>
    <li>stoma2</li>
    <li>stoma3</li>
    <li>stoma4</li>
    <li>stoma5</li>
    <li>stoma6</li>
    <li>stoma7</li>
</ul>
<?php elseif (ReservationController::$category == "nevrolog"):?>
<ul class="list">
    <li>nevr1</li>
    <li>nevr2</li>
    <li>nevr3</li>
    <li>nevr4</li>
</ul>
<?php elseif (ReservationController::$category == "terapevt"):?>
<ul class="list">
    <li>terap1</li>
    <li>terap2</li>
    <li>terap3</li>
</ul>
        <?php elseif (ReservationController::$category == "okulist"):?>
<ul class="list">
    <li>okulist1</li>
    <li>okulist2</li>
    <li>okulist3</li>
</ul>
        <?php elseif (ReservationController::$category == "hirurg"):?>
<ul class="list">
    <li>hirurg1</li>
    <li>hirurg2</li>
    <li>hirurg3</li>
    <li>hirurg4</li>
</ul>
<?php endif;?>
        <?php if (ReservationController::$category !== null):?>
        <label for="start">Выбрать дату:</label><br>
<input type="date" 
         id="start"
       name="trip-start"
       value="<?=date("Y-m-d")?>"
       min="<?=date("Y-m-d")?>" 
       max="<?=date("Y-m-d", time() + 30 * 24 * 60 * 60);?>">
<?php endif;?>
<?php 

?>
    </div>
    
</main>

 <?php require_once VIEWS . '/footer.php'; ?>