<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>


  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body >

    
    <h1 style="font-size: 2.8rem; font-weight: 600; color: #0056b3; text-align: center; margin-bottom: 40px;">
      <?= $article->title ?>
    </h1>

    <p >
      <?= $article->text ?>
    </p>

    <!-- <img 
      src="<?= base_url('assets/articles/' . $article->photo) ?>" 
      alt="<?= $article->title ?>" 
      style="display: block; width: 100%; max-height: 500px; object-fit: cover; border-radius: 10px; margin-bottom: 40px;"
    > -->

</body>





<?= $this->endSection(); ?>