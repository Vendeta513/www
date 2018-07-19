<?php if(! empty($errors)):?> <!--output error messages when not filled.-->
  <ul>
    <?php foreach($errors as $error):?>
      <li><?= $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form method="post">
  <div>
    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="Article title" id="title" value="<?= htmlspecialchars($title); ?>">
  </div>

  <div>
    <label for="content">Content:</label>
    <textarea name="content" cols="40" rows="4" placeholder="Article content" id="content"><?= htmlspecialchars($content); ?></textarea>
  </div>

  <div>
    <label for="published">Published date and time:</label>
    <input name="published_at" type="datetime-local" id="published" value="<?= htmlspecialchars($published_at); ?>" >
  </div>

  <button>Save</button>
</form>
