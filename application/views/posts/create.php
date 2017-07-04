<h2><?= $title ?></h2>
<?= validation_errors() ?>

<!-- <?= form_open('posts/create'); ?> -->
<?= form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" name="category_id">
      <?php foreach($categories as $category): ?>
        <option value="<?= $category['id'] ?>"><?= $category['name']?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Upload Image</label>
    <input type="file" name='userfile' size="20">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
