<h2><?= $title ?></h2>
<?= validation_errors() ?>

<?= form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?= $post['id'] ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title"
      value="<?= $post['title'] ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body"
      placeholder="Add Body"><?= $post['body'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" name="category_id">
      <?php foreach($categories as $category): ?>
        <option value="<?= $category['id'] ?>" <?= ($category['id'] === $category['id']) ? 'selected' : '' ?>>
          <?= $category['name']?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
