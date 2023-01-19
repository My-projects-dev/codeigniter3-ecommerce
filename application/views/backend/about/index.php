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

                <form action="<?= base_url('backend/aboutus/'); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="text-center">
                            <?php if (!empty($about->image)):?>
                            <img src="<?= base_url($about->image); ?>" alt="" width="300" height="300">
                            <input type="hidden" name="old_image" value="<?= $about->image ?? ''; ?>">
                            <?php endif;?>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <?php echo form_error('image', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $about->title ?? ''; ?>">
                            <?php echo form_error('title', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" cols="30" rows="3" class="form-control"><?= $about->description ?? ''; ?></textarea>
                            <?php echo form_error('description', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0" <?php if (!empty($about->status )){echo ($about->status == 0) ? 'selected' : '';} ?>>Non-Active
                                </option>
                                <option value="1" <?php if (!empty($about->status )){echo ($about->status == 1) ? 'selected' : '';} ?>>Active</option>
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