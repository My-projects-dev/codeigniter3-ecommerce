<?php

function categoryTree($parent=0, $parent_id = null, $sub_mark = '')
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getChild($parent_id);
    if ($query->num_rows() > 0) {
        while ($row = $query->unbuffered_row()) { ?>
            <option value="<?=$row->id ?>"<?php echo ($parent == $row->id) ? 'selected' : '' ?>><?=$sub_mark . $row->title ?></option>;
            <?php
            categoryTree($parent, $row->id, $sub_mark.'---' );
        }
    }
}


function category_tree($items = array(),$parent_id = null){
    $tree = array();
    for($i=0, $ni=count($items); $i < $ni; $i++){
        if($items[$i]->parent_id == $parent_id){
            $tree[$i]["id"]= $items[$i]->id;
            $tree[$i]["title"]= $items[$i]->title;
            $tree[$i]["url"]= $items[$i]->slug;
            $tree[$i]["childs"]= category_tree($items, $items[$i]->id);
        }
    }
    return $tree;
}


function homeCategoryTree($parent_id = null)
{
    $ci = &get_instance();
    $ci->load->model('Category_model', 'category_md');
    $query = $ci->category_md->getChild($parent_id);
    if ($query->num_rows() > 0):?>
        <ul class="megamenu">
            <?php while ($row = $query->unbuffered_row()): ?>

                <li class="item-vertical css-menu with-sub-menu hover">
                    <p class="close-menu"></p>
                    <a href="<?= base_url('category/'.$row->id); ?>" class="clearfix">
                        <strong>
                            <span><?= $row->title ?></span>
                            <?php if ($ci->category_md->getChild($row->id)->num_rows() > 0): ?>
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
    $query = $ci->category_md->getChild($parent_id);
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
                                                        <a href="<?= base_url('category/'.$row->id); ?>" class="main-menu"><?= $row->title ?>
                                                            <?php if ($ci->category_md->getChild($row->id)->num_rows() > 0): ?>
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
    $query = $ci->category_md->getChild($parent_id);
    if ($query->num_rows() > 0):
        if ($parent_id != null): ?>
            <ul>
                <?php while ($row = $query->unbuffered_row()): ?>
                    <li>
                        <a href="<?= base_url('category/'.$row->id); ?>" class="main-menu"><?= $row->title ?>
                            <?php if ($ci->category_md->getChild($row->id)->num_rows() > 0): ?>
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
