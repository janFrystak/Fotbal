<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="mx-auto bg-white rounded-2xl shadow-lg p-5 p-md-6" style="max-width: 800px;">
    <h1 class="h3 fw-bold text-primary mb-4 border-bottom pb-2">Edit Article</h1>

    <form action="<?= site_url('article/edit/' . $article->id) ?>" method="post" enctype="multipart/form-data" class="row g-4">


     
      <div class="col-12">
        <label for="title" class="form-label fw-semibold">Title</label>
        <input 
          name="title"
          id="title"
          type="text"
          value="<?= esc($article->title) ?>"
          class="form-control"
        >
      </div>

    
      <div class="col-12">
        <label for="text" class="form-label fw-semibold">Text</label>
        <textarea 
          name="text"
          id="text"
          rows="8"
          class="form-control"
          style="white-space: pre-wrap; overflow-wrap: break-word;"
        ><?= esc($article->text) ?></textarea>
      </div>

    
      <div class="col-12 col-md-6">
        <label for="top" class="form-label fw-semibold">Top</label>
        <textarea 
          name="top"
          id="top"
          rows="2"
          class="form-control"
        ><?= esc($article->top) ?></textarea>
      </div>

     
      <div class="col-12 col-md-6">
        <label for="published" class="form-label fw-semibold">Published</label>
        <input 
          type="text"
          name="published"
          id="published"
          value="<?= esc($article->published) ?>"
          class="form-control"
        >
      </div>

      
      <div class="col-12">
        <label for="photo" class="form-label fw-semibold">Photo</label>
        <input 
            type="file" 
            name="photo_file" 
            id="photo" 
            class="form-control"
            accept="image/*">

        <?php if ($article->photo): ?>
            <div class="mt-2">
            <p class="mb-1">Current Image:</p>
            <img src="<?= base_url('assets/articles/' . $article->photo) ?>" 
                alt="<?= esc($article->title) ?>" 
                class="img-thumbnail" 
                style="max-width: 250px;">
            </div>
        <?php endif; ?>
        </div>

      
      <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-primary px-4 py-2">
          Save Changes
        </button>
      </div>

    </form>
  </div>
</div>

<?= $this->endSection() ?>
