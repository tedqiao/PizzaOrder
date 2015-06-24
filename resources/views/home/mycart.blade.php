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



