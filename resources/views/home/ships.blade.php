@extends('master')
@section('aside')
<div id='side_bar' class="sidebar-nav">
    <ul>
        <li><Strong data-target=".dashboard-menu" class="nav-header" > Category</Strong></li>
        <li><ul class="dashboard-menu nav nav-list ">
                <li><a href=<?= url('category/Salads')?>></span> Salads</a></li>
                <li><a href=<?= url('category/Calzones')?>></span> Calzones</a></li>
                <li><a href=<?= url('category/Pizza')?>></span> Pizza</a></li>
                <li><a href=<?= url('category/ClubSandwich')?>></span> Club Sandwich</a></li>
                <li><a href=<?= url('category/Gyros')?>></span> Gyros</a></li>
            </ul></li>
        <li><a href="help.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help</a></li>

</div>

@endsection 
@section('left')
<div>
    <h1><?= isset($category)?$category:'All menu' ?></h1>
</div>
<div class="fixed-size">
    <table class='table table-striped'>
        <tr>
           
            <th>
                Name
            </th>
            <th>
                price
            </th>

        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
               
                <td>
                    <a href="#"><?= $item->iname ?></a>
                </td>
                <td>
                    <span ><?= $item->price ?></span>
                </td>

                <td>
                    <div class='col-sm-6 input-group navbar-right'>


                        <button  onclick="loadXMLDoc('<?= $item->iname ?>')" class='btn btn-sm btn-warning'>add</button>

                    </div>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
<hr>
@endsection
@section('right')
<div>
    <h1>Cart</h1>
</div>
<hr>
<div class="fixed-size2">
    <table class='table table-striped'>
        <tr>
            <th>
                items 
            </th>
            <th>
                number
            </th>
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
                            <button onclick="rm('<?= $item ?>')"class='btn btn-sm btn-danger' >cancel</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">
                        <div class="alert alert-info" role="alert">
                            NO item in your cart
                        </div>
                    </td>
                </tr>

            <?php endif ?>
        <?php endif; ?>
    </table>
</div>
<div id='total'>
    <label>SubTotal:</label>
    <strong><?= isset($_SESSION['total']) ? $_SESSION['total'] : 0 ?></strong>
    <span class=''>$</span>
</div>
<div id='total'>
    <label>Tax:</label>
    <strong>0.0</strong>
    <span class=''>$</span>
</div>
<div id='total'>
    <label>Total:</label>
    <strong><?= isset($_SESSION['total']) ? $_SESSION['total'] : 0 ?></strong>
    <span class=''>$</span>
</div>


<div style="margin-left: 35%;height: 50px">
    <button class="btn btn-primary">CheckOut</button>
</div>
@endsection
@stop