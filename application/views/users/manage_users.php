<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">List of users</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>role</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>firstname</td>
                        <td>lastname</td>
                        <td>@username</td>
                        <td>role</td>
                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">EDIT</button></td>
                        <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">DELETE</button></td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
</div>

<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Are You sure to delete user?</h4>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
        <form class="edit-user">
            <input name="text" class="form-control" type="email" placeholder="First Name">
            <input name="text" class="form-control" type="email" placeholder="Last Name">
            <input name="email" class="form-control" type="email" placeholder="E-mail">
            <input name="password" class="form-control" type="password" placeholder="Password">
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role">
                    <option>text editor</option>
                    <option>user</option>
                </select>
            </div>
         <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
    </div>

  </div>
</div>
