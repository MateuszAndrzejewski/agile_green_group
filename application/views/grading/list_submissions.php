<div class="container" style="margin-top: 50px;">
  <h2>Manage Submissions</h2>
  <?php echo $this->session->flashdata('email_sent'); ?>

  <table class="table table-striped">
    <thead>
      <tr>
		<th>Referenced Test</th>
        <th>Referenced Job Offer</th>
        <th>Referenced Submitter</th>
        <th>Grade</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($submissions as $submission)
      {
      ?>
      <tr>
		<td><?=$submission->ref_test;?></td>
        <td><?=$submission->ref_job_offer;?></td>
        <td><?=$submission->ref_user;?></td>
        <td><?=$submission->grade;?></td>
        <td>
		<?php if ($submission->grade == 0) {
        	?>
        	<a type="button" class="btn btn-info" href="<?=site_url("grading/viewSubmission/$submission->id");?>">
				Grade
			</a>
        	<?php 
        } else {
        ?>
			<a type="button" class="btn btn-info" href="mailto:<?=$submission->mail['to'];?>?subject=<?=$submission->mail['subject'];?>&body=<?=$submission->mail['message'];?>">
				Notify
			</a>
			<?php 
        }
        ?>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
