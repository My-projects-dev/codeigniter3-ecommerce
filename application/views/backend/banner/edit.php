<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid pt-3">
            <?php
            errorAlert();
            successAlert();
            ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><?= $title ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/banner/edit/' . $item->id); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="link">URL</label>
                            <input type="url" name="link" class="form-control" value="<?= $item->link; ?>">
                            <?php echo form_error('link', '<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $item->title; ?>">
                            <?php echo form_error('title', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <lebel><strong>Image</strong></lebel>
                            <div class="">
                                <img src="<?= base_url($item->image); ?>" alt="" width="100" height="100">
                                <input type="hidden" name="old_image" value="<?= $item->image; ?>">
                            </div>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= $item->description; ?></textarea>
                            <?php echo form_error('description', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0" <?php echo ($item->status == 0) ? 'selected' : '' ?>>Non-Active
                                </option>
                                <option value="1" <?php echo ($item->status == 1) ? 'selected' : '' ?>>Active</option>
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