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
      padding: 1rem 1.5rem;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }
    .season-body {
      padding: 1.5rem;
    }
    
</style>

<title>Seasons</title>
<div class="container py-5">
<h1 class="mb-4 text-center">All Seasons</h1>
<div class="row g-4">
<div class="col-12 col-md-6 col-lg-4"></div>
<?php foreach($seasons as $season): ?>

      <div class="card season-card h-100">
        <div class="season-header">
          <h4 class="mb-0">Season <?php $season->start?>/<?php $season->end ?></h4>
        </div>
        <div class="season-body">
          <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Leagues
            </button>
            <ul class="dropdown-menu w-100">
                <?php foreach($season['leagues'] as $league):?>
              <li><a class="dropdown-item" href="<?= base_url('league/'.$league->id) ?>"><?php $league->name ?></a></li>
             <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
   

  </div>
</div>
<?php endforeach ?>

<nav class="mt-4">
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>