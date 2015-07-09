<?php if (isset($_SESSION['auth'])) : ?>
    <?php if (sizeof($_SESSION['cart']) !== 0): ?>
        <form action='<?= url('placeOrder') ?>' method="POST">

            <div class="form-group">
                <label for="message-text" class="control-label">your address</label>
                <input type="text" class="form-control" id="add" name="add" value="<?=(isset($_COOKIE['addr'])?$_COOKIE['addr']:'')?>">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">phone number</label>
                <input type="text" class="form-control" id="pho" name="pho" value="<?=(isset($_COOKIE['pho'])?$_COOKIE['pho']:'')?>">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Total: <?= (int) $_SESSION['total'] * 0.9 . ' $' ?></label>
                <input type="hidden" class="form-control" id="bill" name="bill" value="<?= $_SESSION['total'] * 0.9 ?>">
                <label class="radio-inline"><input type="radio" name="optradio" value='Pick up' checked="">Pick up</label>
                <label class="radio-inline"><input type="radio" value='Delivery' name="optradio">Delivery</label>
            </div>
            <div class="modal-footer">


                <button type="button" class="btn btn-primary" onclick="submit()">place order</button>
            </div>
        </form>
    <?php else: ?>
        <label for="message-text" class="control-label">No items in your cart</label>
    <?php endif; ?>
<?php else: ?>
    <?php if (sizeof($_SESSION['cart']) !== 0): ?>
        <form action='<?= url('placeOrder') ?>' method="POST">
            <div class="form-group">

            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Name</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">your address</label>
                <input type="text" class="form-control" id="add" name="add">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">phone number</label>
                <input type="text" class="form-control" id="pho" name="pho">
            </div>
            <div class="form-group">
                <label for="message-text" class="control-label">Total: <?= (int) $_SESSION['total'] . ' $' ?></label>
                <label style="color:red" class="control-label">Login to get 10% discount</label>
                <input type="hidden" class="form-control" id="bill" name="bill" value="<?= $_SESSION['total'] ?>">
                <label class="radio-inline"><input type="radio" name="optradio" value='Pick up' checked="">Pick up</label>
                <label class="radio-inline"><input type="radio" value='Delivery' name="optradio">Delivery</label>
            </div>
            <div class="modal-footer">
                <a href="<?= url('login/fb') ?>" class="btn btn-default" >Login with facebook</a>
                <button type="button" class="btn btn-primary" onclick="submit()">place order</button>
            </div>
        </form>
    <?php else: ?>
        <label for="message-text" class="control-label">No items in your cart</label>
    <?php endif; ?>
<?php endif; ?>