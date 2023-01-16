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
                <form action="<?= base_url('backend/banner/create'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="link">URL</label>
                            <input type="url" name="link" class="form-control">
                            <?php echo form_error('link', '<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                            <?php echo form_error('title', '<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <?php echo form_error('image','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                            <?php echo form_error('description', '<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <br>
                            <select class="custom-select form-control" id="location" name="location">
                                <?php foreach ($locations as $key=>$value):?>
                                <option value="<?=$value->id?>"><?=$value->title?></option>
                                <?php endforeach;?>
                            </select>
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