<div class="container">
<?php foreach ($category as $key=>$value):?>
<div style=" padding: 3px; margin-bottom: 2px; background: #ff5e00; ">
    <a href="<?=base_url("category/".$value->slug)?>"><h4 style="color: #fff3cd; "><?= $value->title?></h4></a>
</div>
<?php endforeach;?>
</div>