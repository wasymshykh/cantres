<div class="resv-checker">
    <div class="resv-checker-box">
        <h3>Buscar Reserva :</h3>
        <div class="book-field">
            <input type="text" placeholder="Nº RESERVA">
        </div>
        <div class="book-field-submit">
            <input type="submit" value="go">
        </div>
    </div>
</div>

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
        <tr>
            <td>100001</td>
            <td>12 June 2019</td>
            <td>14 June 2019</td>
            <td>18 June 2019</td>
            <td>ConTon</td>
            <td>500 Euro</td>
        </tr>
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