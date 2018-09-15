<?php  require_once('config.php'); if(count($errors) > 0): ?>
    <div class="error alert alert-error">
	  <?php foreach($errors as $error): ?>
	      <p><?php echo $error; ?></p>
	  <?php endforeach ?>
	</div>
<?php endif ?>