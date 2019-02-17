<div class="new-search">
    <form action="" method="POST">
        <div class="new-search-inner">

            <div class="search-field">
                <label for="from">Entrada</label>
                <div class="book-field dateField">
                    <input type="text" name="from" id="from" value="<?=isset($from)?$from:''?>">
                </div>
            </div>

            <div class="search-field">
                <label for="to">Salida</label>
                <div class="book-field dateField">
                    <input type="text" name="to" id="to" value="<?=isset($to)?$to:''?>">
                </div>
            </div>

            <div class="search-field">
                <label for="adults">Adults</label>
                <div class="book-field selectField">
                    <select id="adults" name="adults">
                        <?php for($i = 0; $i <= 8; $i++): ?>
                            <option value="<?=$i?>" <?=(isset($adults) && $adults == $i)?'selected':''?>><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="search-field">
                <label for="ninos">NIÑOS (+14)</label>
                <div class="book-field selectField">
                    <select id="ninos" name="children">
                        <?php for($i = 0; $i <= 8; $i++): ?>
                            <option value="<?=$i?>" <?=(isset($children) && $children == $i)?'selected':''?>><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="search-field-submit">
                <input type="submit" name="check_result" value="Nueva Busqueda">
            </div>


        </div>
    </form>
</div>


<div class="main-reserve">

    <?php if(count($apt_available) < 1): ?>

        <div class="main-top">
            <p>Lo sentimos, no hay apartamentos disponibles para las fechas escogidas con su criterio de
búsqueda. No obstante, envíenos un email a <a href="mailto:info@cantresformentera.com"><u>info@cantresformentera.com</u></a> con los datos de su
búsqueda para ver si podemos ayudarle. Gracias</p>
        </div>

    <?php else: ?>

    <div class="main-top">
        <p>Apartmentos disponsibles desde el 
            <?=dateForm($from, 'd')?> de <?=dateForm($from, 'F')?> al <?=dateForm($to, 'd')?> de <?=dateForm($to, 'F')?> de <?=dateForm($to, 'Y')?></p>
    </div>
    <div class="main-top-head">
        <h2>Elige un apartamento:</h2>
    </div>

    <script src="<?php echo URL; ?>/assets/js/flickity.js"></script>

    <div class="main-apartment">
        <?php foreach($apt_available as $apt): ?>
        <form class="apartment-row" method="POST">
            <div class="apartment-slider">
                <div class="apartment-slider apt-s-<?=$apt['id']?>">
                    <?php 
                        $apt_imgs = getApartmentImages($apt['id'], $db);
                        
                        foreach ($apt_imgs as $apt_img):
                    ?>
                    <div class="carousel-cell">
                        <img src="<?php echo URL; ?>/assets/uploads/<?=$apt_img['img_name']?>">
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <script>
                $('.apt-s-<?=$apt['id']?>').flickity({ cellAlign: 'left', contain: true });
            </script>
            <div class="apartment-s-text">
                <div class="apartment-title">
                    <h1><?=$apt['name']?></h1>
                    <p><?=$apt['desc_1']?></p>
                </div>
                <div class="apartment-details">
                    <h3>Detailes:</h3>
                    <p><?=$apt['desc_2']?></p>
                </div>
                <div class="apartment-price">
                    <h2>Precio: <?=getApartmentPrice($from, $to, $apt, $adults+$children)?> Euros <span>parcio para <?=dateDiffer($from, $to)+1?> noches</span></h2>
                    <p>Cancelación gratuita un mes antes de la reserva</p>
                </div>
                <div class="apartment-reserve">
                    <input type="submit" name="reserve" value="Reservar">
                    <input type="hidden" name="from" value="<?=$from?>">
                    <input type="hidden" name="to" value="<?=$to?>">
                    <input type="hidden" name="adults" value="<?=$adults?>">
                    <input type="hidden" name="children" value="<?=$children?>">
                    <input type="hidden" name="apt_id" value="<?=$apt['id']?>">
                </div>
            </div>
        </form>
        <?php endforeach; ?>
    </div>

    <div class="apartment-bottom">
        <h1><a href="">Nueva Busqueda</a></h1>
    </div>

    <?php endif;?>

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