<!-- 技术分析 -->
<div class="container-fluid mrt30 analysis">
    <div class="row text-center analysis-tabs mrb30">
        <a class="col-md-5 col-md-offset-1 text-muted" data-target="tech">技术分析</a>
        <a class="col-md-5 text-muted" data-target="comment">专家点评</a>
    </div>
    <div class="content" title="tech">
        <?php
        if(!empty($contents)){
            foreach($contents as $k => $v) {
                if($v['type'] == '技术分析'){
                    if($k % 2 == 0){
        ?>
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-1 rela comment-content">
                        <p><?=$v['content']?></p>
                        <hr>
                        <p><b><?=$v['author_work']?>：<?=$v['author_name']?></b></p>
                    </div>
                </div>
            </a>
        </div>
        <?php       }else{       ?>
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-3 rela comment-content">
                        <p><?=$v['content']?></p>
                        <hr>
                        <p><b><?=$v['author_work']?>：<?=$v['author_name']?></b></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
                    }
                }
            }
        }
        ?>
    </div>
    <div class="content" title="comment">
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 rela comment-content">
                        <p>点评内容：内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
                        <hr>
                        <p><b>XX专家：张三</b></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6 rela comment-content">
                        <p>点评内容：内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
                        <hr>
                        <p><b>XX专家：李四</b></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 rela comment-content">
                        <p>点评内容：内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
                        <hr>
                        <p><b>XX专家：张三</b></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="row comment-wrapper mrb30">
            <a class="col-md-10 col-md-offset-1 rela comment-area">
                <div class="row bg-img absol"></div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-6 rela comment-content">
                        <p>点评内容：内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
                        <hr>
                        <p><b>XX专家：李四</b></p>
                    </div>
                </div>
            </a>
        </div>

    </div>


    <div class="text-center mrb30">
        <a class="btn btn-primary mrt30" href="http://116.62.51.56/reg/demoUser.aspx">一键开模拟账户</a>
        <a class="btn btn-success mrt30" href="http://116.62.51.56/reg/LiveUser.aspx">一键开实盘账户</a>
    </div>
</div>
