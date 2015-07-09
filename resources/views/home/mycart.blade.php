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
<hr>
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
    <button onclick="check_out()" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal">CheckOut</button>
</div>