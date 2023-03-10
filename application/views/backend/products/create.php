<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid pt-3">
            <?php
            errorAlert();
            successAlert();
            ?>
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title"><?=$title?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/products/create'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                            <?php echo form_error('title', '<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control">
                            <?php echo form_error('slug', '<span class =text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" min="0">
                            <?php echo form_error('quantity','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0">
                            <?php echo form_error('price','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sales_prices">Sales prices</label>
                            <input type="number" name="sales_prices" class="form-control" step="0.01" min="0">
                            <?php echo form_error('sales_prices','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <br>
                            <select class="custom-select form-control" id="brand" name="brand">
                                <?php foreach($lists as $list): ?>
                                <option value="<?= $list->id; ?>"><?= $list->title; ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <br>
                            <select class="custom-select form-control" id="category" name="category">
                                <?php categoryTree(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Main image</label>
                            <input type="file" name="main" class="form-control">
                            <?php echo form_error('main','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" multiple name="images[]" class="form-control">
                            <?php echo form_error('images','<span class = text-danger >','</span>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" cols="30" rows="3"  class="form-control"></textarea>
                            <?php echo form_error('description','<span class = text-danger >','</span>'); ?>
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