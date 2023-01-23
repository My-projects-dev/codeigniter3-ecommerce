<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="<?= base_url('home/') ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Shopping Cart</a></li>
    </ul>
    <?php
    errorAlert();
    successAlert();
    ?>
    <div class="row">
        <?php if (count((array)$cart) > 0): ?>
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">Shopping Cart</h2>
                <div class="table-responsive form-group">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart as $key => $value): ?>
                            <tr>
                                <td class="text-center"><a href="<?= base_url('product/' . $value->slug) ?>"><img
                                                width="70px" style="height: 70px" src="<?= base_url($value->path) ?>"
                                                alt="<?= $value->title ?>" title="<?= $value->title ?>"
                                                class="img-thumbnail"/></a></td>
                                <td class="text-left"><a
                                            href="<?= base_url('product/' . $value->slug) ?>"><?= $value->title ?></a><br/>
                                    <small>Reward Points: 1000</small></td>
                                <td class="text-left"><?= $value->brand ?></td>
                                <td class="text-left" width="200px">
                                    <form action="<?= base_url('front/cart/update_quantity/' . $value->id) ?>" method="post">
                                    <div class="input-group btn-block quantity">


                                            <input type="text" name="quantity" value="<?= $value->amount ?>" size="1" class="form-control"/>
                                            <?php echo form_error('quantity', '<span class = text-danger >', '</span>'); ?>
                                            <span class="input-group-btn">

                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary" $><i
                                    class="fa fa-refresh"></i></button>

                                        <a href="<?= base_url('front/cart/delete/' . $value->id) ?>" type="button"
                                           data-toggle="tooltip"
                                           title="Remove" class="btn btn-danger" onClick=""><i
                                                    class="fa fa-times-circle"></i></a>
                                        </span></div></form>
                                </td>
                                <td class="text-right"><?= $value->sales_prices ?></td>
                                <td class="text-right"><?= $value->sales_prices * $value->amount ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
<!--                            <tr>-->
<!--                                <td class="text-right"><strong>Sub-Total:</strong></td>-->
<!--                                <td class="text-right">$940.00</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>-->
<!--                                <td class="text-right">$4.00</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td class="text-right"><strong>VAT (20%):</strong></td>-->
<!--                                <td class="text-right">$188.00</td>-->
<!--                            </tr>-->
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right"><?=$total?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="buttons">
                    <div class="pull-left"><a href="<?= base_url('home/') ?>" class="btn btn-default">Continue
                            Shopping</a></div>
                    <div class="pull-right"><a href="<?= base_url('checkout/') ?>" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
        <?php endif; ?>
    </div>
</div>
<!-- //Main Container -->