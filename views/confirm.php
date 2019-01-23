
<form class="main-confirm" method="POST">
    <div class="main-confirm-title">
        <h1>Confirmacion de reserva</h1>
    </div>

    <div class="main-confirm-row">

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

    </div>

    <div class="main-confirm-row">
        <div class="main-details-title">
            <h1>1. Datos De Reserva</h1>
        </div>
        <div class="main-details-body">
            <div class="m-d-apt">
                <h2>Apartamento: <span><?=$apt['name']?></span></h2>
            </div>

            <div class="m-d-boxes">
                <div class="m-d-box">
                    <div class="m-d-box-l">
                        <h2>Adults</h2>
                    </div>
                    <div class="m-d-box-r">
                        <h2><?=$adults?></h2>
                    </div>
                </div>
                <div class="m-d-box">
                    <div class="m-d-box-l">
                        <h2>Precio</h2>
                    </div>
                    <div class="m-d-box-r">
                        <h2><?=$cost?> Euros</h2>
                    </div>
                </div>
                <div class="m-d-box">
                    <div class="m-d-box-l">
                        <h2>Ninos (+14)</h2>
                    </div>
                    <div class="m-d-box-r">
                        <h2><?=$children?></h2>
                    </div>
                </div>
            </div>


            <?php if(!empty($errors)): ?>
                <div class="apt-alert apt-errors" style="max-width: 900px;margin:10px auto 0 auto;">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?=$error?>.</li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="m-d-fields">
                <div class="book-field">
                    <input type="text" name="person_name" placeholder="Nombre" value="<?=isset($person_name)?$person_name:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="surname" placeholder="Apellido" value="<?=isset($surname)?$surname:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="email" placeholder="Email" value="<?=isset($email)?$email:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="phone" placeholder="Telefono" value="<?=isset($phone)?$phone:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="region" placeholder="Pais" value="<?=isset($region)?$region:''?>">
                </div>

                <div class="book-field">
                    <input type="text" name="note" placeholder="Nota"value="<?=isset($note)?$note:''?>">
                </div>
            </div>

        </div>
    </div>

    <div class="main-confirm-row">
        <div class="main-details-title">
            <h1>1. Datos De Pago</h1>
        </div>
        <div class="main-details-body">
            
            <div class="payment-details">
                <?php if(!empty($payerrors)): ?>
                    <div class="apt-alert apt-errors">
                        <ul>
                            <?php foreach ($payerrors as $error): ?>
                                <li><?=$error?>.</li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="payment-item">
                    <input type="radio" name="payment_type" value="Credit Card" id="cardPayment" <?=isset($payment_type)&&$payment_type=="Credit Card"?'checked':''?>>
                    <label for="cardPayment">Pago con tarjeta</label>
                </div>
                <div class="payment-cc <?=isset($payment_type)&&$payment_type=="Credit Card"?'':'isRemoved'?>">
                    <div class="c-2-fields">
                        <div class="search-field">
                            <label for="cname">NOMBRE DE LA TARJETA</label>
                            <div class="book-field">
                                <input type="text" name="c_name" id="cname" value="<?=isset($cc_name)?$cc_name:''?>">
                            </div>
                        </div>
                        <div class="search-field">
                            <label for="cnumber">NUMERO DE TARJETA</label>
                            <div class="book-field">
                                <input type="text" name="c_number" id="cnumber" maxlength="19" value="<?=isset($cc_number)?$cc_number:''?>">
                            </div>
                        </div>
                    </div>
                    <div class="c-3-fields">
                        <div class="search-field">
                            <label for="cmm">FECHA DE CADUCIDAAD</label>
                            <div class="book-field">
                                <input type="text" name="c_mm" id="cmm" placeholder="MM" maxlength="2" value="<?=isset($cc_mm)?$cc_mm:''?>">
                            </div>
                            <div class="book-field">
                                <input type="text" name="c_aa" id="caa" placeholder="AA" maxlength="2" value="<?=isset($cc_yy)?$cc_yy:''?>">
                            </div>
                        </div>
                        <div class="search-field">
                            <label for="cvv">CVV</label>
                            <div class="book-field">
                                <input type="text" name="c_cvv" id="cvv" maxlength="3" value="<?=isset($cc_cvv)?$cc_cvv:''?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-item">
                    <input type="radio" name="payment_type" value="paypal" id="paypalPayment">
                    <label for="paypalPayment">Pay Pal</label>
                </div>
            </div>

            <script>
                document.querySelector('.payment-item input#cardPayment').addEventListener('change',(e)=>{
                    document.querySelector('.payment-cc').classList.remove('isRemoved')
                })
                document.querySelector('.payment-item input#paypalPayment').addEventListener('change',(e)=>{
                    document.querySelector('.payment-cc').classList.add('isRemoved')
                })
            </script>

            <div class="payment-table">
                <div class="payment-table-row">
                    <div class="payment-t-type">
                        Apartamento <?=$apt['name']?>
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

        </div>
    </div>

    <div class="confirm-booking">
        <input type="submit" name="confirm" value="Confirmar Reserva">

        <input type="hidden" name="from" value="<?=$from?>">
        <input type="hidden" name="to" value="<?=$to?>">
        <input type="hidden" name="adults" value="<?=$adults?>">
        <input type="hidden" name="children" value="<?=$children?>">
        <input type="hidden" name="apt_id" value="<?=$apt['id']?>">
    </div>
</form>