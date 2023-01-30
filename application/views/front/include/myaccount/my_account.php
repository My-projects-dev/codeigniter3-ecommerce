<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">My Account</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h2 class="title">My Account</h2>
            <p class="lead">Hello, <strong><?= $account->surname . ' ' . $account->name ?></strong> - To update your
                account information.</p>
            <form action="<?=base_url('my_account/')?>" method="post">
                <div class="row">
                    <?php
            errorAlert();
            successAlert();
            ?>
                    <div class="col-sm-6">
                        <fieldset id="personal-details">
                            <legend>Personal Details</legend>
                            <div class="form-group required">
                                <label for="input-firstname" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="input-firstname" placeholder="First Name"
                                       value="<?= $account->name ?>" name="firstname">
                                <?php echo form_error('firstname', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="input-lastname" placeholder="Last Name"
                                       value="<?= $account->surname ?>" name="lastname">
                                <?php echo form_error('lastname', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="control-label">Telephone</label>
                                <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone"
                                       value="<?= $account->phone ?>" name="telephone">
                                <?php echo form_error('telephone', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="input-fax" class="control-label">Fax</label>
                                <input type="text" class="form-control" id="input-fax" placeholder="Fax"
                                       value="<?= $account->fax ?>" name="fax">
                                <?php echo form_error('fax', '<span class = text-danger >', '</span>'); ?>
                            </div>
                        </fieldset>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Change Password</legend>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Old Password</label>
                                <input type="password" class="form-control" id="input-password"
                                       placeholder="Old Password" value="" name="old-password">
                                <?php echo form_error('old-password', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">New Password</label>
                                <input type="password" class="form-control" id="input-password"
                                       placeholder="New Password" value="" name="password">
                                <?php echo form_error('password', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">New Password Confirm</label>
                                <input type="password" class="form-control" id="input-confirm"
                                       placeholder="New Password Confirm" value="" name="confirm">
                                <?php echo form_error('confirm', '<span class = text-danger >', '</span>'); ?>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Newsletter</legend>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
                                <div class="col-md-10 col-sm-9 col-xs-9">
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="newsletter"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" checked="checked" value="0" name="newsletter"> No
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <fieldset id="address">
                            <legend>Payment Address</legend>
                            <div class="form-group">
                                <label for="input-company" class="control-label">Company</label>
                                <input type="text" class="form-control" id="input-company" placeholder="Company"
                                       value="<?= $account->company ?>" name="company">
                                <?php echo form_error('company', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-address-1" class="control-label">Address 1</label>
                                <input type="text" class="form-control" id="input-address-1" placeholder="Address 1"
                                       value="<?= $account->address1 ?>" name="address_1">
                                <?php echo form_error('address_1', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-address-1" class="control-label">Address 2</label>
                                <input type="text" class="form-control" id="input-address-1" placeholder="Address 1"
                                       value="<?= $account->address2 ?>" name="address_2">
                                <?php echo form_error('address_2', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-city" class="control-label">City</label>
                                <input type="text" class="form-control" id="input-city" placeholder="City"
                                       value="<?= $account->city ?>" name="city">
                                <?php echo form_error('city', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-postcode" class="control-label">Post Code</label>
                                <input type="text" class="form-control" id="input-postcode" placeholder="Post Code"
                                       value="<?= $account->post_code ?>" name="postcode">
                                <?php echo form_error('postcode', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-country" class="control-label">Country</label>
                                <select class="form-control" id="input-payment-country"" name="country_id">
                                    <option value=""> --- Please Select ---</option>
                                    <?php foreach ($country as $key => $value): ?>
                                        <option value="<?= $value->id ?>"><?= $value->country_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('country_id', '<span class = text-danger >', '</span>'); ?>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="control-label">Region / State</label>
                                <select class="form-control" id="input-payment-zone" name="zone_id">
                                    <option value=""> --- Please Select ---</option>
                                    <?php foreach ($region as $key => $value): ?>
                                        <option value="<?= $value->id ?>"><?= $value->region_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('zone_id', '<span class = text-danger >', '</span>'); ?>
                            </div>
                        </fieldset>
                    </div>
                </div>


                <div class="buttons clearfix">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End-->
    </div>
</div>
<!-- //Main Container -->