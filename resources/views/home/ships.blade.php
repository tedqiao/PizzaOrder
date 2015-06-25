@extends('master')

@section('left')

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
                    <a href="#"><?= $item->sname ?></a>
                </td>
                <td>
                    <span ><?= $item->hasModel ?></span>
                </td>
                <td>
                    <img class='img img-responsive' src="img/login.png" alt='Pix not found'>
                </td>
                <td>
                    <div class='col-sm-6 input-group navbar-right'>


                        <button  onclick="loadXMLDoc('<?= $item->sname ?>')" class='btn btn-sm btn-warning'>add</button>

                    </div>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
@endsection
@section('right')
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
                <td colspan="2">
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
    <strong><?= isset($_SESSION['total']) ? $_SESSION['total'] : 0 ?></strong>
    <span class=''>$</span>
</div>

@endsection
@stop