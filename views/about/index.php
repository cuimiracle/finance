<!-- 关于我们内容 -->
<div class="container-fluid about">
    <div class="row about-title">
        <div class="col-md-offset-2 col-md-4">
            <p style="font-size: 30px;line-height: 15rem;margin-left:35px">全国领先，汇聚精英</p>
        </div>
        <div class="col-md-6 img"></div>
    </div>
    <div class="row about-content">
        <div class="col-md-8 col-md-offset-2">
            <?php
            if(!empty($contents)){
                foreach($contents as $content){
            ?>
            <div class="row">
                <div class="col-md-12 word">
                    <h4><?=$content['title']?></h4>
                    <p><?=$content['content']?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <h4>合作伙伴</h4>
                    <ul class="list-inline img-list">
                        <?php
                        if(!empty($partners)){
                            foreach($partners as $content){
                        ?>
                        <li><img src="<?=$content['photo']?>"></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
