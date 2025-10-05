<!Doctype html>
<html>
    <head>
        <title>Fotbal wooo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <?= $this->include("layout/assets");?> 
    </head>

    <body>
        
        <?php 
            $ionAuth = new \IonAuth\Libraries\IonAuth();
            $loggedIn = $ionAuth->loggedIn();
            $currentUser = $loggedIn ? $ionAuth->user()->row() : null;
        ?>
        
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
               
                <a class="navbar-brand" href="<?= base_url() ?>">Fotbal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav w-100 d-flex">
                        <?php foreach($navbar as $nav) : ?>
                            <?php if($nav->dropdown == 0 && $nav->admin == 0): ?> 
                                <li class="nav-item"><a class="nav-link" href="<?= base_url($nav->link) ?>"><?= $nav->title?></a></li>
                                
                            <?php elseif($nav->dropdown == 1): ?>
                                
                                    <li class="nav-item dropdown ms-auto">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $nav->title ?> 
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end p-4" style="width: 300px;">
                                    <?php if($loggedIn): ?>
                                        <form class="d-inline" method = "post" action="<?= base_url('logout') ?>">
                                            <button class="btn btn-danger w-100" type="submit" ">Logout</button>
                                        </form>
                                            <button class="btn btn-primary w-100">Edit</button>

                                    <?php else: ?>
                                        <form method="post" action="<? base_url('login')?>" class="d-inline">
                                            <div class="mb-3">
                                                <label for="loginAdmin" class="form-label">Username</label>
                                                <input type="text" class="form-control" name = "admin" id="admin" placeholder="admin">
                                            </div>
                                            <div class="mb-3">
                                                <label for="loginPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" name = "password" id="password" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                        </form>
                                    <?php endif ?>
                                    </div>
                                </li>
                            <?php endif ?>
                        <?php endforeach; ?>

                      
                    </ul>
                </div>
            </div>
        </nav>


        
    <div class="container">
        <?= $this->renderSection("content");?>
    </div>
        
    </body>
</html>