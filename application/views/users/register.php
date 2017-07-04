
<?= validation_errors() ?>

<?= form_open('users/register') ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1 class="text-center"><?= $title ?></h1>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control">
      </div>
      <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" name="zipcode" placeholder="Zipcode" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
      </div>
      <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input type="password" name="password2" placeholder="Confirm password" class="form-control">
      </div>
      <button class="btn btn-primary btn-block" type="submit" name="button">Submit</button>
    </div>
  </div>
<?= form_close() ?>
