<div class="container" style="margin-top: 50px;">
  <h2>Manage Question</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Referenced test</th>
        <th>Type</th>
        <th>Title</th>
        <th>Content</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($questions as $question)
      {
      ?>
      <tr>
        <td><?=$question->ref_test;?></td>
        <td><?=$question->type;?></td>
        <td><?=$question->title;?></td>
        <td><?=$question->content;?></td>
        <td>
        <a type="button" class="btn btn-info" href="<?=site_url("question/edit/$question->id");?>">
            Edit
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
