<div class="resv-step">
    <a href="reserves.php" class="resv-step-cross">
        <div class="r-step-c-l"></div>
        <div class="r-step-c-r"></div>
    </a>

    <form action="" method="POST">
    <?php if($step1): ?>
    <div class="resv-step-form">
        <div class="book-a-form-fields">
            <div class="book-field dateField">
                <input type="text" id="from" placeholder="Entrada" name="from">
            </div>

            <div class="book-field dateField">
                <input type="text" id="to" placeholder="Salida" name="to">
            </div>

            <div class="book-field selectField">
                <select name="persons">
                    <option value="" selected>Nº PERSONAS</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>

            <div class="book-field selectField">
                <select name="childerns">
                    <option value="" selected>Nº NIÑOS (MIN 14 AÑOS)</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
        </div>

        <div class="book-a-form-submit">
            <input type="submit" value="Buscar Apartamento" name="step_1">
        </div>
    </div>
    <?php endif; // it was step one ?>

    <?php if($step2): ?>
    <div class="resv-step-2">
        <div class="resv-step-top">
            <h4>Hay 4 Apartemntos Libres para esas fechas</h4>
            <p>Apartamentos disponibles desde el 14 de Junio al 21 de Junio de 2019</p>
        </div>
        <div class="resv-step-price">
            <div class="resv-s-p-row">
                <input type="radio" name="select_apt" id="apartment_1" value="1">
                <label for="apartment_1">
                    <div class="resv-s-p-box">
                        <div class="resv-s-p-box-name">Can Mar 1</div>
                        <div class="resv-s-p-box-price">435 Euros</div>
                    </div>
                </label>
            </div>

            <div class="resv-s-p-row">
                <input type="radio" name="select_apt" id="apartment_2" value="2">
                <label for="apartment_2">
                    <div class="resv-s-p-box">
                        <div class="resv-s-p-box-name">Can Mar 2</div>
                        <div class="resv-s-p-box-price">297 Euros</div>
                    </div>
                </label>
            </div>

            <div class="resv-s-p-row">
                <input type="radio" name="select_apt" id="apartment_3" value="3">
                <label for="apartment_3">
                    <div class="resv-s-p-box">
                        <div class="resv-s-p-box-name">Can Terra 1</div>
                        <div class="resv-s-p-box-price">313 Euros</div>
                    </div>
                </label>
            </div>
        </div>
        <div class="resv-s-p-btn">
            <a href="#">Volver Atras</a>

            <div class="book-a-form-submit">
                <input type="submit" value="Reservar" name="step_2">
            </div>
        </div>
    </div>
    <?php endif; // it was step two ?>

    <?php if($step3): ?>
    <div class="resv-step-2">
        <div class="resv-step-c-top">
            <h4>Resumen de la reserva</h4>
            <p><span>Fecha Entrada :</span>13 de Junio</p>
            <p><span>Fechas Salida :</span>21 de Junio</p>
            <p><span>Apartamento :</span>13 de Junio</p>
            <p><span>Precio Total :</span>297 Euros</p>
            <p><span>Nº Personas :</span>2 Adultos</p>
        </div>
        <div class="resv-step-c-form">

            <div class="m-d-fields">
                <div class="book-field">
                    <input type="text" placeholder="Nombre">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="Telefono">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="Apellido">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="Pais">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="Email">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="COMO NOS CONOCIO">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="FORMA DE PAGO">
                </div>

                <div class="book-field">
                    <input type="text" placeholder="Notas">
                </div>
            </div>

        </div>
        <div class="resv-s-p-btn">
            <a href="#">Volver Atras</a>

            <div class="book-a-form-submit">
                <input type="submit" value="Reservar" name="step_3">
            </div>
        </div>
    </div>
    <?php endif; // it was step three ?>

    <?php if($step4): ?>
        <div class="resv-step-2">
            <div class="resv-step-c-top">
                <h1>Reserva Realizada Con Exito!</h1>
                <p><span>Nº de reserva:</span>324545</p>
                <p><span>Nombre :</span>Alvaro</p>
                <p><span>Email :</span>alvaro@alvaro.es</p>
                <p><span>Como nos conoció :</span>Instagram</p>
                <p><span>Nº Personas :</span>2 Adultos</p>

                <br>
                <br>

                <p><span>Fecha Entrada :</span>13 de Junio</p>
                <p><span>Fechas Salida :</span>21 de Junio</p>
                <p><span>Apartamento :</span>13 de Junio</p>
                <p><span>Precio Total :</span>297 Euros</p>
                <p><span>Nº Personas :</span>2 Adultos</p>
            </div>
            <div class="resv-s-p-c-btn">
                <a href="#">Volver a reservas</a>
            </div>
        </div>
    <?php endif; ?>

    </form>

    
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

</div>