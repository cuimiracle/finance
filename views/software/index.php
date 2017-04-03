<!-- 下载内容 -->
<div class="container-fluid mrt30 software">
    <div class="row">
        <?php
        if(!empty($contents)){
            foreach($contents as $k => $v) {
                if($k % 2 == 0){
        ?>
        <div class="col-sm-6 col-md-4 animated" data-animation="slideInDown" data-animation-delay="700">
            <div class="thumbnail">
                <img src="<?=$v['photo']?>">
                <div class="caption">
                    <h3><?=$v['title']?></h3>
                    <p class="desc"><?=$v['content']?></p>
                    <p class="text-center"><a href="<?=$v['link_url']?>" class="btn btn-primary" role="button"><?=$v['link_name']?></a></p>
                </div>
            </div>
        </div>
        <?php   }else{   ?>
        <div class="col-sm-6 col-md-4 animated" data-animation="slideInUp" data-animation-delay="700">
            <div class="thumbnail">
                <img src="<?=$v['photo']?>">
                <div class="caption">
                    <h3><?=$v['title']?></h3>
                    <p class="desc"><?=$v['content']?></p>
                    <p class="text-center"><a href="<?=$v['link_url']?>" class="btn btn-primary" role="button"><?=$v['link_name']?></a></p>
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

