@extends('master')

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
                                <input name='item_num' class="form-control" type='text' value='1'/>
                                <span class="input-group-btn">
                                    <button  onclick="loadXMLDoc('<?=$ship->sname?>')" class='btn btn-default'>add</button>
                                </span>
                            </div>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
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
                                            <button onclick="rm('<?=$item?>') "class='btn btn-default' >cancel</button>
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