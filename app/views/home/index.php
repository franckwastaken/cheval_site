<?php if($data['user']): ?>
<p>This is <?php echo $data['user']->id_cheval; ?> profile.</p>

 <?php else: ?>

 <h3>new project</h3>

<?php endif; ?>



<?php if(!empty($data['user'])): ?>
 <?php foreach($data['user'] as $food): ?>
  <?php echo $food ?><br>
 <?php endforeach; ?>
<?php endif; ?>