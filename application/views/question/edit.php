<div class="container" style="margin-top: 50px;">
  <h2>Edit Tests</h2>


<form method="post" action="<?=site_url("question/delete");?>">
<?php
  	if ($question !== '') {
		foreach ($question as $row)
		{
     ?>

	<input type="hidden" name="question_id" value="<?=$row->id?>"/>
	<?php
		}
  	}
?>
<button type="submit" class="btn btn-danger">Delete</button>
</form>
  <form method="post" action="<?=site_url("question/update");?>">
  <?php
  	if ($question !== '') {
		foreach ($question as $row)
		{
     ?>

	<input type="hidden" name="ref_test" value="<?=$row->ref_test?>"/>
	<input type="hidden" name="question_id" value="<?=$row->id?>"/>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value=<?= $row->title?>>
    </div>

	<div class="form-group">
		<label>Type</label>
		<select id="type" name="type">
			<option value="open" <?= $row->type == "open" ? 'selected' : ''?>>Open</option>
			<option value="choice" <?= $row->type == "choice" ? 'selected' : ''?>>Choice</option>
			<option value="scale"<?= $row->type == "scale" ? 'selected' : ''?>>Scale</option>
		</select>
	</div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" rows="5" id="content" name="content"> <?= $row->content?></textarea>
    </div>
    <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
      <button type="submit" class="btn btn-success">Save</button>
      <a type="button" class="btn btn-default" href="<?=site_url("question/list/<?=$row->id?>");?>">Cancel</a>
    </div>
    <?php
    	}
  	}
    ?>
  </form>
</div>
