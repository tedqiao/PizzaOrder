@extends('master')

@section('content')
<div class='container'>
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
    if (isset($_SESSION['cart']))
        $items = array_keys($_SESSION['cart']);
    foreach ($items as $item):
        ?>
        <tr>
            <td>
                <?=$item?>
            </td>
            <td>
                <?=$_SESSION['cart'][$item]?>
            </td>
            <td>
                <a class='btn btn-default' href="<?=url("rm/$item")?>">cancel</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
</div>

@stop

