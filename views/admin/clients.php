<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/DataTables/datatables.min.css"/>
<script type="text/javascript" src="<?php echo URL; ?>/assets/DataTables/datatables2.min.js"></script>


<div class="resv-table">
    <table id="toTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha Reserva</th>
                <th>Gasto</th>
                <th>Como nos Conocio</th>
                <th>Email</th>
                <th>Telefono</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($clients as $client): ?>
            <tr>
                <td><?=$client['name']?></td>
                <td><?=!empty($client['reserve_date'])?$client['reserve_date']:'<i>null</i>'?></td>
                <td><?=!empty($client['cost'])?$client['cost'] . ' Euro':'<i>null</i>'?></td>
                <td><?=$client['come_from']?></td>
                <td><?=$client['email']?></td>
                <td><?=$client['phone']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
$(document).ready( function () {
    $('#toTable').DataTable({
        lengthChange: false,
    });
});

</script>