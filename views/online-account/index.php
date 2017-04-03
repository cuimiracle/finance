<!-- 在线开户表单 -->
<h3 class="text-center">在线开户</h3>
<hr style="border-top:1px solid #ddd;border-bottom:1px solid #fff;">

<form class="form-horizontal" method="post" action="index.php?r=online-account/open_new">
    <?php if($insert_id){ ?>
    <div class="form-group"><p class="col-sm-4 control-label">开户信息保存成功</p></div>
    <?php } ?>
    <div class="form-group">
        <label for="name" class="col-sm-4 control-label">姓名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="name" id="name" placeholder="请输入姓名">
        </div>
    </div>
    <div class="form-group">
        <label for="mobile" class="col-sm-4 control-label">手机</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="请输入手机号">
        </div>
<!--        <div class="col-sm-2">-->
<!--            <button class="btn btn-default">获取验证码</button>-->
<!--        </div>-->
    </div>
<!--    <div class="form-group">-->
<!--        <label for="code" class="col-sm-4 control-label">验证码</label>-->
<!--        <div class="col-sm-4">-->
<!--            <input type="text" class="form-control" id="code" placeholder="请输入验证码">-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4 text-center">
            <button type="submit" class="btn btn-default">确认</button>
        </div>
    </div>
</form>