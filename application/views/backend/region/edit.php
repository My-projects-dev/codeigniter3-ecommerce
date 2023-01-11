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
                <form action="<?= base_url('backend/region/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Select Country Name</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="country_name">
                                <?php foreach ($list as $key=>$value): ?>
                                <option value="<?= $value->id;?>" <?php echo ($value->id == $item->country_id) ? 'selected' : ''  ?>><?= $value->country_name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Region name</label>
                            <input type="text" name="region_name" class="form-control" value="<?= $item->region_name; ?>" placeholder="Enter Name">
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0" <?php echo  ($item->status == 0) ? 'selected' : ''  ?>>Non-Active</option>
                                <option value="1" <?php echo ($item->status == 1) ? 'selected' : ''  ?>>Active</option>
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