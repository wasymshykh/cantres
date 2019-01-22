<form class="resv-checker" method="POST">
    <div class="resv-checker-box">
        <h3>Buscar Reserva :</h3>
        <div class="book-field">
            <input type="text" name="reserve_id" placeholder="Nº RESERVA">
        </div>
        <div class="book-field-submit">
            <input type="submit" name="reserve_check" value="go">
        </div>
    </div>
</form>

<!-- TABLE -->
<div class="resv-table">
    <table>
        <tr>
            <th>Nº RESERVA</th>
            <th>FECHA RESERVA</th>
            <th>FECHA ENTRADA</th>
            <th>FECHA SALIDA</th>
            <th>APT</th>
            <th>PRECIO</th>
        </tr>
        <?php foreach($get_reservations as $reservation): ?>
        <tr>
            <td><?=$reservation['res_no']?></td>
            <td><?=$reservation['reserve_date']?></td>
            <td><?=$reservation['start_date']?></td>
            <td><?=$reservation['end_date']?></td>
            <td><?=$reservation['name']?></td>
            <td><?=$reservation['cost']?> Euro</td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>


<script>
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