<?php

use App\fb_user;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/mycss.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/js/home.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" id="fixed" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= url() ?>">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">menu</a></li>
                        <li><a href="#">CheckOut</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--<li><a href="<?= url('/cart') ?>">Cart</a></li>-->
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" action="<?= url() ?>" method="POST" role="search">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <?php $_SESSION['csr'] = csrf_token(); ?>
                        <div class="form-group">
                            <input type='text' class='form-control' name='search' placeholder="Type name">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type='submit' value='go'>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (isset($_SESSION['user'])):
                            $obj = unserialize($_SESSION['user']);
                            ?>
                            <li><img class='img-circle' src="<?= $obj->getPhoto() ?>"></li>
                        <?php endif; ?>
                        <li>
                            <?php if(!isset($_SESSION['auth'])):?>
                            <button data-toggle="modal" data-target="#login">login</button>
                            <?php else:?>
                            <a class='' href="<?= !isset($_SESSION['auth']) ? url('login') : url('logout') ?>"><?= isset($_SESSION['auth']) ? 'Log out' : 'Login' ?></a>
                            <?php endif?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

                    @yield('content')
             
    </body>

</html>