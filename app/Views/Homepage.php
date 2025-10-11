<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<p><?= "logged in: ".var_dump($loggedIn). " | session: ".var_dump(session()->get()) ?></p>
<h1><?= $currentUser ?></h1>
    <?php if(!empty($articles)): ?>
    <div class="row mt-4">
        <div class="col-12 col-md-6 mb-4">
            <?php $mainArticle = array_shift($articles); ?>
            <div class="ratio ratio-4x3 position-relative overflow-hidden rounded">
                    <div class="position-absolute top-0 start-0 w-100 h-100" 
                         style="background-size: cover; background-position: center; 
                                background-image: url('<?= base_url('assets/articles/' . $mainArticle->photo) ?>');">
                    </div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex flex-column justify-content-center align-items-start text-white p-4">
                    <a href="<?= base_url('article/' . $mainArticle->id) ?>" 
                       class="fw-bold fs-3 text-white text-decoration-none">
                        <?= esc($mainArticle->title) ?>
                    </a>
                    <div class="mt-3 fs-5"><?= date('d.m.Y', $mainArticle->date ) ?></div>
                    
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-4">
            <div class="d-flex flex-wrap gap-3">
                <?php foreach ($articles as $article): ?>
                    <div class="ratio ratio-1x1 position-relative overflow-hidden rounded" style="width: 100%; max-width: 230px;">
                            <div class="position-absolute top-0 start-0 w-100 h-100" 
                                 style="background-size: cover; background-position: center; 
                                        background-image: url('<?= base_url('assets/articles/' . $article->photo) ?>');">
                            </div>
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex flex-column justify-content-center align-items-start text-white p-3">
                            <a href="<?= base_url('article/' . $article->id) ?>" 
                               class="fw-bold fs-6 text-white text-decoration-none">
                                <?= esc($article->title) ?>
                            </a>
                            <div class="mt-2 fs-6"><?= date('d.m.Y', $article->date) ?></div>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>





<?= $this->endSection() ?>