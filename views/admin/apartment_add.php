<div class="month-title">
    <h2>Enter Data</h2>
</div>

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
        <div class="apt-gallary-img">

<?php 

if(isset($_POST['apt_images']) && !empty($_POST['apt_images'])){
    for($i = 0; $i < count($_POST['apt_images']); $i++){
        echo '<img src="'.URL.'/assets/uploads/'.$_POST['apt_images'][$i].'">';
    }
}


?>
        
        </div>
        <div class="apt-gallary-btn">
            <label for="aptimages">Anadir Foto</label>
            <input type="file" id="aptimages">
        </div>
    </div>
</div>

<div class="apt-prices-row">
    <div class="apt-prices">
        <div class="apt-simple-title">Precio 2 Personas:</div>
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

    <div class="apt-prices">
        <div class="apt-simple-title">Precio Persona Adicional:</div>
        <div class="apt-prices-boxes">
            <div class="apt-field">
                <label for="tbajaa">T.Baja</label>
                <input type="text" name="p_1_a" id="tbajaa" value="<?=isset($_POST['p_1_a'])? $_POST['p_1_a']:''?>">
            </div>
            <div class="apt-field">
                <label for="tmediaa">T.Media</label>
                <input type="text" name="p_2_a" id="tmediaa" value="<?=isset($_POST['p_2_a'])? $_POST['p_2_a']:''?>">
            </div>
            <div class="apt-field">
                <label for="taltaa">T.Alta</label>
                <input type="text" name="p_3_a" id="taltaa" value="<?=isset($_POST['p_3_a'])? $_POST['p_3_a']:''?>">
            </div>
            <div class="apt-field">
                <label for="tprimea">T.Prime</label>
                <input type="text" name="p_4_a" id="tprimea" value="<?=isset($_POST['p_4_a'])? $_POST['p_4_a']:''?>">
            </div>
        </div>
    </div>

</div>


<div class="apt-session">
    <div class="apt-session-l">

        <div class="apt-session-setter">
            <div class="apt-simple-title">Calendario de precios</div>
            <div class="apt-session-date-select apt-session-tbaja isActive">
                <div class="apt-session-selector">
                    <input type="text" id="dateOne" name="s_1_date" value="<?=isset($_POST['s_1_date'])?$_POST['s_1_date']:'';?>">
                    <div id="dateOne-container" style="width:100%;"></div>
                </div>
            </div>

            <div class="apt-session-date-select apt-session-tmedia isActive">
                <div class="apt-session-selector">
                    <input type="text" id="dateTwo" name="s_2_date" value="<?=isset($_POST['s_2_date'])?$_POST['s_2_date']:'';?>">
                    <div id="dateTwo-container" style="width:100%;"></div>
                </div>
            </div>

            <div class="apt-session-date-select apt-session-talta isActive">
                <div class="apt-session-selector">
                    <input type="text" id="dateThree" name="s_3_date" value="<?=isset($_POST['s_3_date'])?$_POST['s_3_date']:'';?>">
                    <div id="dateThree-container" style="width:100%;"></div>
                </div>
            </div>

            <div class="apt-session-date-select apt-session-tprime isActive">
                <div class="apt-session-selector">
                    <input type="text" id="dateFour" name="s_4_date" value="<?=isset($_POST['s_4_date'])?$_POST['s_4_date']:'';?>">
                    <div id="dateFour-container" style="width:100%;"></div>
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





<link rel="stylesheet" href="<?=URL?>/assets/css/daterangepicker.css">
<script src="<?=URL?>/assets/js/moment.js"></script>
<script src="<?=URL?>/assets/js/jquery.daterangepicker.min.js"></script>
<script>
    $('#dateOne').dateRangePicker({inline:true,container: '#dateOne-container',alwaysOpen:true,format: 'MM/DD/YYYY'});
    $('#dateTwo').dateRangePicker({inline:true,container: '#dateTwo-container',alwaysOpen:true,format: 'MM/DD/YYYY'});
    $('#dateThree').dateRangePicker({inline:true,container: '#dateThree-container',alwaysOpen:true,format: 'MM/DD/YYYY'});
    $('#dateFour').dateRangePicker({inline:true,container: '#dateFour-container',alwaysOpen:true,format: 'MM/DD/YYYY'});
</script>

<?php

    if(isset($_POST['apt_images']) && !empty($_POST['apt_images'])){

        for($i = 0; $i < count($_POST['apt_images']); $i++){
            echo '<input type="hidden" name="apt_images[]" class="theimages"
             value="'.$_POST['apt_images'][$i].'">';
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


    loadClearSeason();
    function loadClearSeason() {
        seasonSelect.forEach(s=>{
            if(s.classList.contains('isActive') && !s.classList.contains('apt-session-tbaja')){
                s.classList.remove('isActive')
            }
        })
        seasonBtn.forEach(s=>{
            if(s.classList.contains('isActive') && !s.classList.contains('apt-btn-tbaja')){
                s.classList.remove('isActive')
            }
        })
    }

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

