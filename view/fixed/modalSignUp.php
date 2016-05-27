<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 20/05/2016
 * Time: 15:13
 */

echo '
<!-- Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Sign Up</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="../control/signup.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="inputEmail" class="form-control" id="exampleInputEmail1" placeholder="Email" data-trigger="focus" data-toggle="popover" data-content="Email already in use! Please chose another email" onblur="verifyEmail()">
          </div>
          <div class="form-group">
            <label for="exampleInputPrenom">Prénom</label>
            <input type="text" name="inputPrenom" class="form-control" id="exampleInputPrenom" placeholder="Prénom">
          </div>
          <div class="form-group">
            <label for="exampleInputNom">Nom</label>
            <input type="text" name="inputNom" class="form-control" id="exampleInputNom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="inputPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPasswordRetype">Retype your Password</label>
            <input type="password" name="inputPassword" class="form-control" id="exampleInputPasswordRetype" placeholder="Retype your Password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">SignUp</button>
      </div>
      </form>
    </div>
  </div>
</div>';