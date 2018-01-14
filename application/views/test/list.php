<div class="container" style="margin-top: 50px;">
  <h2>Manage Tests</h2>

  <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
    <a type="button" class="btn btn-success" href="<?=site_url("Test/add");?>">Add new</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Locale</th>
        <th>Active</th>
        <th>Actions</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($tests as $test)
      {
        if($test->is_active) $new_status = 0;
        else $new_status = 1;
      ?>
      <tr>
        <td><?=$test->title;?></td>
        <td><?=$test->locale;?></td>
        <td><?=$test->is_active == 1 ? "Yes" : "No";?></td>
        <td>
          <a type="button" class="btn btn-<?=$test->is_active == 1 ? "danger" : "success";?>" href="<?=site_url("Test/changestatus/$test->id/$new_status");?>">
            <?=$test->is_active == 1 ? "Deactivate" : "Activate";?>
          </a>
          <a type="button" class="btn btn-info" href="<?=site_url("question/list/$test->id");?>">
            View questions
          </a>
          <a type="button" class="btn btn-info" href="<?=site_url("question/add/$test->id");?>">
            Add Question
          </a>
          <a type="button" class="btn btn-info" href="<?=site_url("test/edit/$test->id");?>">
            Edit
          </a>
        </td>
        <td>
          <a type="button" class="btn btn-success" href="<?=site_url("Test/getPDF/$test->id");?>">
            Download in PDF
          </a>
          <a type="button" class="btn btn-success" href="<?=site_url("Test/getCSV/$test->id");?>">
            Download in CSV
          </a>
          <a type="button" class="btn btn-success" href="<?=site_url("Test/getXLS/$test->id");?>">
            Download in XLS
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
