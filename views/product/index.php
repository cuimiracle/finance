<!-- 产品介绍 -->
<div class="container-fluid rela intros mrt30">
    <div class="intro-slider">
        <ul>
            <?php
            if(!empty($product_main)){
                foreach($product_main as $v) {
            ?>
            <li>
                <div class="text-center">
                    <img src="<?=$v['photo']?>">

                    <p><?=$v['content']?></p>
                    <a class="btn btn-success mrt30" href="<?=$v['link_url']?>"><?=$v['link_name']?></a>
                </div>
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>

<div class="container-fluid mrt30 product-box">
    <?php
    if(!empty($product_detail)){
        foreach($product_detail as $k => $v) {
            if($k % 2 == 0){
    ?>
    <div class="product-content mrt30">
        <div class="row">
            <div class="col-md-6 col-md-offset-1 desc">
                <p class="desc-title main-title">
                    <?=$v['title']?>
                </p>
                <div class="main-word">
                    <?=$v['content']?>
                </div>
                <div class="text-center mrt30">
                    <a class="text-primary" href="<?=$v['link_url']?>"><?=$v['link_name']?></a>
                </div>
            </div>
            <div class="col-md-4 pic text-center">
                <img src="<?=$v['photo']?>">
            </div>
        </div>
    </div>
    <?php   }else{   ?>
    <div class="product-content mrt30">
        <div class="row">
            <div class="col-md-4 col-md-offset-1 pic text-center">
                <img src="<?=$v['photo']?>">
            </div>
            <div class="col-md-6 desc">
                <p class="desc-title main-title">
                    <?=$v['title']?>
                </p>
                <div class="main-word">
                    <?=$v['content']?>
                </div>
                <div class="text-center mrt30">
                    <a class="text-primary" href="<?=$v['link_url']?>"><?=$v['link_name']?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    }
    ?>
</div>


