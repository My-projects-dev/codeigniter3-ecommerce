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
                <form action="<?= base_url('backend/products/edit/' . $item->id); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $item->title; ?>">
                            <?php echo form_error('title', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control"
                                   value="<?= $item->description; ?>">
                            <?php echo form_error('description', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="<?= $item->quantity; ?>">
                            <?php echo form_error('quantity', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0"
                                   value="<?= $item->price; ?>">
                            <?php echo form_error('price', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sales_prices">Sales prices</label>
                            <input type="number" name="sales_prices" class="form-control" step="0.01" min="0"
                                   value="<?= $item->sales_prices; ?>">
                            <?php echo form_error('sales_prices', '<span class = text-danger >', '</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <br>
                            <select class="custom-select form-control" id="brand" name="brand">
                                <?php foreach ($lists as $list): ?>
                                    <option value="<?= $list->id; ?>" <?php echo ($item->id == $list->id) ? 'selected' : '' ?> ><?= $list->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <br>
                            <select class="custom-select form-control" id="category" name="category">
                                <?php categoryTree($selected_category->categories_id); ?>
                            </select>
                        </div>

                        <?php foreach ($images as $key => $img): ?>
                            <div class="form-group">
                                <div class="">
                                    <input type="hidden" name="<?= 'img' . $key; ?>" value="<?= $img->path; ?>">
                                    <lebel>Main image</lebel>
                                    <input type="radio" name="main" value="<?= $key; ?>" <?= ($img->main == 1) ? 'checked' : ''; ?> class="mr-3">
                                    <img src="<?= base_url($img->path); ?>" alt="" width="100" height="100">
                                    <input type="hidden" name="<?= 'id' . $key; ?>" value="<?= $img->id; ?>">
                                    <a href="<?= base_url('backend/products/deleteImage/' . $item->id . '/' . $img->path); ?>"
                                           title="Delete"
                                           class="btn btn-sm btn-danger text-right">
                                            <i class="voyager-paper-plane">Delete image</i>
                                        </a>
                                </div>
                                <input type="file" name="<?= 'image' . $key; ?>" class="form-control">
                            </div>
                        <?php endforeach; ?>
                        <div class="form-group">
                            <label for="images">Yeni şəkil əlavə et</label>
                            <input type="file" multiple name="images[]" class="form-control">
                            <?php echo form_error('images', '<span class = text-danger >', '</span>'); ?>
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