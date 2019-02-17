<?php 

$subject = "CanTres - Confirmation Email";

$from_name = "CanTres";
$from_email = "info@cantres.com";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$headers[] = "To: $$person_name <$email>";
$headers[] = "From: $from_name <$from_email>";

$message = "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html charset=UTF-8\" />
    <link href=\"https://fonts.googleapis.com/css?family=Oswald:200,400,700\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Yrsa:300,400,500,600,700\" rel=\"stylesheet\">
</head>
<body style=\"font-family:'Yrsa', serif;\">
    
    <div style=\"width:100%; min-width: 500px;background-color: #f3f3f3;padding-bottom: 15px;\">
        <div style=\"width:100%;display:block;text-align:center;background-color:white;padding:15px 0;\">
            <img src=\"http://www.cantresformentera.com/wp-content/themes/can-tres/img/logo.svg\" style=\"width:160px;display:block;margin:0 auto;\">
        </div>
        <div style=\"width:100%;display:block;\">
            <img src=\"".URL."/assets/uploads/".$apt_img['img_name']."\" style=\"width:100%;height: auto;\">
        </div>

        <div style=\"width: 94%;margin: 15px auto 0 auto;background-color: #fff;padding:15px 0;\">
            <p style=\"font-size:14px;padding: 0 15px; text-align:center;\">Muchas Gracias $person_name por tu reserva en Can Tres Formentera. Tu numero de reserva es :
                    <span>$reserve_id</span> . A continuacion le hacemos un
                    resumen de su reserva:</p>
            <h1 style=\"font-size:20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color: black;text-align:center;text-transform:uppercase;\">Confirmacion de reserva</h1>

            <div style=\"width: 100%;max-width:500px;margin: 20px auto;display:table;\">
                <div style=\"width: 48%;float: left; display: block; border-right: 1px solid #e0e0e0;\">
                    <p style=\"margin: 5px 0;font-size: 14px;font-weight:700;color: #777;text-align:center;\">Llegada:</p>
                    <h1 style=\"margin: 10px 0 15px 0;font-size:20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color: black;text-align:center;\">
                        ".dateForm($from, 'd')." de ".dateForm($from, 'F')."
                    </h1>
                </div>
                <div style=\"width: 48%;float: right; display: block;\">
                    <p style=\"margin: 5px 0;font-size: 14px;font-weight:700;color: #777;text-align:center;\">Salida:</p>
                    <h1 style=\"margin: 10px 0 15px 0;font-size:20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color: black;text-align:center;\">
                        ".dateForm($to, 'd')." de ".dateForm($to, 'F')."
                    </h1>
                </div>
            </div>

            <div style=\"width: 100%;max-width:500px;margin: 10px auto;display:table;\">
                <div style=\"width: 48%;float: left; display: block; border-right: 1px solid #e0e0e0;\">
                    <div style=\"display: table; width: 100%;\">
                        <p style=\"font-size: 12px;font-weight:700;color: #777;text-align:center;display:inline-block\">Apartamento:</p>
                        <h1 style=\"margin: 0 5px;font-size:18px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 2px;color:black;text-align:center;display:inline-block;text-transform:uppercase;\">
                            ".$apt['name']."
                        </h1>
                    </div>
                    <div style=\"display: table; width: 100%;\">
                        <p style=\"margin: 0; font-size: 12px;font-weight:700;color: #777;text-align:center;display:inline-block\">No de Personas:</p>
                        <h1 style=\"margin: 0 5px;font-size:18px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 2px;color:black;text-align:center;display:inline-block;text-transform:uppercase;\">
                            $adults
                        </h1>
                    </div>
                </div>
                <div style=\"width: 48%;float: right; display: block;\">
                    <div style=\"display: table; width: 100%;\">
                        <p style=\"font-size: 12px;font-weight:700;color: #777;text-align:center;display:inline-block\">Numbre:</p>
                        <h1 style=\"margin: 0 5px;font-size:18px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color:black;text-align:center;display:inline-block;text-transform:uppercase;\">
                            $person_name $surname
                        </h1>
                    </div>
                    <div style=\"display: table; width: 100%;\">
                        <p style=\"margin: 0; font-size: 12px;font-weight:700;color: #777;text-align:center;display:inline-block\">Email:</p>
                        <h1 style=\"margin: 0 5px;font-size:18px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color:black;text-align:center;display:inline-block;text-transform:uppercase;\">
                            $email
                        </h1>
                    </div>
                    <div style=\"display: table; width: 100%;\">
                        <p style=\"font-size: 12px;font-weight:700;color: #777;text-align:center;display:inline-block\">Telefono:</p>
                        <h1 style=\"margin-left:5px;font-size:18px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color:black;text-align:center;display:inline-block;text-transform:uppercase;\">
                            $phone
                        </h1>
                    </div>
                </div>
            </div>

            <div style=\"display:table; width: 90%; margin: 15px auto;\">
                <div style=\"display:table;border:1px solid #e0e0e0;padding: 15px; width:100%;box-sizing:border-box\">
                    <div style=\"float:left;width: 50%;\">
                        <h3 style=\"font-family:serif;font-size:16px;color:#000;margin:0;line-height:20px;\">Apartamento Can Terra</h3>
                        <p style=\"font-size:12px;margin:0;\">$from - $to - $adults adultos</p>
                    </div>
                    <div style=\"float:right;font-size: 20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing:1px;color:#777\">
                        $cost euros
                    </div>
                </div>
                <div style=\"display:table;border:1px solid #e0e0e0;padding: 15px; width:100%;box-sizing:border-box\">
                    <div style=\"float:left;width: 50%;\">
                        <h3 style=\"font-family:serif;font-size:16px;color:#000;margin:0;line-height:30px;\">Impuestos&nbsp;10%</h3>
                    </div>
                    <div style=\"float:right;font-size: 20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing:1px;color:#777;line-height:30px\">
                        $tax euros
                    </div>
                </div>
                <div style=\"display:table;border:1px solid #e0e0e0;padding: 15px; width:100%;box-sizing:border-box;background-color:#e0e0e0\">
                    <div style=\"float:left;width: 50%;\">
                        <h3 style=\"font-family:serif;font-size:16px;color:#000;margin:0;line-height:30px;\">Total</h3>
                    </div>
                    <div style=\"float:right;font-size: 20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing:1px;color:black;line-height:30px\">
                        $totalCost euros
                    </div>
                </div>
            </div>

            <div style=\"width:90%; margin: 25px auto 15px auto; display:block;\">
                <p style=\"font-size: 12px;font-weight:700;color:black;margin:0;line-height:15px;\">Cancelaciones de reservas</p>
                <ul style=\"margin:0;padding: 0 15px 5px 15px;\">
                    <li style=\"font-size: 12px;font-weight:400;font-style:italic;color:black;margin:0;line-height:15px;\">
                        Cancelaciones realizadas al menos 30 dias antes de la fecha del inicio de la
                        estancia: se les reembolsara el importe integro de la reserva.
                    </li>
                    <li style=\"font-size: 12px;font-weight:400;font-style:italic;color:black;margin:0;line-height:15px;\">
                        Cancelaciones realizadas al menos 30 dias antes de la fecha del inicio de la
                        estancia: se les reembolsara el importe integro de la reserva.
                    </li>
                    <li style=\"font-size: 12px;font-weight:400;font-style:italic;color:black;margin:0;line-height:15px;\">
                        Cancelaciones realizadas al menos 30 dias antes de la fecha del inicio de la
                        estancia: se les reembolsara el importe integro de la reserva.
                    </li>
                </ul>
                <p style=\"font-size: 12px;font-weight:700;color:black;margin:0;line-height:15px;\">Otra informacion de interes</p>
                
                <p style=\"font-size: 12px;font-weight:400;font-style:italic;color:black;margin:0;line-height:15px;\">
                El precio no incluye la tasa turistica que debera ser abonada a la llegada al
                establecimiento (2,20 euros persona/noche).
                A fin de tener todo a punto durante tu estancia, informanos de la hora estimada de
                llegada.<br>

                Hora de check in: 15.00/ Hora check out: 12.00<br>

                Al realizar el registro de entrada, los huespedes deberan mostrar un documento de
                identidad valido (DNI/Pasaporte) y una tarjeta de credito.<br>
                Asimismo, sera necesario abonar un deposito de 150 euros para cubrir eventuales
                desperfectos producidos en los apartamentos.<br>
                El deposito sera devuelto integramente en la fecha de salida una vez revisado el
                apartamento.
                </p>
            </div>
        
        </div>

        <div style=\"width: 94%;margin: 15px auto 0 auto;background-color: #fff;padding:15px 0;\">
            <h1 style=\"font-size:20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color: black;text-align:center;text-transform:uppercase;margin: 15px 0 25px 0;\">
                DONDE ESTAMOS
            </h1>

            <div style=\"width: 94%;margin: 15px auto;display:table;\">
                <div style=\"width: 50%; margin-right: 2%;float: left;\">
                    <p style=\"font-family:serif;font-size:14px;font-weight:400;color:black;margin: 5px 0;line-height:18px;\">
                        Cami Can Simonet S/N
                        <br>Formentera
                    </p>
                    <p style=\"font-family:serif;font-size:14px;font-weight:400;color:black;margin: 15px 0;line-height:18px;\">
                        Telefono: +34 660 688 869
                        <br>Email: info@cantresformentera.com
                    </p>
                    <p style=\"font-family:serif;font-size:14px;font-weight:400;color:black;margin: 5px 0;line-height:18px;\">
                        700m - Sant Ferran de Ses Roques<br>
                        1,2 km - Sant Francesc<br>
                        9 km - Puerto de la Savina
                    </p>
                    <p style=\"font-family:serif;font-size:14px;font-weight:400;color:black;margin: 15px 0;line-height:18px;\">Ver Ubicacion</p>
                </div>
                <div style=\"width: 45%; float: left;\">
                    <img src=\"".URL."/assets/img/map_img.png\" style=\"width:100%;height: auto;display:block;\">
                </div>
            </div>
        </div>

        <div style=\"width: 94%;margin: 15px auto 0 auto;background-color: #fff;padding:15px 0;\">
            <h1 style=\"font-size:20px;font-family:'Oswald', sans-serif;font-weight:700;letter-spacing: 1px;color: black;text-align:center;text-transform:uppercase;margin: 15px 0 25px 0;\">
                INFORMACION SOBRE FORMENTERA
            </h1>

            <div style=\"width: 94%; margin: 15px auto; display:table;\">
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <img src=\"".URL."/assets/img/info-icon-1.png\" style=\"width:auto;height: 40px;display:block;margin:0 auto;\">
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        Ferry<br>IBIZA-Formentera
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        El traslado desde Ibiza siempre es en Ferry
                            Tienes muchas companias. Si haces click
                            en este enlace puedes comprar los billetes con
                            un 15% de descuento al introducir
                            el codigo : CANTRES
                    </p>
                </div>
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <div style=\"display:table; margin:0 auto;\">
                        <div style=\"display: inline-block\">
                            <img src=\"".URL."/assets/img/info-icon-2a.png\" style=\"width:auto;height: 40px;display:block;\">
                        </div>
                        <div style=\"display: inline-block\">
                            <img src=\"".URL."/assets/img/info-icon-2b.png\" style=\"margin:0 5px; width:auto;height: 40px;display:block;\">
                        </div>
                        <div style=\"display: inline-block\">
                            <img src=\"".URL."/assets/img/info-icon-2c.png\" style=\"width:auto;height: 40px;display:block;\">
                        </div>
                    </div>
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        Alquiler
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        Puedes alquilar coche, moto o bici y recibirla
                        en Can Tres o bien recogerla en el puerto
                        de la Savina. Si haces click en este enlace
                        puedes hacer tu reserva con un 10% de descuento
                        con el codigo CAN TRES
                    </p>
                </div>
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <img src=\"".URL."/assets/img/info-icon-3.png\" style=\"width:auto;height: 40px;display:block;margin:0 auto;\">
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        Taxi
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        Formentera es una isla con muy pocos taxis
                        sin embargo puedes pedir un taxi llamando
                        al telefono : +34 971 322 342
                    </p>
                </div>
            </div>

            <div style=\"width: 94%; margin: 15px auto; display:table;\">
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <img src=\"".URL."/assets/img/info-icon-4.png\" style=\"width:auto;height: 40px;display:block;margin:0 auto;\">
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        Restaurantes
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        A traves de nuestra guia en la web
                        aparecen todas nuestras recomendaciones sobre
                        los diferentes restaurantes al rededor
                        de la isla.<br>
                        Click aqui para ver nuestra guia
                    </p>
                </div>
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <img src=\"".URL."/assets/img/info-icon-5.png\" style=\"width:auto;height: 40px;display:block;margin:0 auto;\">
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        LQUILER BARCO
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        Formentera es una isla y se puede ver
                        desde la tierra o desde el mar.
                        Te recomendamos alquilar barco
                        llamando al telefono : +34617586141
                        o bien enviando un email
                        ibizacantierirent@gmail.com
                        Con el codigo Can Tres tiene un 10%
                        de descuento.
                    </p>
                </div>
                <div style=\"width: 29%; margin: 0 2%; box-sizing: border-box;float:left;\">
                    <img src=\"".URL."/assets/img/info-icon-6.png\" style=\"width:auto;height: 40px;display:block;margin:0 auto;\">
                    <h3 style=\"font-size:12px;font-family:'Oswald',sans-serif;font-weight:700;letter-spacing:1px;color:black;text-align:center;text-transform:uppercase;margin:5px 0 10px 0;\">
                        Playas
                    </h3>
                    <p style=\"font-family:serif;font-size:12px;font-weight:400;color:black;margin: 5px 0;line-height:14px;text-align:center;\">
                        A traves de nuestra guia en la web
                        aparecen todas nuestras recomendaciones sobre
                        los diferentes playas al rededor
                        de la isla.<br>
                        Click aqui para ver nuestra guia
                    </p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>";

if (!mail($email, $subject, $message, implode("\r\n", $headers))) {
    $errors[] = "Email Couldn't be sent!";
}
?>