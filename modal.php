<!-- 
  Modals that are used for login, register etc 
  Include with: include_once("modal.php") 
-->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log in!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="login">
          <div class="mb-3">
            <label for="logName" class="col-form-label">Namn</label>
            <input type="text" id="logName" name="logName" class="form-control">
          </div>
          <div class="mb-3">
            <label for="logPassword" class="col-form-label">Password</label>
            <input type="password" id="logPassword" name="logPassword" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="register">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Firstname</label>
              <input type="text" class="form-control" name="regForname" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Lastname</label>
              <input type="text" class="form-control" name="regLastname" placeholder="" value="" required>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="regUsername" placeholder="Username" required>
              </div>
            </div>
            <div class="col-12">
              <label for="regEmail" class="form-label">Email</label>
              <input type="email" class="form-control" name="regEmail" placeholder="example@example.com" required>
            </div>
            <div class="col-12">
              <label for="regPassword" class="form-label">Password</label>
              <input type="password" class="form-control" name="regPassword" required>
            </div>

            <div class="col-12">
              <label for="Gender" class="form-label">Gender</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="regGender" id="regGender1" value="Male">
                <label class="form-check-label" for="regGender1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="regGender" id="regGender2" value="Female">
                <label class="form-check-label" for="regGender2">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="regGender" id="regGender3" value="Other">
                <label class="form-check-label" for="regGender3">Other</label>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="regCity" class="form-label">City <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="regCity" placeholder="" value="">
            </div>

            <div class="col-sm-6">
              <label for="regCountry" class="form-label">Country <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="regCountry" placeholder="" value="">
            </div>

            <div class="col-md-12 mb-3">
              <label for="regMembership" class="form-label">Membership</label>
              <select class="form-select" name="regMembership" required>
                <option value="Free">Free</option>
                <option value="Pro">Pro</option>
                <option value="Elite">Elite</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>