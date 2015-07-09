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
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #843534;height: 5%;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= url() ?>">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?= url('menu') ?>">menu</a></li>
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
                                <li><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#login">CheckOut</button></li>
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
                            <li><a href="<?= url('profile') ?>"><?= $obj->getName() ?></a></li>
                            <li><img class='img-circle' src="<?= $obj->getPhoto() ?>"></li>
                        <?php endif; ?>
                        <li>
                            <?php if(!isset($_SESSION['auth'])):?>
                            <a data-toggle="modal" data-target="#login">login</a>
                            <?php else:?>
                            <a class='' href="<?=url('logout')?>" >Log out</a>
                            <?php endif?>
                        </li>


                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        @yield('home')

        <div id='tbody'>
            <div  class='container'>

                <div id="aside" class='col-sm-2'>
                    @yield('aside')
                </div>
                @yield('main')

                <div id="res" class='col-sm-5'>
                    @yield('left')
                </div>

                <div id="mydiv" class='col-sm-4'>
                    @yield('right')

                </div>
            </div>

        </div>

        <div class="modal fade" id="Modal" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Place Order</h4>
                    </div>
                    <div id="check_out" class="modal-body">
                        <?php if (sizeof($_SESSION['cart']) !== 0): ?>
                            <form action='<?= url('placeOrder') ?>' method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Message:</label>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Message:</label>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="submit()">place order</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <label for="message-text" class="control-label">No items in your cart</label>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

        <div  class="modal fade" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel"id='login'>
            <div id='login-form'>
                <form action="" class="form-signin">
                    <h3 class="heading-desc">
                        <button type="button" data-dismiss="modal" class="close pull-right" aria-hidden="true">&times;</button>
                        Login</h3>
                    <div class="social-box">
                        <div class="row mg-btm">
                            <div class="col-md-12">
                                <a href="<?= url('login/fb') ?>" class="btn btn-primary btn-block">
                                    <i class="icon-facebook">&nbsp;&nbsp;&nbsp;Login with Facebook</i>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="main">

                        <input type="text" class="form-control" placeholder="Email" autofocus>
                        <input type="password" class="form-control" placeholder="Password">


                        <span class="clearfix"></span>
                    </div>
                    <div class="login-footer">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="left-section">
                                    <a href="">Forgot your password?</a>
                                    <a href="<?= url('register') ?>">Sign up now</a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6 pull-right">
                                <button type="submit" class="btn btn-large btn-danger pull-right">Login</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </body>
    <footer>

        <p>&copy; Company | Privacy | Terms</p>

    </footer>

</html>