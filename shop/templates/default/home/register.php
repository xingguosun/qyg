<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css">
.public-top-layout, .head-app, .head-search-bar, .head-user-menu, .public-nav-layout, .nch-breadcrumb-layout, #faq {
    display: none !important;
}
.public-head-layout {
    margin: 10px auto -10px auto;
}
.wrapper {
    width: 1000px;
}
#footer {
    border-top: none!important;
    padding-top: 30px;
}
</style>
<div class="nc-login-layout">
  <div class="nc-login">
    <div class="nc-login-title">
      <h3><?php echo $lang['login_register_join_us'];?></h3>
    </div>
    <div class="nc-login-content">
      <!-- <form id="register_form" method="post" action="127.0.0.1/index.php?act=login&op=usersave"> -->
       <form id="register_form" method="post" action="<?php echo SHOP_SITE_URL;?>/index.php?act=login&op=usersave">
      <?php Security::getToken();?>
       <!-- <form id="register_form" method="post" action="<?php echo SHOP_SITE_URL;?>/index.php?act=login&op=usersave"> -->
        <dl>
          <dt>手机号</dt>
          <dd style="min-height:54px;">
            <input type="text" id="user_name" name="user_name" class="text tip" title="<?php echo $lang['login_register_username_to_login'];?>" autofocus />
            <label></label>
          </dd>
        </dl>
        <dl>
          <dt><?php echo $lang['login_register_pwd'];?></dt>
          <dd style="min-height:54px;">
            <input type="password" id="password" name="password" class="text tip" title="<?php echo $lang['login_register_password_to_login'];?>" />
            <label></label>
          </dd>
        </dl>
        <dl>
          <dt><?php echo $lang['login_register_ensure_password'];?></dt>
          <dd style="min-height:54px;">
            <input type="password" id="password_confirm" name="password_confirm" class="text tip" title="<?php echo $lang['login_register_input_password_again'];?>"/>
            <label></label>
          </dd>
        </dl>
       <!--  <dl>
          <dt><?php echo $lang['login_register_email'];?></dt>
          <dd style="min-height:54px;">
            <input type="text" id="email" name="email" class="text tip" title="<?php echo $lang['login_register_input_valid_email'];?>" />
            <label></label>
          </dd>
        </dl> -->
        <?php if(C('captcha_status_register') == '1') { ?>
         <dl>
          <dt>获取验证码</dt>
          <dd style="min-height:54px;">
            <input type="text" name="code" value="" id="code"/><span id="getVeri"> 获取验证码</span>
            <label></label>
          </dd>
        </dl>
        
        <?php } ?>
        <dl>
          <dt>&nbsp;</dt>
          <dd>
            <input type="submit" id="yanzheng" value="<?php echo $lang['login_register_regist_now'];?>" class="submit" title="<?php echo $lang['login_register_regist_now'];?>"/>
            <input name="agree" type="checkbox" class="vm ml10" id="clause" value="1" checked="checked" />
            <span for="clause" class="ml5"><?php echo $lang['login_register_agreed'];?><a href="<?php echo urlShop('document', 'index',array('code'=>'agreement'));?>" target="_blank" class="agreement" title="<?php echo $lang['login_register_agreed'];?>"><?php echo $lang['login_register_agreement'];?></a></span>
            <label></label>
          </dd>
        </dl>
        <input type="hidden" value="<?php echo $_GET['ref_url']?>" name="ref_url">
        <input name="nchash" type="hidden" value="<?php echo getNchash();?>" />
        <input type="hidden" name="form_submit" value="ok" />
         <input type="hidden" value="<?php echo $_GET['zmr']?>" name="zmr">
      </form>
      <div class="clear"></div>
    </div>
    <div class="nc-login-bottom"></div>
  </div>
  <div class="nc-login-left">
    <h3><?php echo $lang['login_register_after_regist'];?></h3>
    <ol>
      <li class="ico05"><i></i><?php echo $lang['login_register_buy_info'];?></li>
      <li class="ico01"><i></i><?php echo $lang['login_register_openstore_info'];?></li>
      <li class="ico03"><i></i><?php echo $lang['login_register_sns_info'];?></li>
      <li class="ico02"><i></i><?php echo $lang['login_register_collect_info'];?></li>
      <li class="ico06"><i></i><?php echo $lang['login_register_talk_info'];?></li>
      <li class="ico04"><i></i><?php echo $lang['login_register_honest_info'];?></li>
      <div class="clear"></div>
    </ol>
    <h3 class="mt20"><?php echo $lang['login_register_already_have_account'];?></h3>
    <div class="nc-login-now mt10"><span class="ml20"><?php echo $lang['login_register_login_now_1'];?><a href="index.php?act=login&ref_url=<?php echo urlencode($output['ref_url']); ?>" title="<?php echo $lang['login_register_login_now'];?>" class="register"><?php echo $lang['login_register_login_now_2'];?></a></span><span><?php echo $lang['login_register_login_now_3'];?><a class="forget" href="index.php?act=login&op=forget_password"><?php echo $lang['login_register_login_forget'];?></a></span></div>
  </div>
