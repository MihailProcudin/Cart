<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="#"><?php echo SITENAME ?></a>

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'cart') || $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?> " href="#">Shoping List</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0">
                    <i class="fas fa-shopping-cart"></i> <span class="badge badge-dark"><?php echo $data['totalItems'] ?></span>
                </button>
                <form action='cart/clearState'>
                    <button type="submit" class="btn btn-danger my-2 my-sm-0">
                        Reset State
                    </button>
                </form>
            </div>
        </div>
    </div>

</nav>
