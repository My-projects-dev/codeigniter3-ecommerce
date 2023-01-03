<?php

function categoryTree($parent=0, $parent_id = null, $sub_mark = '')
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getParentId($parent_id);
    if ($query->num_rows() > 0) {
        while ($row = $query->unbuffered_row()) { ?>
            <option value="<?=$row->id ?>"<?php echo ($parent == $row->id) ? 'selected' : '' ?>><?=$sub_mark . $row->title ?></option>;
            <?php
            categoryTree($parent, $row->id, $sub_mark.'---' );
        }
    }
}

function homeCategoryTree($parent_id = null)
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getParentId($parent_id);
    if ($query->num_rows() > 0):?>
        <ul class="megamenu">
            <?php while ($row = $query->unbuffered_row()): ?>

                <li class="item-vertical css-menu with-sub-menu hover">
                    <p class="close-menu"></p>
                    <a href="#" class="clearfix">
                        <strong>
                            <span><?= $row->title ?></span>
                            <?php if ($ci->category_md->getParentId($row->id)->num_rows() > 0): ?>
                                <b class="fa fa-angle-right"></b>
                            <?php endif; ?>
                        </strong>
                    </a>

                    <?php homeCategory($row->id) ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php
    endif;
}


function homeCategory($parent_id)
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getParentId($parent_id);
    if ($query->num_rows() > 0):
        if ($parent_id != null) { ?>
            <div class="sub-menu" data-subwidth="30"
                 style="width: 270px; display: none; right: 0px;">
                <div class="content" style="display: none;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="categories ">
                                <div class="row">
                                    <div class="col-sm-12 hover-menu">
                                        <div class="menu">
                                            <ul>
                                                <?php while ($row = $query->unbuffered_row()): ?>
                                                    <li>
                                                        <a href="#" class="main-menu"><?= $row->title ?>
                                                            <?php if ($ci->category_md->getParentId($row->id)->num_rows() > 0): ?>
                                                                <b class="fa fa-angle-right"></b>
                                                            <?php endif; ?>
                                                        </a>

                                                        <?php homeCategory2($row->id); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    endif;
}

function homeCategory2($parent_id)
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getParentId($parent_id);
    if ($query->num_rows() > 0):
        if ($parent_id != null): ?>
            <ul>
                <?php while ($row = $query->unbuffered_row()): ?>
                    <li>
                        <a href="#" class="main-menu"><?= $row->title ?>
                            <?php if ($ci->category_md->getParentId($row->id)->num_rows() > 0): ?>
                                <b class="fa fa-angle-right"></b>
                            <?php endif; ?>
                        </a>
                        <?php homeCategory2($row->id); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif;
    endif;
}

?>
