<div class="container" style="margin-top: 50px;">
  <h2>Add Tests</h2>

  <form method="post" action="<?=site_url("Test/create");?>">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

	<div class="form-group">
		<label>Locale</label>
		<select id="locale" name="locale">
			<option value="PL">Polish</option>
			<option value="GB">English</option>
			<option value="DE">German</option>
		</select>
	</div>

    <div class="form-group">
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="1" checked="checked">   Active</label>
      </div>
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="0">   Inactive</label>
      </div>
    </div>

    <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
      <button type="submit" class="btn btn-success">Save</button>
      <a type="button" class="btn btn-default" href="<?=site_url("Test/list");?>">Cancel</a>
    </div>
  </form>
</div>
