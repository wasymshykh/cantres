<div class="main-confirm">

    <div class="main-confirm-row">
        <div class="main-confirm-title c-title-m">
            <p>Muchas Gracias <?=$person_name?> por tu reserva en Can Tres Formentera. Tu numero de reserva es :
                <span><?=$reserve_id?></span> . A continuación le hacemos un
                resumen de su reserva:</p>
            <h1>Confirmacion de reserva</h1>
        </div>

        <div class="main-date-confirm">
            <div class="main-date-box">
                <h5>Llegada:</h5>
                <h1><?=dateForm($from, 'd')?> de <?=dateForm($from, 'F')?></h1>
            </div>
            <div class="main-date-box">
                <h5>Salida:</h5>
                <h1><?=dateForm($to, 'd')?> de <?=dateForm($to, 'F')?></h1>
            </div>
        </div>

        <div class="main-info-confirm">
            <div class="main-info-box">
                <div class="main-c-info">
                    <h5>Apartamento: <span><?=$apt['name']?></span></h5>
                    <h5>Nº de Personas: <span><?=$adults?></span></h5>
                </div>
            </div>
            <div class="main-info-box">
                <div class="main-c-info">
                    <h5>Nombre: <span><?=$person_name . ' ' . $surname?></span></h5>
                    <h5>Email: <span><?=$email?></span></h5>
                    <h5>Telefono: <span><?=$phone?></span></h5>
                </div>
            </div>
        </div>


        <div class="payment-table">
            <div class="payment-table-row">
                <div class="payment-t-type">
                    Apartamento Can Terra
                </div>
                <div class="payment-t-date">
                    <?=$from?> - <?=$to?> - <?=$adults?> adultos
                </div>
                <div class="payment-t-pay">
                    <?=$cost?> euros
                </div>
            </div>
            <div class="payment-table-row">
                <div class="payment-t-type">
                    Impuestos
                </div>
                <div class="payment-t-date">
                    10%
                </div>
                <div class="payment-t-pay">
                    <?=$tax?> euros
                </div>
            </div>
            <div class="payment-table-row">
                <div class="payment-t-type">
                    Total
                </div>
                <div class="payment-t-pay">
                    <?=$totalCost?> euros
                </div>
            </div>
        </div>

        <div class="main-c-cancel">
            <h5>Cancelaciones de reservas:</h5>
            <ul>
                <li>Cancelaciones realizadas al menos 30 días antes de la fecha del inicio de la
                    estancia: se les reembolsará el importe íntegro de la reserva.</li>
                <li>Cancelaciones realizadas entre 30 y 14 días antes de la fecha del inicio de la
                    estancia: se les reembolsará el 70% del importe total.</li>
                <li>Cancelaciones realizadas fuera de los anteriores plazos: no tendrán derecho de
                    reembolso.</li>
            </ul>
            <h5>Otra información de interés</h5>
            <p>El precio no incluye la tasa turística que deberá ser abonada a la llegada al
                establecimiento (2,20 euros persona/noche).
                A fin de tener todo a punto durante tu estancia, infórmanos de la hora estimada de
                llegada.<br>

                Hora de check in: 15.00/ Hora check out: 12.00<br>

                Al realizar el registro de entrada, los huéspedes deberán mostrar un documento de
                identidad válido (DNI/Pasaporte) y una tarjeta de crédito.<br>
                Asimismo, será necesario abonar un depósito de 150 euros para cubrir eventuales
                desperfectos producidos en los apartamentos.<br>
                El depósito será devuelto íntegramente en la fecha de salida una vez revisado el
                apartamento.</p>
        </div>

    </div>


    <div class="main-confirm-row">
        <div class="main-confirm-title">
            <h1>DONDE ESTAMOS</h1>
        </div>

        <div class="main-confirm-map">
            <div class="main-c-m-address">
                <p>Cami Can Simonet S/N<br>Formentera</p>
                <p>Telefono: +34 660 688 869<br>Email: info@cantresformentera.com</p>
                <p>700m - Sant Ferran de Ses Roques<br>
                    1,2 km - Sant Francesc<br>
                    9 km - Puerto de la Savina</p>
                <p>Ver Ubicación</p>
            </div>
            <div class="main-c-map">
                <img src="../img/slide_aire_1.jpg">
            </div>
        </div>
    </div>

    <div class="main-confirm-row">
        <div class="main-confirm-title">
            <h1>INFORMACION SOBRE FORMENTERA</h1>
        </div>

        <div class="main-confirm-features">
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-1.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>Ferry<br>IBIZA-Formentera</h3>
                    <p>El traslado desde Ibiza siempre es en Ferry
                        Tienes muchas compañías. Si haces click
                        en este enlace puedes comprar los billetes con
                        un 15% de descuento al introducir
                        el código : CANTRES</p>
                </div>
            </div>
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-2a.png">
                    </div>
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-2b.png">
                    </div>
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-2c.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>Alquiler</h3>
                    <p>Puedes alquilar coche, moto o bici y recibirla
                        en Can Tres o bien recogerla en el puerto
                        de la Savina. Si haces click en este enlace
                        puedes hacer tu reserva con un 10% de descuento
                        con el código CAN TRES</p>
                </div>
            </div>
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-3.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>Taxi</h3>
                    <p>Formentera es una isla con muy pocos taxis
                        sin embargo puedes pedir un taxi llamando
                        al teléfono : +34 971 322 342</p>
                </div>
            </div>
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-4.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>Restaurantes</h3>
                    <p>A través de nuestra guía en la web
                        aparecen todas nuestras recomendaciones sobre
                        los diferentes restaurantes al rededor
                        de la isla.<br>
                        Click aquí para ver nuestra guia</p>
                </div>
            </div>
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-5.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>ALQUILER BARCO</h3>
                    <p>Formentera es una isla y se puede ver
                        desde la tierra o desde el mar.
                        Te recomendamos alquilar barco
                        llamando al telefono : +34617586141
                        o bien enviando un email
                        ibizacantierirent@gmail.com
                        Con el código Can Tres tiene un 10%
                        de descuento.</p>
                </div>
            </div>
            <div class="main-c-f-box">
                <div class="main-c-f-imgs">
                    <div class="main-c-f-img">
                        <img src="<?php echo URL; ?>/assets/img/info-icon-6.png">
                    </div>
                </div>
                <div class="main-c-f-text">
                    <h3>Playas</h3>
                    <p>A través de nuestra guía en la web
                        aparecen todas nuestras recomendaciones sobre
                        los diferentes playas al rededor
                        de la isla.<br>
                        Click aquí para ver nuestra guia</p>
                </div>
            </div>
        </div>
    </div>

</div>