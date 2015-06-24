

@extends('master')

@section('login')

<div class="fixed" id='login'>
    <div id='login-form'>
    <form action="" class="form-signin">
        <h3 class="heading-desc">
            <button type="button" onclick="show()" class="close pull-right" aria-hidden="true">&times;</button>
            Login</h3>
        <div class="social-box">
            <div class="row mg-btm">
                <div class="col-md-12">
                    <a href="<?= url('login/fb') ?>" class="btn btn-primary btn-block">
                        <i class="icon-facebook"></i> &nbsp;&nbsp;&nbsp;Login with Facebook
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-info btn-block" >
                        <i class="icon-twitter"></i> &nbsp;&nbsp;&nbsp;Login with Twitter
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

@endsection


@section('left')

<div class="fixed-size">
    <table class='table table-hover'>
        <tr>
            <td>
                <h3>Name</h3>
            </td>
            <td>
                <h3>Model</h3>
            </td>
        </tr>
        <?php if (isset($ship)): ?>
            <?php foreach ($ships as $ship): ?>
                <tr>
                    <td>
                        <a href="#"><?= $ship->sname ?></a>
                    </td>
                    <td>
                        <a href="#"><?= $ship->hasModel ?></a>
                    </td>
                    <td>
                        <div class='col-sm-6 input-group navbar-right'>
                            <input id='item_num' class="form-control" type='text' value='1'/>
                            <span class="input-group-btn">
                                <a class='btn btn-default' href="<?= url('order/' . $ship->sname) ?>">add</a>
                            </span>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif ?>
    </table>
</div>
@endsection
@section('right')
<table class='table table-hover'>
    <tr>
        <td>
            <h3>items</h3> 
        </td>
        <td>
            <h3>number </h3>
        </td>
    </tr>
    <?php
    if (isset($_SESSION['cart'])):
        if (sizeof($_SESSION['cart']) !== 0):
            $items = array_keys($_SESSION['cart']);
            foreach ($items as $item):
                ?>
                <tr>
                    <td>
                        <?= $item ?>
                    </td>
                    <td>
                        <?= $_SESSION['cart'][$item] ?>
                    </td>
                    <td>
                        <a class='btn btn-default' href="<?= url("rm/$item") ?>">cancel</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>
                    <div class="alert alert-info" role="alert">
                        NO item in your cart
                    </div>
                </td>
            </tr>

        <?php endif ?>
    <?php endif; ?>
</table>
@endsection
@stop