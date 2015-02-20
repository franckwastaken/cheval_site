<p>-------------view test.php-------------------</p>

<?php if(!empty($data['chevalList'])): ?>
    <?php foreach($data['chevalList'] as $chev): ?>
        <?php echo "Cheval name : " . $chev->nom ?><br>
        <?php echo "Cheval id : "   . $chev->id_cheval  ?><br>
        <?php echo "Cheval race  : "   . $chev->race  ?><br>
    <?php endforeach; ?>
<?php endif; ?>