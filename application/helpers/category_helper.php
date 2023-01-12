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

?>
