<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="<?= base_url('home/') ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Checkout</a></li>

    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <?php
            errorAlert();
            successAlert();
            ?>
            <h2 class="title">Checkout</h2>
            <div class="row">
                <form action="<?= base_url('front/checkout/insert') ?>" method="post">
                    <?php if (!$this->session->has_userdata('userloggedin')): ?>
                        <div class="col-sm-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="account">
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="control-label">First
                                                Name</label>
                                            <input type="text" class="form-control" id="input-payment-firstname"
                                                   placeholder="First Name" value="" name="firstname">
                                            <?php echo form_error('firstname', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-lastname" class="control-label">Last Name</label>
                                            <input type="text" class="form-control" id="input-payment-lastname"
                                                   placeholder="Last Name" value="" name="lastname">
                                            <?php echo form_error('lastname', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-email" class="control-label">E-Mail</label>
                                            <input type="text" class="form-control" id="input-payment-email"
                                                   placeholder="E-Mail" value="" name="email">
                                            <?php echo form_error('email', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-telephone" class="control-label">Telephone</label>
                                            <input type="text" class="form-control" id="input-payment-telephone"
                                                   placeholder="Telephone" value="" name="telephone">
                                            <?php echo form_error('telephone', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-payment-fax" class="control-label">Fax</label>
                                            <input type="text" class="form-control" id="input-payment-fax"
                                                   placeholder="Fax"
                                                   value="" name="fax">
                                            <?php echo form_error('fax', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="address" class="required">
                                        <div class="form-group">
                                            <label for="input-payment-company" class="control-label">Company</label>
                                            <input type="text" class="form-control" id="input-payment-company"
                                                   placeholder="Company" value="" name="company">
                                            <?php echo form_error('company', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                                            <input type="text" class="form-control" id="input-payment-address-1"
                                                   placeholder="Address 1" value="" name="address_1">
                                            <?php echo form_error('address_1', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-payment-address-2" class="control-label">Address 2</label>
                                            <input type="text" class="form-control" id="input-payment-address-2"
                                                   placeholder="Address 2" value="" name="address_2">
                                            <?php echo form_error('address_2', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-city" class="control-label">City</label>
                                            <input type="text" class="form-control" id="input-payment-city"
                                                   placeholder="City"
                                                   value="" name="city">
                                            <?php echo form_error('city', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-postcode" class="control-label">Post Code</label>
                                            <input type="text" class="form-control" id="input-payment-postcode"
                                                   placeholder="Post Code" value="" name="postcode">
                                            <?php echo form_error('postcode', '<span class = text-danger >', '</span>'); ?>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-country" class="control-label">Country</label>
                                            <select class="form-control" id="input-payment-country" name="country_id">
                                                <option value=""> --- Please Select ---</option>
                                                <?php foreach ($country as $key => $value): ?>
                                                    <option value="<?= $value->id ?>"><?= $value->country_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-zone" class="control-label">Region / State</label>
                                            <select class="form-control" id="input-payment-zone" name="zone_id">
                                                <option value=""> --- Please Select ---</option>
                                                <!--                                        --><?php //foreach ($region as $key => $value): ?>
                                                <!--                                            <option value="-->
                                                <?php //=$value->id?><!--">-->
                                                <?php //=$value->region_name?><!--</option>-->
                                                <!--                                        --><?php //endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked" value="1"
                                                       name="shipping_address">
                                                My delivery and billing addresses are the same.</label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-8">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>Please select the preferred shipping method to use on this order.</p>
                                        <?php foreach ($deliveries as $key => $value): ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="delivery"
                                                           value="<?= $value->id ?>">
                                                    <?= $value->title ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>Please select the preferred payment method to use on this order.</p>
                                        <?php foreach ($payments as $key => $value): ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" value="<?= $value->id ?>"
                                                           name="payment"><?= $value->title ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <?php if ($cart): ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td class="text-center">Image</td>
                                                        <td class="text-left">Product Name</td>
                                                        <td class="text-left">Quantity</td>
                                                        <td class="text-right">Unit Price</td>
                                                        <td class="text-right">Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($cart as $key => $value): ?>
                                                        <tr>
                                                            <td class="text-center"><a
                                                                        href="<?= base_url('product/' . $value->slug) ?>"><img
                                                                            width="60px"
                                                                            src="<?= base_url($value->path) ?>"
                                                                            alt="<?= $value->title ?>"
                                                                            title="<?= $value->title ?>"
                                                                            class="img-thumbnail"></a>
                                                            </td>
                                                            <td class="text-left"><a
                                                                        href="<?= base_url('product/' . $value->slug) ?>"><?= $value->title ?></a>
                                                            </td>
                                                            <td class="text-left">
                                                                    <div class="input-group btn-block"style="min-width: 100px;">
                                                                        <input type="text" name="quantity" id="checkout-quantity"
                                                                               value="<?= $value->amount ?>" size="1"
                                                                               class="form-control">
                                                                        <span class="input-group-btn">
											<button type="button" data-toggle="tooltip" title="Update" id="update-quantity" data-id="<?=$value->id?>"
                                                    class="btn btn-primary"><i class="fa fa-refresh"></i></button>
											<a href="<?= base_url('front/cart/delete/' . $value->id) ?>" type="button"
                                               data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i
                                                        class="fa fa-times-circle"></i></a>
											</span>
                                                                    </div>
                                                            </td>
                                                            <td class="text-right"><?= $value->sales_prices ?></td>
                                                            <td class="text-right"><?= $value->sales_prices * $value->amount ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <!--									  <tr>-->
                                                    <!--										<td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>-->
                                                    <!--										<td class="text-right">$750.00</td>-->
                                                    <!--									  </tr>-->
                                                    <!--									  <tr>-->
                                                    <!--										<td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>-->
                                                    <!--										<td class="text-right">$5.00</td>-->
                                                    <!--									  </tr>-->
                                                    <!--									  <tr>-->
                                                    <!--										<td class="text-right" colspan="4"><strong>Eco Tax (-2.00):</strong></td>-->
                                                    <!--										<td class="text-right">$4.00</td>-->
                                                    <!--									  </tr>-->
                                                    <!--									  <tr>-->
                                                    <!--										<td class="text-right" colspan="4"><strong>VAT (20%):</strong></td>-->
                                                    <!--										<td class="text-right">$151.00</td>-->
                                                    <!--									  </tr>-->
                                                    <tr>
                                                        <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                                        <td class="text-right"><?= $total ?></td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your
                                            Order
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                    <textarea rows="4" class="form-control" id="confirm_comment"
                                              name="comments"></textarea>
                                        <br>
                                        <label class="control-label" for="confirm_agree">
                                            <input type="checkbox" checked="checked" value="1" required=""
                                                   class="validate required" id="confirm_agree" name="confirm agree">
                                            <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span>
                                        </label>
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" id="button-confirm"
                                                       value="Confirm Order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--Middle Part End -->

    </div>
</div>
<!-- //Main Container -->