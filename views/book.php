
<!-- Book Content -->
<div class="main-book">
    <div class="book-top">
        <h1>Busca Un Apartamento</h1>
        <p>Para reservas de mas de 8 personas enviar un email a info@cantresformentera.com</p>
    </div>



<?php if(!empty($errors)): ?>
    <div class="apt-alert apt-errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?=$error?>.</li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif; ?>

    <div class="book-a-form">
        <form action="" method="POST">
            <div class="book-a-form-fields">
                <div class="book-field dateField">
                    <input type="text" id="from" name="from" placeholder="Entrada" value="<?=isset($from)?$from:''?>">
                </div>

                <div class="book-field dateField">
                    <input type="text" id="to" name="to" placeholder="Salida" value="<?=isset($to)?$to:''?>">
                </div>

                <div class="book-field selectField">
                    <select name="adults">
                        <option value="">Nº PERSONAS</option>
                        <?php for($i = 0; $i <= 8; $i++): ?>
                        <option value="<?=$i?>" <?=(isset($adults) && $adults==$i)?'selected':''?>><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="book-field selectField">
                    <select name="children">
                        <option value="">Nº NIÑOS (MIN 14 AÑOS)</option>
                        <?php for($i = 0; $i <= 8; $i++): ?>
                            <option value="<?=$i?>" <?=(isset($children) && $children==$i)?'selected':''?>><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="book-field">
                    <input type="text" name="email" placeholder="Email" value="<?=isset($email)?$email:''?>">
                </div>

                <div class="book-field selectField">
                    <select name="come_from">
                        <option value="" selected>COMO NOS CONOCIO</option>
                        <?php $comos = cameFromList($db); 
                        foreach ($comos as $como): ?>
                        <option value="<?=$como?>"><?=$como?></option>
                        <?php endforeach ?>
                    </select>
                </div>

            </div>
            <div class="book-a-form-submit">
                <input type="submit" name="check_result" value="Ver Resultados">
            </div>
        </form>
    </div>
</div>


<script>
    $(function () {
        var dateFormat = "mm/dd/yy",
            from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
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