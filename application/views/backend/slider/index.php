<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid pt-3">
            <?php
            errorAlert();
            successAlert();
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?=$title?></h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <a href="<?= base_url('backend/slider/create'); ?>"
                                           class="btn btn-primary float-right">
                                            Create
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Image</th>
                                    <th>Background</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($lists as $item) : ?>
                                        <tr>
                                            <td><?= $item->title; ?></td>
                                            <td><?= $item->message; ?></td>
                                            <td><img src="<?= base_url($item->image); ?>" alt="" height="100" width="100"></td>
                                            <td><img src="<?= base_url($item->background); ?>" alt="" height="100" width="100"></td>
                                            <td><?= ($item->status == 1) ? "Aktiv" : "Passiv"; ?></td>
                                            <td style="display:flex;column-gap:5px;">
                                            <a href="<?= base_url('backend/slider/edit/'.$item->id); ?>" title="Edit"
                                               class="btn btn-sm btn-primary pull-right">
                                                <i class="voyager-paper-plane">Edit</i>
                                            </a>
                                            <a href="<?= base_url('backend/slider/delete/'.$item->id); ?>"
                                               title="Delete"
                                               class="btn btn-sm btn-danger pull-right">
                                                <i class="voyager-paper-plane">Delete</i>
                                            </a>
                                        </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
</div>
