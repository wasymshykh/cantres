
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/DataTables/datatables.min.css"/>
 
 <script type="text/javascript" src="<?php echo URL; ?>/assets/DataTables/datatables.min.js"></script>

<!-- TABLE -->
<div class="resv-table">
    <table id="toTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Clinet NAME</th>
                <th>EMAIL</th>
                <th>FECHA RESERVA</th>
                <th>FECHA ENTRADA</th>
                <th>FECHA SALIDA</th>
                <th>APT</th>
                <th>PRECIO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($get_reservations as $reservation): ?>
            <tr class="shouldOpen">
                <td><?=$reservation['res_no']?></td>
                <td><?=$reservation['client_name']?></td>
                <td><?=$reservation['email']?></td>
                <td><?=$reservation['reserve_date']?></td>
                <td><?=$reservation['start_date']?></td>
                <td><?=$reservation['end_date']?></td>
                <td><?=$reservation['name']?></td>
                <td><?=$reservation['cost']?> Euro</td>
                <td>

                    <div class="openit">
                        <div class="openit-data">
                            <div class="openit-data-box">
                                <p>No de reserva: <?=$reservation['res_no']?></p>
                                <p>Numbre: <?=$reservation['client_name']?></p>
                                <p>Email: <?=$reservation['email']?></p>
                                <p>Como nos conocio: <?=$reservation['come_from']?></p>
                                <p>No of Personas: <?=$reservation['adults']?> Adultos</p>
                            </div>
                            <div class="openit-data-box">
                                <p>Fecha entrada: <?=dateForm($reservation['start_date'], 'd')?> de <?=dateForm($reservation['start_date'], 'F')?></p>
                                <p>Fecha salida: <?=dateForm($reservation['end_date'], 'd')?> de <?=dateForm($reservation['end_date'], 'F')?></p>
                                <p>Apartmento: <?=$reservation['name']?></p>
                                <p>Precio Total: <?=$reservation['cost']?> Euro</p>
                            </div>
                        </div>
                        <button class="clearit">CERRAR</button>
                    </div>

                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>


<script>
$(document).ready( function () {
    $('#toTable').DataTable({
        lengthChange: false
    });
});


document.querySelectorAll('.shouldOpen').forEach((sOp)=>{
    sOp.addEventListener('click',(e)=>{
    let toMod = e.target.parentElement.lastElementChild;
        if(toMod.classList.contains('active')){
            toMod.classList.remove('active');
        } else {
            toMod.classList.add('active');
        }
    });
})

document.querySelectorAll('.clearit').forEach((cit)=>{
    cit.addEventListener('click', (e)=>{
        let toMod = e.target.parentElement.parentElement;
        if(toMod.classList.contains('active')){
            toMod.classList.remove('active');
        } else {
            toMod.classList.add('active');
        }
    })
})



$(function () {
    var dateFormat = "mm/dd/yy",
        from_1 = $("#from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            to_1.datepicker("option", "minDate", getDate(this));
        }),
        to_1 = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            from_1.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }
});
</script>