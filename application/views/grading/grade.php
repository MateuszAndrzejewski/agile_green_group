<div class="container" style="margin-top: 50px;">
	<h2>Grade Submission: <?= $submission->id;?></h2>
	<form method="post" action="<?=site_url("Grading/grade/$submission->id");?>">
		<?php
			if ($submissionQA !== '') {
				foreach ($submissionQA as $row)
				{
		?>
		
		<div class="form-group">
			<label>Question: <?= $row->question->title?></label><br>
			<label><?= $row->question->content?></label>
		</div>
		<div class="form-group">
			<label>Answer:</label>
			<label><?= $row->answer?></label>
		</div>
		
		<?php
				}
		?>
		<div class="form-group">
			<label>Grade</label>
			<select id="grade" name="grade">
				<option value="1" <?= $submission->grade == "1" ? 'selected' : '';?>>1</option>
				<option value="2" <?= $submission->grade == "2" ? 'selected' : '';?>>2</option>
				<option value="3" <?= $submission->grade == "3" ? 'selected' : '';?>>3</option>
				<option value="4" <?= $submission->grade == "4" ? 'selected' : '';?>>4</option>
				<option value="5" <?= $submission->grade == "5" ? 'selected' : '';?>>5</option>
			</select>
		</div>
		<div class="actionbar" style="margin-top:20px;margin-bottom:40px;text-align:right;margin-right:0px;">
			<button type="submit" class="btn btn-success">Save Grade</button>
			<a type="button" class="btn btn-default" href="<?=site_url("Grading/list/$submission->ref_test");?>">Cancel</a>
		</div>
		
		<?php
			}
		?>
	</form>
</div>
