<?php

  require("includes/database.php");
  require("includes/article.php");

  $conn = get_DB();

  if (isset($_GET['id'])) {
    $article = getArticle($conn, $_GET['id']);
  } else {
    $article = null;
  }
?>


<?php require("includes/header.php");?>
<?php if($article === null): ?>
    <p>Article not found.</p>
<?php else: ?>
  <ul>
      <li>
          <article>
              <h2><?= htmlspecialchars($article["title"]); ?></h2>  <!--keeping input as is, not be evaluated.-->
              <p><?= htmlspecialchars($article["content"]); ?></p>
              <p>Posted: <?= $article["published_at"];?></p>
          </article>
          <a href="edit_article.php?id=<?= $article['id']; ?>">Edit</a>
      </li>
  </ul>
<?php endif; ?>
<?php require("includes/footer.php")?>
