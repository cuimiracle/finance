<!-- 帮助内容 -->
<!--<div class="container-fluid mrt30">-->
<!--    <div class="form-inline text-center search-box">-->
<!--        <input type="text" class="form-control" placeholder="请输入搜索内容">-->
<!--        <button class="btn btn-primary">搜索</button>-->
<!--    </div>-->
<!--</div>-->

<hr style="border-top:1px solid #ddd;border-bottom:1px solid #fff;">

<div class="container-fluid mrb30">
    <div class="row">
        <div class="col-md-2 col-md-offset-1">
            <ul class="nav nav-pills nav-stacked help-nav">
                <li class="active" data-target="account"><a href="javascript:;">开户</a></li>
                <li data-target="capital"><a href="javascript:;">资金</a></li>
                <li data-target="security"><a href="javascript:;">安全</a></li>
                <li data-target="faq"><a href="javascript:;">软件使用常见FAQ</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="help-content" title="account">
                <h3>开户帮助信息</h3>
                <hr>
                <?php
                if(!empty($contents)){
                    foreach($contents as $v) {
                        if($v['type'] == '开户'){
                ?>
                        <p><?=$v['title']?></p>
                        <p><?=$v['content']?></p>
                <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="help-content" title="capital">
                <h3>资金帮助信息</h3>
                <hr>
                <?php
                if(!empty($contents)){
                    foreach($contents as $v) {
                        if($v['type'] == '资金'){
                            ?>
                            <p><?=$v['title']?></p>
                        <p><?=$v['content']?></p>
                    <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="help-content" title="security">
                <h3>安全帮助信息</h3>
                <hr>
                <?php
                if(!empty($contents)){
                    foreach($contents as $v) {
                        if($v['type'] == '安全'){
                ?>
                            <p><?=$v['title']?></p>
                        <p><?=$v['content']?></p>
                    <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="help-content" title="faq">
                <h3>软件使用常见FAQ</h3>
                <hr>
                <?php
                if(!empty($contents)){
                    foreach($contents as $v) {
                        if($v['type'] == '软件使用常见FAQ'){
                            ?>
                            <p><?=$v['title']?></p>
                        <p><?=$v['content']?></p>
                    <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>


