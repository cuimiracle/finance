<!-- 投资学院 -->
<div class="container-fluid academe mrt30">
    <?php
    if(!empty($contents)){
        foreach($contents as $k=>$v){
            if($k % 2 == 0){
    ?>
    <div class="row mrb30 animated" data-animation="slideInRight" data-animation-delay="700">
        <div class="col-md-3 col-md-offset-1">
            <img class="first" src="<?=$v['photo']?>">
        </div>
        <div class="col-md-6">
            <h4><?=$v['title']?></h4>
            <table class="table table-bordered mrt30">
                <tbody>
                <tr>
                    <td>方案名</td>
                    <td>方案内容</td>
                    <td>报价</td>
                </tr>
                <tr>
                    <td><?=$v['name']?></td>
                    <td><?=$v['description']?></td>
                    <td><?=$v['price']?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr style="border-top:1px solid #ddd;border-bottom:1px solid #fff;">
    <?php
            }else{
    ?>
    <div class="row mrt30 mrb30 animated" data-animation="slideInLeft" data-animation-delay="700">
        <div class="col-md-6 col-md-offset-1">
            <h4><?=$v['title']?></h4>
            <table class="table table-bordered mrt30">
                <tbody>
                <tr>
                    <td>方案名</td>
                    <td>方案内容</td>
                    <td>报价</td>
                </tr>
                <tr>
                    <td><?=$v['name']?></td>
                    <td><?=$v['description']?></td>
                    <td><?=$v['price']?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <img class="second" src="<?=$v['photo']?>">
        </div>
    </div>
    <hr style="border-top:1px solid #ddd;border-bottom:1px solid #fff;">
    <?php
            }
        }
    }
    ?>
</div>
