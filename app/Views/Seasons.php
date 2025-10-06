
<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>


<style>
    body {
      background: #f4f6f8;
      font-family: 'Segoe UI', sans-serif;
    }
    .season-card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      background: #fff;
      transition: transform 0.15s ease;
    }
    .season-card:hover {
      transform: translateY(-4px);
    }
    .season-header {
      background: linear-gradient(135deg, #1e90ff, #00bfff);
      color: white;
      padding: 5px 5px ;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }
    .pagination li {
  display: inline-block !important;
    }
  .page-item.active .page-link {
  background-color: #0d6efd;
  border-color: #0d6efd;
  color: white;
}
.season-card .form-select {
    padding: 0.5rem 1rem;          /* Add internal padding */
    font-size: 1rem;               /* Make text readable */
    border-radius: 12px;           /* Match card style */
    border: 1px solid #ced4da;     /* Subtle border */
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.075); /* Slight inset shadow */
    transition: all 0.15s ease;
}


   
    
</style>

<title>Seasons</title>

<div class="container py-5">
  <h1 class="mb-4 text-center">All Seasons</h1>

  <div class="row g-4">
    <?php foreach ($seasons as $season): ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card season-card h-100 shadow-sm">
          <div class="season-header bg-primary text-white p-2">
            <h4 class="mb-0">
              Season <?= esc($season['start']) ?>/<?= esc($season['end']) ?>
            </h4>
          </div>

          <div class="season-body p-3">
            <form>
              <label for="league-<?= $season['id'] ?>" class="form-label">Leagues</label>
              <select id="league-<?= $season['id'] ?>" class="form-select"
                      onchange="if(this.value) window.location.href=this.value;">
                <option value="">Available leagues</option>
                <?php foreach ($season['leagues'] as $league): ?>
                  <option value="<?= base_url('league/' . $league['id']) ?>">
                    <?= esc($league['name']) . " (Level: " . esc($league['level']) . ")" ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<nav class="mt-4">
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>
