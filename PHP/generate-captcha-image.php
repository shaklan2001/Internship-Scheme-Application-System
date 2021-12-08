<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-6">
            <img id="captcha_code" src="/yp/captcha_code.php" />
            <!-- <input type="button" value="Refresh Captcha" class="btn btn-success" onclick="location.reload();"> -->
            <input type="button" value="Refresh Captcha" class="btn btn-success" onClick="refreshCaptcha();">
        </div>
        <div class="col-sm-3">
            <div style="display:block;margin-bottom:20px;margin-top:20px;">
                <input type="text" class="form-control" name="captcha_input" id="captcha_input" placeholder="Enter your captcha" maxlength="6" autocomplete="off" />
                <input type="hidden" name="flag" value="1"/>
            </div>
        </div>
    </div>
</div>
<script>
    function refreshCaptcha() {
        $("#captcha_code").attr('src','/yp/captcha_code.php?sid='+ Math.random());
    }
</script>