<h2><?= $title ?></h2>
<div class="post-body">
  <small class="post-date">Posted on: <?= $post['created_at'] ?></small>
  <img src="<?= base_url() ?>assets/images/posts/<?= $post['post_image'] ?>">
  <?= $post['body'] ?>
</div>
<?php if ($this->session->userdata('user_id') === $post['user_id']): ?>
  <hr>
  <a class="btn btn-default pull-left" href="edit/<?= $post['slug'] ?>">Edit</a>
  <?= form_open('/posts/delete/'.$post['id']) ?>
  <input type="submit" value="delete" class="btn btn-danger">
</form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if ($comments): ?>
  <?php foreach ($comments as $comment): ?>
    <div class="well">
      <h5><?= $comment['body'] ?> [by <strong><?= $comment['name'] ?></strong>]</h5>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p>No comments to display</p>
<?php endif; ?>
<hr>
<?= validation_errors() ?>
<h3>Add Comment</h3>
<?= form_open('comments/create/'.$post['id']) ?>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control">
    </textarea>
  </div>
  <input type="hidden" name="slug" value="<?= $post['slug'] ?>">
  <button class="btn btn-primary" type="submit" name="button">Submit</button>
</form>
