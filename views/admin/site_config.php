<div id="config-block">

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
        <div class="config-row">
            <div class="config-input">
                <div class="apt-field">
                    <label for="comooptions">"Como nos conoció" options</label>
                    <input type="text" name="came_froms" id="comooptions" value="<?=isset($_POST['came_froms'])? $_POST['came_froms']:getSetting('came_froms',$db)?>">
                    <p style="margin:0;padding:0;"><small>write in each option with a comma (,)</small></p>
                </div>
            </div>
        </div>
    
        
        <div class="book-a-form-submit">
            <input type="submit" value="Save Settings" name="save_settings">
        </div>
    </form>

</div>