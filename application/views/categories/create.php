<h2><?= $title ?></h2>
<?= validation_errors() ?>

<?= form_open_multipart('categories/create') ?>
  <div class="form-group">
    <label for="name">Name</label>
    <input class='form-control' type="text" name="name" placeholder="Enter name">
  </div>
  <button class="btn btn-default" type="submit" name="button">
    Submit
  </button>
</form>
