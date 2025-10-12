<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary"> Manage Articles</h2>
    <a href="<?= base_url('article/loadCreate') ?>" class="btn btn-success">
      + Create New Article
    </a>
  </div>

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle">
      <thead class="table-primary text-center">
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Photo</th>
          <th style="width: 120px;">Date</th>
          <th>Top</th>
          <th>Published</th>
          <th>Preview</th>
          <th>Edit</th>
          <th>Remove</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($articles as $a): ?>
          <tr>
            <td><?= $a->id ?></td>
            <td class="fw-semibold"><?= esc($a->title) ?></td>
            <td>
              <img 
                src="<?= base_url('assets/articles/' . $a->photo) ?>" 
                alt="<?= esc($a->title) ?>" 
                class="img-thumbnail" 
                style="width: 60px; height: 60px; object-fit: cover;">
            </td>
            <td><?= date('Y-m-d', strtotime($a->date)) ?></td>
            <td>
              <?php if ($a->top): ?>
                <span class="badge bg-warning text-dark">Top</span>
              <?php else: ?>
                <span class="badge bg-secondary">No</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($a->published): ?>
                <span class="badge bg-success">Yes</span>
              <?php else: ?>
                <span class="badge bg-danger">No</span>
              <?php endif; ?>
            </td>
            <td><?= mb_strimwidth($a->text, 0, 40, '...') ?></td>
            <td>
              <a href="<?= base_url('article/loadEdit/' . $a->id) ?>" class="btn btn-outline-primary btn-sm">
                ✏ Edit
              </a>
            </td>
            <td>
              <form action="<?= base_url('article/remove/' . $a->id) ?>" method="post" style="display:inline;">
                <button type="submit" class="btn btn-outline-danger btn-sm" 
                        onclick="return confirm('Are you sure you want to remove this article?')">
                  🗑 Remove
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>
