<div class="resv-step">
    <a href="reserves.php" class="resv-step-cross">
        <div class="r-step-c-l"></div>
        <div class="r-step-c-r"></div>
    </a>


<?php if(isset($success)): ?>
    <div class="apt-alert apt-success">
        <p><?=$success?></p>
    </div>
<?php endif; ?>

<?php if(!empty($errors)): ?>
    <div class="apt-alert apt-errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?=$error?>.</li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif; ?>

    <form action="" method="POST">
    <?php if($step1): ?>
    <div class="resv-step-form">
        <div class="book-a-form-fields">
            <div class="book-field dateField">
                <input type="text" id="from" placeholder="Entrada" name="from" value="<?=isset($_POST['from'])?dateUser($_POST['from']):''?>">
            </div>

            <div class="book-field dateField">
                <input type="text" id="to" placeholder="Salida" name="to" value="<?=isset($_POST['to'])?dateUser($_POST['to']):''?>">
            </div>

            <div class="book-field selectField">
                <select name="adults">
                    <option value="" selected>Nº PERSONAS</option>
                    <?php for($i = 0; $i <= 8; $i++): ?>
                        <option value="<?=$i?>" <?=(isset($adults) && $adults==$i)?'selected':''?>><?=$i?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="book-field selectField">
                <select name="children">
                    <option value="" selected>Nº NIÑOS (MIN 14 AÑOS)</option>
                    <?php for($i = 0; $i <= 8; $i++): ?>
                        <option value="<?=$i?>" <?=(isset($children) && $children==$i)?'selected':''?>><?=$i?></option>
                    <?php endfor; ?>
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
            <h4>Hay <?=count($apt_available)?> Apartemntos Libres para esas fechas</h4>
            <p>Apartamentos disponibles desde el <?=dateForm($from, 'd')?> de <?=dateForm($from, 'F')?> de <?=dateForm($from, 'Y')?> 
            al <?=dateForm($to, 'd')?> de <?=dateForm($to, 'F')?> de <?=dateForm($to, 'Y')?></p>
        </div>
        <div class="resv-step-price">
            <?php foreach($apt_available as $apt): ?>
            <div class="resv-s-p-row">
                <input type="radio" name="select_apt" id="apartment_<?=$apt['id']?>" value="<?=$apt['id']?>">
                <label for="apartment_<?=$apt['id']?>">
                    <div class="resv-s-p-box">
                        <div class="resv-s-p-box-name"><?=$apt['name']?></div>
                        <div class="resv-s-p-box-price"><?=getApartmentPrice($from, $to, $apt, $adults+$children)?> Euros</div>
                    </div>
                </label>
            </div>
            <?php endforeach; ?>
        </div>

        <input type="hidden" name="from" value="<?=$from?>">
        <input type="hidden" name="to" value="<?=$to?>">
        <input type="hidden" name="adults" value="<?=$adults?>">
        <input type="hidden" name="children" value="<?=$children?>">

        <div class="resv-s-p-btn">
            <div class="book-a-back-submit">
                <input type="submit" value="Volver Atras" name="step_0">
            </div>

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
            <p><span>Fecha Entrada :</span><?=dateForm($from, 'd')?> de <?=dateForm($from, 'F')?> de <?=dateForm($from, 'Y')?></p>
            <p><span>Fechas Salida :</span><?=dateForm($to, 'd')?> de <?=dateForm($to, 'F')?> de <?=dateForm($to, 'Y')?></p>
            <p><span>Apartamento :</span><?=$apt['name']?></p>
            <p><span>Precio Total :</span><?=$price?> Euros</p>
            <p><span>Nº Personas :</span><?=$adults?> Adultos</p>
        </div>
        <div class="resv-step-c-form">

            <div class="m-d-fields">
                <div class="book-field">
                    <input type="text" name="person_name" placeholder="Nombre" value="<?=isset($_POST['person_name'])?$_POST['person_name']:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="phone" placeholder="Telefono" value="<?=isset($_POST['phone'])?$_POST['phone']:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="surname" placeholder="Apellido" value="<?=isset($_POST['surname'])?$_POST['surname']:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="region" placeholder="Pais" value="<?=isset($_POST['region'])?$_POST['region']:''?>">
                </div>

                <div class="book-field">
                    <input type="email" name="email" placeholder="Email" value="<?=isset($_POST['email'])?$_POST['email']:''?>">
                </div>

                <div class="book-field">
                    <select name="come_from">
                        <option value="">COMO NOS CONOCIO</option>
                        <?php $comos = cameFromList($db); 
                            foreach ($comos as $como): ?>
                            <option value="<?=$como?>"><?=$como?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="book-field">
                    <select name="payment_via" id="payvia">
                        <option value="">FORMA DE PAGO</option>
                        <?php $pays = paymentTypeList($db); 
                            foreach ($pays as $pay): ?>
                            <option value="<?=$pay?>"><?=$pay?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="book-field">
                    <input type="text" name="note" placeholder="Notas" value="<?=isset($_POST['note'])?$_POST['note']:''?>">
                </div>
            </div>
        </div>

        <input type="hidden" name="from" value="<?=$from?>">
        <input type="hidden" name="to" value="<?=$to?>">
        <input type="hidden" name="adults" value="<?=$adults?>">
        <input type="hidden" name="children" value="<?=$children?>">
        <input type="hidden" name="select_apt" value="<?=$select_apt?>">
        <input type="hidden" name="price" value="<?=$price?>">
        <input type="hidden" name="apt_name" value="<?=$apt['name']?>">

        <div class="resv-s-p-btn">
            <div class="book-a-back-submit">
                <input type="submit" value="Volver Atras" name="step_1">
            </div>

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
                <p><span>Nº de reserva:</span><?=$reserve_id?></p>
                <p><span>Nombre :</span><?=$person_name?></p>
                <p><span>Email :</span><?=$email?></p>
                <p><span>Como nos conoció :</span><?=$come_from?></p>
                <p><span>Nº Personas :</span><?=$adults?> Adultos</p>

                <br>
                <br>

                <p><span>Fecha Entrada :</span><?=dateForm($from, 'd')?> de <?=dateForm($from, 'F')?> de <?=dateForm($from, 'Y')?></p>
                <p><span>Fechas Salida :</span><?=dateForm($to, 'd')?> de <?=dateForm($to, 'F')?> de <?=dateForm($to, 'Y')?></p>
                <p><span>Apartamento :</span><?=$apt_name?></p>
                <p><span>Precio Total :</span><?=$price?> Euros</p>
                <p><span>Nº Personas :</span><?=$adults?> Adultos</p>
            </div>
            <div class="resv-s-p-c-btn">
                <a href="reserves.php">Volver a reservas</a>
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