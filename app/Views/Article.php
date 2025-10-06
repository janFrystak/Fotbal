<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

 <p class="mt-auto mb-0 fs-6"><?= strip_tags($article->text) ?>...</p>

  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .article-container {
      max-width: 800px;
      margin: 60px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    .article-photo img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }
    .article-body {
      padding: 2rem;
    }
    .article-title {
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .article-text {
      line-height: 1.8;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="article-container">
    <div class="article-photo">
      <img src="<?php base_url('assets/articles/'. $article->photo)?>" alt=<?= base_url('assets/articles/'. $article->photo)?>>
    </div>
    <div class="article-body">
      <h1 class="article-title"><?php $article->title ?></h1>
      <p class="article-text">
        <?php $article->text ?>
      </p>
    </div>
  </div>

</body>

