<!-- 要闻 -->
<div class="container-fluid news rela">
    <div class="news-bg"></div>
    <div class="row news-top mrt30">
        <div class="col-md-6 col-md-offset-1 news-main">
            <div class="news-title mrb30">业界动态</div>
            <?php
            if(!empty($industry_dynamics)) {
                foreach ($industry_dynamics as $v) {
            ?>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?=$v['photo']?>" style="width:100px;height:100px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$v['title']?></h4>
                        <?=$v['content']?>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="col-md-4">
            <div class="news-title mrb30">公司动态</div>
            <div class="news-wrapper">
                <ul class="list-unstyled">
                    <?php
                    if(!empty($company_dynamics)) {
                        foreach ($company_dynamics as $v) {
                    ?>
                    <li><?=$v['content']?></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row mrt30 mrb30">
        <div class="col-md-10 col-md-offset-1 mrb30">
            <div class="panel panel-default">
                <div class="panel-heading">公司新闻</div>
                <?php
                if(!empty($company_news)) {
                    foreach ($company_news as $v) {
                ?>
                <div class="panel-body">
                    <h5><?=$v['title']?></h5>
                    <?=$v['content']?>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>