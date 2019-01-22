<a href="clients.php" class="resv-step-cross">
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
    <div class="clientAdd-form">
        <div class="clientAdd-f-l">
            <div class="book-field">
                <input type="text" name="name" placeholder="Nombre" value="<?=isset($name)?$name:''?>">
            </div>
            <div class="book-field">
                <input type="email" name="email" placeholder="Email" value="<?=isset($email)?$email:''?>">
            </div>
            <div class="book-field">
                <input type="text" name="region" placeholder="Pais" value="<?=isset($region)?$region:''?>">
            </div>
            <div class="book-field">
                <input type="text" name="come_from" placeholder="COMO NOS CONOCIO" value="<?=isset($come_from)?$come_from:''?>">
            </div>
        </div>
        <div class="clientAdd-f-r">
            <div class="book-field">
                <input type="text" name="surname" placeholder="Apellido" value="<?=isset($surname)?$surname:''?>">
            </div>
    
            <div class="book-field">
                <input type="text" name="phone" placeholder="Telefono" value="<?=isset($phone)?$phone:''?>">
            </div>
    
            <div class="book-field textareaField">
                <textarea placeholder="Nota" name="note"><?=isset($note)?$note:''?></textarea>
            </div>
        </div>
    </div>
    <div class="book-a-form-submit">
        <input type="submit" name="add_client" value="ANADIR CLIENTE">
    </div>
</form>