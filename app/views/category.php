<?php 
    $products = $this->data['products'];
    $categories = $this->data['categories'];
?>
<?php include('layout/header.php') ?>
<div class="content">
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="product-list row">
                <?php foreach ($products as $key => $val ): ?>
                <div class="list-group-item col-md-4 item">
                    <div class="card">
                        <img src="<?=base_url('public/image/images.png');?>" >
                        <a href="<?=base_url($val['slug'])?>" class="item-price">
                            <?=$val['name']?>
                            <br>
                            Giá : <?php echo number_format( $val['price'],0,'', '.')." VNĐ"; ?>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="category-list">
                <ul class="list-group">
                    <?php foreach ($categories as $key => $val ): ?>
                    <li class="list-group-item"><a href="<?=base_url("category?s=".$val['slug'])?>"><?=$val['name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include('layout/footer.php') ?>