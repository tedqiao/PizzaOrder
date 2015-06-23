@extends('master')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-sm-6'>
            <table class='table table-hover'>
                <tr>
                    <td>
                        <h3>Name</h3>
                    </td>
                    <td>
                        <h3>Model</h3>
                    </td>
                </tr>
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
                                    <button class="btn btn-default" type="button" onclick="alert('ok')">Add</button>
                                </span>
                            </div>
                        </td>
                        <td>
                            <a class='btn btn-primary' href="<?= url('order/' . $ship->sname) ?>">order</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>


    </div>
</div>
@stop