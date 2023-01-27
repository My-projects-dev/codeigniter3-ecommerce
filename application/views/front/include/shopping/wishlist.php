<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="<?= base_url('home/') ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">My Wish List</a></li>
    </ul>

    <div class="row">
        <?php
        errorAlert();
        successAlert();
        ?>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <?php if (count($wishlist) > 0): ?>
                <h2 class="title">My Wish List</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Brand</td>
                            <td class="text-right">Stock</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($wishlist as $key => $value):?>
                            <tr>
                                <td class="text-center">
                                    <a href="<?= base_url('product/' . $value->slug) ?>"><img width="70px" height="70px"
                                                                                              src="<?= base_url($value->path); ?>"
                                                                                              alt="<?= $value->title ?>"
                                                                                              title="<?= $value->title ?>">
                                    </a>
                                </td>
                                <td class="text-left"><a
                                            href="<?= base_url('product/' . $value->slug) ?>"><?= $value->title ?></a>
                                </td>
                                <td class="text-left"><?= $value->brand ?></td>
                                <td class="text-right"><?= ($value->quantity > 0) ? 'In Stock' : 'Pre-Order'; ?></td>
                                <td class="text-right">
                                    <div class="price"> <?= $value->sales_prices ?> </div>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-primary"
                                       title="" data-toggle="tooltip"
                                       onclick="cart.add('48');"
                                       type="button" data-original-title="Add to Cart"
                                       href="<?= base_url('front/cart/add_cart_from_wishlist/' . $value->id) ?>"><i
                                                class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-danger" title="" data-toggle="tooltip"
                                       href="<?= base_url('front/wishlist/delete/' . $value->id) ?>"
                                       data-original-title="Remove"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <!--Middle Part End-->

    </div>
</div>
<!-- //Main Container -->