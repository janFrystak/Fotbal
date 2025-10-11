<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>



<div class="container py-4">
  <h2 class="mb-4 text-center">
    <?= $league->name . " " . $season->start . '/' . $season->finish ?>
  </h2>

  <table class="table table-striped table-hover text-center align-middle">
    <thead class="table-primary">
      <tr>
        <th>Home </th>
        <th>Score</th>
        <th>Away </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($games as $game): 
            $g_home = $game->goals_home;
            $g_away = $game->goals_away;
            ?>
        
        <tr>
        <td <?php if($g_home > $g_away): ?> class="table-success" <?php elseif($g_home == $g_away):?> class="table-warning" <?php else: ?> class="table-danger" <?php endif ?>>
            <div class="d-flex align-items-center justify-content-start gap-2">
            <img 
                src="<?= base_url('assets/logos/' . $game->home_logo) ?>" 
                alt="<?= esc($game->home_name) ?> logo"
                style="width: 28px; height: 28px;"
            >
            <span><?= esc($game->home_name) ?></span>
            </div>
        </td>

        <td class = "table-primary">
            <a href="#" data-bs-toggle="modal" data-bs-target="#statsModal<?= $game->id ?>">
            <?= esc($game->goals_home) ?> : <?= esc($game->goals_away) ?>
            </a>
        </td>

        <td <?php if($g_home < $g_away): ?> class="table-success" <?php elseif($g_home == $g_away):?> class="table-warning" <?php else: ?> class="table-danger" <?php endif ?>>
            <div class="d-flex align-items-center justify-content-end gap-2">
            <span><?= esc($game->away_name) ?></span>
            <img 
                src="<?= base_url('assets/logos/' . $game->away_logo) ?>" 
                alt="<?= esc($game->away_name) ?> logo"
                style="width: 28px; height: 28px; "
            >
            </div>
        </td>
        </tr>


        
        <div class="modal fade" id="statsModal<?= $game->id ?>" tabindex="-1" aria-labelledby="statsLabel<?= $game->id ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="statsLabel<?= $game->id ?>">
                  <?= esc($game->home_name) ?> vs <?= esc($game->away_name) ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-start">
                <p><strong>Date</strong> <?= ($game->date ?? 'unknown') ?></p>
                <p><strong>Time</strong> <?= esc($game->time ?? 'unknown') ?></p>
                <p><strong>Stadium:</strong> <?= esc($game->stadium ?? 'unknown') ?></p>
                <p><strong>Viewers:</strong> <?= esc($game->attendance ?? 'unknown') ?></p>
                <p><strong>Half-time Score:</strong> <?= esc($game->ht_goals_home . ' : '. $game->ht_goals_away ?? 'Unknown') ?></p>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<?= $this->endSection() ?>
