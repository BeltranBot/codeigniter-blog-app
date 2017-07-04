<h2><?= $title ?></h2>
<ul class="list-group">
  <?php foreach($categories as $category): ?>
    <li class="list-group-item">
      <a href="<?= site_url('/categories/posts/'.$category['id']) ?>">
        <?= $category['name'] ?>
      </a>
      <?php if ($this->session->userdata('user_id') === $category['user_id']): ?>
        <?= form_open('categories/delete/'.$category['id'], ['class' => 'cat-delete']) ?>
          <input class="btn-link text-danger" type="submit" value="[X]">
        <?= form_close() ?>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>
