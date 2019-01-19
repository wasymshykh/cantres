<div class="apartment-boxes">
    <?php foreach($apartments as $apartment): ?>
    <div class="apartment-box">
        <a href="apartment_edit.php?id=<?=$apartment['id']?>"><?=$apartment['name']?></a>
    </div>
    <?php endforeach; ?>
</div>