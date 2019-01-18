<div class="month-title">
    <h2>Add Apartment</h2>
</div>

<form action="" id="addForm" method="POST">

<div class="apt-top-field">
    <div class="apt-t-f-boxes">
        <div class="apt-t-f-box">
            <div class="apt-field">
                <label for="aptnumber">Nombre</label>
                <input type="text" name="apt_name" id="aptnumber" value="<?=isset($_POST['apt_name'])? $_POST['apt_name']:''?>">
            </div>
        </div>
        <div class="apt-t-f-box">
            <div class="apt-field">
                <label for="aptdesc">Description 1</label>
                <input type="text" name="apt_desc_1" id="aptdesc" value="<?=isset($_POST['apt_desc_1'])? $_POST['apt_desc_1']:''?>">
            </div>
        </div>
    </div>
    <div class="apt-t-f-boxes">
        <div class="apt-t-f-box">
            <div class="apt-field">
                <label for="aptadults">Nº Adultos</label>
                <input type="text" name="apt_adults" id="aptadults" value="<?=isset($_POST['apt_adults'])? $_POST['apt_adults']:''?>">
            </div>
            <div class="apt-field">
                <label for="aptnonos">Nº Ninos</label>
                <input type="text" name="apt_children" id="aptnonos" value="<?=isset($_POST['apt_children'])? $_POST['apt_children']:''?>">
            </div>
        </div>
        <div class="apt-t-f-box">
            <div class="apt-field">
                <label for="aptnumber">Description 2</label>
                <input type="text" name="apt_desc_2" id="aptnumber" value="<?=isset($_POST['apt_desc_2'])? $_POST['apt_desc_2']:''?>">
            </div>
        </div>
    </div>
</div>

<div class="apt-gallary">
    <div class="apt-simple-title">Fotos</div>
    <div class="apt-gallary-row">
        <div class="apt-gallary-img"></div>
        <div class="apt-gallary-btn">
            <label for="aptimages">Anadir Foto</label>
            <input type="file" id="aptimages">
        </div>
    </div>
</div>

<div class="apt-prices">
    <div class="apt-simple-title">Precio</div>
    <div class="apt-prices-boxes">
        <div class="apt-field">
            <label for="tbaja">T.Baja</label>
            <input type="text" name="p_1" id="tbaja" value="<?=isset($_POST['p_1'])? $_POST['p_1']:''?>">
        </div>
        <div class="apt-field">
            <label for="tmedia">T.Media</label>
            <input type="text" name="p_2" id="tmedia" value="<?=isset($_POST['p_2'])? $_POST['p_2']:''?>">
        </div>
        <div class="apt-field">
            <label for="talta">T.Alta</label>
            <input type="text" name="p_3" id="talta" value="<?=isset($_POST['p_3'])? $_POST['p_3']:''?>">
        </div>
        <div class="apt-field">
            <label for="tprime">T.Prime</label>
            <input type="text" name="p_4" id="tprime" value="<?=isset($_POST['p_4'])? $_POST['p_4']:''?>">
        </div>
    </div>
</div>

<div class="apt-session">
    <div class="apt-session-l">

        <div class="apt-session-setter">
            <div class="apt-simple-title">Calendario de precios</div>
            <div class="apt-session-date-select apt-session-tbaja isActive">
                <div class="book-field dateField">
                    <label for="s_1_from">T.B Start</label>
                    <input type="text" id="s_1_from" name="s_1_start" value="<?=isset($_POST['s_1_start'])? $_POST['s_1_start']:''?>">
                </div>
                <div class="book-field dateField">
                    <label for="s_1_to">T.B End</label>
                    <input type="text" id="s_1_to" name="s_1_end" value="<?=isset($_POST['s_1_end'])? $_POST['s_1_end']:''?>">
                </div>
            </div>

            <div class="apt-session-date-select apt-session-tmedia">
                <div class="book-field dateField">
                    <label for="s_2_from">T.M Start</label>
                    <input type="text" id="s_2_from" name="s_2_start" value="<?=isset($_POST['s_2_start'])? $_POST['s_2_start']:''?>">
                </div>
                <div class="book-field dateField">
                    <label for="s_2_to">T.M End</label>
                    <input type="text" id="s_2_to" name="s_2_end" value="<?=isset($_POST['s_2_end'])? $_POST['s_2_end']:''?>">
                </div>
            </div>

            <div class="apt-session-date-select apt-session-talta">
                <div class="book-field dateField">
                    <label for="s_3_from">T.M Start</label>
                    <input type="text" id="s_3_from" name="s_3_start" value="<?=isset($_POST['s_3_start'])? $_POST['s_3_start']:''?>">
                </div>
                <div class="book-field dateField">
                    <label for="s_3_to">T.M End</label>
                    <input type="text" id="s_3_to" name="s_3_end" value="<?=isset($_POST['s_3_end'])? $_POST['s_3_end']:''?>">
                </div>
            </div>

            <div class="apt-session-date-select apt-session-tprime">
                <div class="book-field dateField">
                    <label for="s_4_from">T.P Start</label>
                    <input type="text" id="s_4_from" name="s_4_start" value="<?=isset($_POST['s_4_start'])? $_POST['s_4_start']:''?>">
                </div>
                <div class="book-field dateField">
                    <label for="s_4_to">T.P End</label>
                    <input type="text" id="s_4_to" name="s_4_end" value="<?=isset($_POST['s_4_end'])? $_POST['s_4_end']:''?>">
                </div>
            </div>
        </div>

    </div>
    <div class="apt-session-r">

        <div class="apt-session-date">
            <h3>2 Mayo 2019 al 16 de mayo del 2019</h3>
        </div>

        <div class="apt-select-session">
            <div class="apt-session-btn apt-btn-tbaja isActive">
                T.B
            </div>
            <div class="apt-session-btn apt-btn-tmedia">
                T.M
            </div>
            <div class="apt-session-btn apt-btn-talta">
                T.A
            </div>
            <div class="apt-session-btn apt-btn-tprime">
                T.P
            </div>
        </div>

    </div>
