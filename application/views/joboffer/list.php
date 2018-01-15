<div class="container" style="margin-top: 50px;">
  <h2>Manage Job Offers</h2>

  <div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
    <a type="button" class="btn btn-success" href="<?=site_url("JobOffer/add");?>">Add new</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Position</th>
        <th>Description</th>
        <th>Linked test</th>
        <th>Aktywny</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($job_offers as $joboffer)
      {
        if($joboffer->is_active) $new_status = 0;
        else $new_status = 1;
      ?>
      <tr>
        <td><?=$joboffer->position;?></td>
        <td><?=$joboffer->description;?></td>
        <td><?=$joboffer->title;?></td>
        <td><?=$joboffer->is_active == 1 ? "Tak" : "Nie";?></td>
        <td>
          <a type="button" class="btn btn-<?=$joboffer->is_active == 1 ? "danger" : "success";?>" href="<?=site_url("JobOffer/changestatus/$joboffer->id/$new_status");?>">
            <?=$joboffer->is_active == 1 ? "Deactivate" : "Activate";?>
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
