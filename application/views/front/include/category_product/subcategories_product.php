<!--- Subcategories - -->
<div class="refine-search form-group">
    <div class="row">
        <?php foreach ($subCategoriesProduct as $key=>$value): ?>
        <div class="form-group col-md-15 col-sm-4 col-xs-12 ">
            <a href="<?= base_url('product/'.$value->id); ?>" class="thumbnail"><img
                        src="<?= base_url($value->image); ?>"
                        alt="<?= $value->title;?>" style="height: 130px;"></a> <a href="<?= base_url('product/'.$value->id); ?>"><?= $value->title;?></a>
        </div>
        <?php if ($key == 4){break;}
        endforeach;?>
    </div>
</div>
<!---//Subcategories - -->