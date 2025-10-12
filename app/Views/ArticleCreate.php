<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="mx-auto bg-white rounded-2xl shadow-lg p-5 p-md-6" style="max-width: 800px;">
    <h1 class="h3 fw-bold text-primary mb-4 border-bottom pb-2"> Create Article</h1>

    <form action="<?= site_url('article/create') ?>" method="post" enctype="multipart/form-data" class="row g-4">

      <!-- Title -->
      <div class="col-12">
        <label for="title" class="form-label fw-semibold">Title</label>
        <input 
          name="title" 
          id="title" 
          type="text" 
          class="form-control" 
          required
        >
      </div>

      <!-- Text -->
      <div class="col-12">
        <label for="text" class="form-label fw-semibold">Text</label>
        <textarea 
          name="text" 
          id="text" 
          rows="8" 
          class="form-control" 
          style="white-space: pre-wrap; overflow-wrap: break-word;" 
          required
        ></textarea>
      </div>

      <!-- Top -->
      <div class="col-12 col-md-6">
        <label for="top" class="form-label fw-semibold">Top</label>
        <textarea 
          name="top" 
          id="top" 
          rows="2" 
          class="form-control"
        ></textarea>
      </div>

      <!-- Published -->
      <div class="col-12 col-md-6">
        <label for="published" class="form-label fw-semibold">Published</label>
        <input 
          type="text" 
          name="published" 
          id="published" 
          class="form-control"
        >
      </div>

      <!-- Date -->
      <div class="col-12 col-md-6">
        <label for="date" class="form-label fw-semibold">Date</label>
        <input 
          type="date" 
          name="date" 
          id="date" 
          class="form-control"
        >
      </div>

      <!-- Photo Upload -->
      <div class="col-12 col-md-6">
        <label for="photo_file" class="form-label fw-semibold">Photo</label>
        <input 
          type="file" 
          name="photo_file" 
          id="photo_file" 
          class="form-control" 
          accept="image/*"
        >
        <small class="text-muted">Choose an image to upload (optional)</small>
      </div>

      <!-- Submit -->
      <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-primary px-4 py-2">
          Save Article
        </button>
      </div>

    </form>
  </div>
</div>

<?= $this->endSection() ?>
