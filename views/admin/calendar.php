<div class="month-title">
    <h2><?=$monthname?></h2>
</div>

<div class="month-select">
    <a href="calendar.php?page=<?=$pageNo+1?>">Mes Anterior</a>
    <a href="calendar.php?page=<?=$pageNo-1?>">Mes Siguiente</a>
</div>

<div class="month-table">
    <table>
        <!-- TOP -->
        <tr>
            <td></td>
            <th colspan="<?=$totalDays?>"><?=$monthname?></th>
        </tr>
        <!-- DAY COUNT -->
        <tr>
            <td></td>
            <?php for($i = 1; $i <= $totalDays; $i++): ?>
            <td><?=$i?></td>
            <?php endfor;?>
        </tr>
        <!-- DAY NAME -->
        <tr>
            <th>Apartmento</th>
            <?php for($i = 1; $i <= $totalDays; $i++): ?>
            <td><?=(new DateTime($currentMonth['month']."/$i/".$currentMonth['year']))->format('D')?></td>
            <?php endfor;?>
        </tr>
        <!-- Apartment Data -->
        <?php foreach ($apartments as $apartment): ?>
            <tr>
                <td><?=$apartment['name']?></td>
                <?php for($i = 1; $i <= $totalDays; $i++): ?>
                    <?php 
                        $isReserved = isCalendarReserved(
                            (new DateTime($currentMonth['month']."/$i/".$currentMonth['year']))->format('Y-m-d H:i:s'),
                            (new DateTime($currentMonth['month']."/$i/".$currentMonth['year']))->format('Y-m-d H:i:s'),
                            $apartment['id'], 
                            $db);
                    ?>
                    <td class="<?=(!$isReserved)?'isGreen':'isRed'?>">
                        <?=(!$isReserved)?'Lib':'<a href=calendar.php?page='.$pageNo.'&res_no='.$isReserved['res_no'].'&day='.$i.'>RES</a>'?>
                    </td>
                <?php endfor;?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<?php if(isset($res_data) && !empty($res_data)): ?>

<div class="bookingDetails">
    <div class="bookDetails-top">
        <div class="bookDetails-title">
            <h3><?=$day?> de <?=$monthname?></h3>
        </div>
        <div class="bookDetails-link">
            <a href="calendar.php?page=<?=$pageNo?>">limpiar selección</a>
        </div>
    </div>

    <div class="bookDetails-data">
        <p><span>Fecha :</span><?=(new DateTime($currentMonth['month']."/$day/".$currentMonth['year']))->format('l')?> <?=$day?> de <?=$monthname?></p>
        <p><span>Reserva :</span><?=$res_data['res_no']?></p>
        <p><span>Nombre :</span><?=$res_data['person_name']?> <?=$res_data['surname']?></p>
        <p><span>Apartamento :</span><?=$res_data['apt_name']?></p>
        <p><span>Fechas Reservas :</span><?=(new DateTime($res_data['start_date']))->format('d F')?> - <?=(new DateTime($res_data['end_date']))->format('d F')?></p>
        <p><span>Gasto :</span><?=$res_data['cost']?> Euros</p>
        <p><span>Notas Cliente :</span><?=$res_data['note']?></p>
    </div>
</div>

<?php endif; ?>