<div class="container" style="margin-top: 50px;">
  <h2>Add Job Offers</h2>

  <form method="post" action="<?=site_url("JobOffer/create");?>">

    <div class="form-group">
      <label for="position">Position</label>
      <input type="text" class="form-control" id="position" name="position" placeholder="Position">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" rows="5" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
      <label for="ref_test">Assign test:</label>
      <select class="form-control" id="ref_test" name="ref_test">
          <option value="0">-</option>
        <?php foreach($tests as $test) {?>
          <option value="<?=$test->id;?>"><?=$test->title;?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="1">   Active</label>
      </div>
      <div class="radio">
        <label><input type="radio" id="is_active" name="is_active" value="0">   Inactive</label>
      </div>
    </div>

    <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
      <button type="submit" class="btn btn-success">Save</button>
      <a type="button" class="btn btn-default" href="<?=site_url("JobOffer/list");?>">Cancel</a>
    </div>
  </form>
</div>
