<div class="container" style="margin-top: 50px;">
  <h2>Add Question</h2>

  <form method="post" action="<?=site_url("Question/create");?>">
	<input type="hidden" id="ref_test" name="ref_test" value=<?=$test_id?>/>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

	<div class="form-group">
		<label>Type</label>
		<select id="type" name="type">
			<option value="Open">Open</option>
			<option value="Choice">Choice</option>
			<option value="Scale">Scale</option>
		</select>
	</div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" rows="5" id="content" name="content"></textarea>
    </div>

    <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
      <button type="submit" class="btn btn-success">Save</button>
      <a type="button" class="btn btn-default" href="<?=site_url("Question/list/?test_id=$test_id");?>">Cancel</a>
    </div>
  </form>
</div>
