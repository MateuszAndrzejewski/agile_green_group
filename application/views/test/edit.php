<div class="container" style="margin-top: 50px;">
  <h2>Edit Tests</h2>


<form method="post" action="<?=site_url("Test/delete");?>">
<?php 
  	if ($test !== '') {
		foreach ($test as $row)
		{
     ?>

	<input type="hidden" name="test_id" value="<?=$row->id?>"/>
	<?php 
		}
  	}
?>
<button type="submit" class="btn btn-danger">Delete</button>
</form>

  <form method="post" action="<?=site_url("Test/update");?>">
  <?php 
  	if ($test !== '') {
		foreach ($test as $row)
		{
     ?>

	<input type="hidden" name="test_id" value="<?=$row->id?>"/>
	
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value=<?= $row->title?>>
    </div>

	<div class="form-group">
		<label>Locale</label>
		<select id="locale" name="locale">
			<option value="PL" <?= $row->locale == "PL" ? 'selected' : ''?>>Polish</option>
			<option value="GB" <?= $row->locale == "GB" ? 'selected' : ''?>>English</option>
			<option value="DE"<?= $row->locale == "DE" ? 'selected' : ''?>>German</option>
		</select>
	</div>

    <div class="form-group">
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="1" <?= $row->is_active == "1" ? 'checked' : ''?>>   Active</label>
      </div>
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="0" <?= $row->is_active == "0" ? 'checked' : ''?>>   Inactive</label>
      </div>
    </div>

    <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
      <button type="submit" class="btn btn-success">Save</button>
      <a type="button" class="btn btn-default" href="<?=site_url("Test/list");?>">Cancel</a>
    </div>
    <?php
    	}
  	}
    ?>
  </form>
</div>