</div>

<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.poshytip.min.js" charset="utf-8"></script> 
<script>
//注册表单提示
$('.tip').poshytip({
    className: 'tip-yellowsimple',
    showOn: 'focus',
    alignTo: 'target',
    alignX: 'center',
    alignY: 'top',
    offsetX: 0,
    offsetY: 5,
    allowTipHover: false
});

//注册表单验证
$(function(){
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]+$/i.test(value);
        }, "Letters only please"); 
        jQuery.validator.addMethod("lettersmin", function(value, element) {
            return this.optional(element) || ($.trim(value.replace(/[^\u0000-\u00ff]/g,"aa")).length>=3);
        }, "Letters min please"); 
        jQuery.validator.addMethod("lettersmax", function(value, element) {
            return this.optional(element) || ($.trim(value.replace(/[^\u0000-\u00ff]/g,"aa")).length<=15);
        }, "Letters max please");
    $("#register_form").validate({

        errorPlacement: function(error, element){
            var error_td = element.parent('dd');
            error_td.find('label').hide();
            error_td.append(error);
        },
        onkeyup: false,
        rules : {
            user_name : {
                required : true,
                lettersmin : true,
                lettersmax : true,
                lettersonly : true,
                remote   : {
                    url :'index.php?act=login&op=check_member&column=ok',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    }
                }
            },
            password : {
                required : true,
                minlength: 6,
                maxlength: 20
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            
            agree : {
                required : true
            }
        },
        messages : {
            user_name : {
                required : '<?php echo $lang['login_register_input_username'];?>',
                lettersmin : '<?php echo $lang['login_register_username_range'];?>',
                lettersmax : '<?php echo $lang['login_register_username_range'];?>',
                lettersonly: '<?php echo $lang['login_register_username_lettersonly'];?>',
                remote   : '<?php echo $lang['login_register_username_exists'];?>'
            },
            password  : {
                required : '<?php echo $lang['login_register_input_password'];?>',
                minlength: '<?php echo $lang['login_register_password_range'];?>',
                maxlength: '<?php echo $lang['login_register_password_range'];?>'
            },
            password_confirm : {
                required : '<?php echo $lang['login_register_input_password_again'];?>',
                equalTo  : '<?php echo $lang['login_register_password_not_same'];?>'
            },
            // email : {
            //     required : '<?php echo $lang['login_register_input_email'];?>',
            //     email    : '<?php echo $lang['login_register_invalid_email'];?>',
            //     remote   : '<?php echo $lang['login_register_email_exists'];?>'
            // },
            // <?php if(C('captcha_status_register') == '1') { ?>
            // captcha : {
            //     required : '<?php echo $lang['login_register_input_text_in_image'];?>',
            //     remote   : '<?php echo $lang['login_register_code_wrong'];?>'
            // },
            <?php } ?>
            agree : {
                required : '<?php echo $lang['login_register_must_agree'];?>'
            }
        }
    });
});

// var btn = document.getElementById("getVeri");
// btn.onclick = function(){
//    alert("验证信息会发送到"+$("#user_name").val());
// };
$(document).ready(function(){
  
var test = {
       node:null,
       count:60,
       start:function(){
          //console.log(this.count);
          if(this.count > 0){
             this.node.innerHTML = this.count--;
             var _this = this;
             setTimeout(function(){
                _this.start();
             },1000);
          }else{
             this.node.removeAttribute("disabled");
             this.node.innerHTML = "再次发送";
             this.count = 60;
          }
       },
       //初始化
       init:function(node){
          this.node = node;
          this.node.setAttribute("disabled",true);
          this.start();
       }
    };
    var btn = document.getElementById("getVeri");
    btn.onclick = function(){
        if(!(/^1[34578]\d{9}$/.test($("#user_name").val())))
        {
            alert("请输入正确的手机号");
        }
        else
        {
            alert("验证信息会发送到"+$("#user_name").val());
            test.init(btn);
            // console.log(data);
            var phone=$("#user_name").val();
            //alert(datas);
            $.ajax({
                     type : "POST",
                     url : "quanyougo.com/shop/index.php?act=login&op=sendnote",
                     data :  { phone: phone } ,
                     // success : function(data) {
                     //    alert(data);
                     // },  
                     
                    });
        }
        
    };
  });

  

</script>