<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid pt-3">
            <?php
            errorAlert();
            successAlert();
            ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><?=$title?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/region/create'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Select Country Name</label>
                            <br>

                            <select class="custom-select form-control" id="Status" name="country_name">
                                <option>Choose country name</option>
                                <?php foreach ($list as $key=>$value): ?>
                                <option value="<?= $value->id;?>"><?= $value->country_name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Region name</label>
                            <input type="text" name="region_name" class="form-control" placeholder="Enter region name">
                            <?php echo form_error('region_name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0">Non-Active</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>