</div>

<div class="book-a-form-submit">
    <input type="submit" value="ANADIR Apartamento" name="add_apartment">
</div>

<?php

    if(isset($_POST['apt_images']) && !empty($_POST['apt_images'])){

        for($i = 0; $i < count($_POST['apt_images']); $i++){
            echo '<input type="hidden" name="apt_images[]" class="theimages"
             src="'.URL.'/assets/uploads/'.$_POST['apt_images'][$i].'">';
        }

    }

?>

</form>

<script>
    let seasonSelect = document.querySelectorAll('.apt-session-date-select');
    let seasonBtn = document.querySelectorAll('.apt-session-btn');

    let tbajaSelect = document.querySelector('.apt-session-tbaja');
    let tbajaBtn = document.querySelector('.apt-btn-tbaja');

    let tmediaSelect = document.querySelector('.apt-session-tmedia');
    let tmediaBtn = document.querySelector('.apt-btn-tmedia');

    let taltaSelect = document.querySelector('.apt-session-talta');
    let taltaBtn = document.querySelector('.apt-btn-talta');

    let tprimeSelect = document.querySelector('.apt-session-tprime');
    let tprimeBtn = document.querySelector('.apt-btn-tprime');


    function clearSeason() {
        seasonSelect.forEach(s=>{
            if(s.classList.contains('isActive')){
                s.classList.remove('isActive')
            }
        })
        seasonBtn.forEach(s=>{
            if(s.classList.contains('isActive')){
                s.classList.remove('isActive')
            }
        })
    }

    tbajaBtn.addEventListener('click', ()=>{
        clearSeason()
        tbajaSelect.classList.add('isActive')
        tbajaBtn.classList.add('isActive')
    })

    tmediaBtn.addEventListener('click', ()=>{
        clearSeason()
        tmediaSelect.classList.add('isActive')
        tmediaBtn.classList.add('isActive')
    })

    taltaBtn.addEventListener('click', ()=>{
        clearSeason()
        taltaSelect.classList.add('isActive')
        taltaBtn.classList.add('isActive')
    })

    tprimeBtn.addEventListener('click', ()=>{
        clearSeason()
        tprimeSelect.classList.add('isActive')
        tprimeBtn.classList.add('isActive')
    })

</script>






<script>
$(function () {
    var dateFormat = "mm/dd/yy",
        from_1 = $("#s_1_from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            to_1.datepicker("option", "minDate", getDate(this));
        }),
        to_1 = $("#s_1_to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            from_1.datepicker("option", "maxDate", getDate(this));
        }),
        from_2 = $("#s_2_from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            to_2.datepicker("option", "minDate", getDate(this));
        }),
        to_2 = $("#s_2_to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            from_2.datepicker("option", "maxDate", getDate(this));
        }),
        from_3 = $("#s_3_from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            to_3.datepicker("option", "minDate", getDate(this));
        }),
        to_3 = $("#s_3_to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            from_3.datepicker("option", "maxDate", getDate(this));
        }),
        from_4 = $("#s_4_from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            to_4.datepicker("option", "minDate", getDate(this));
        }),
        to_4 = $("#s_4_to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        }).on("change", function () {
            from_4.datepicker("option", "maxDate", getDate(this));
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