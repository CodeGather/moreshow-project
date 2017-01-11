<?php if (!defined('THINK_PATH')) exit();?><!-- header start -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php echo C('DEFAULT_CHARSET');?>" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	<title><?php echo L('common_site_title');?></title>
	<link rel="stylesheet" type="text/css" href="/schoolcms_2.0_utf8/schoolcms/Public/Common/Lib/assets/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/schoolcms_2.0_utf8/schoolcms/Public/Admin/Css/Common.css" />
	<?php if(!empty($module_css)): ?><link rel="stylesheet" type="text/css" href="/schoolcms_2.0_utf8/schoolcms/Public/<?php echo ($module_css); ?>" /><?php endif; ?>
</head>
<body>
<!-- header end -->

<!-- content start -->
<div class="account-pages">
	<div class="wrapper-page">
		<div class="text-center">
            <span class="logo fw-700"><?php echo L('common_site_name');?></span>
        </div>
        <div class="m-t-40 card-box">
            <div class="panel-body">
            	<form class="am-form form-validation" action="<?php echo U('Admin/Admin/Login');?>" method="POST" request-type="ajax-url" request-value="<?php echo U('Admin/Index/Index');?>">
            		<div class="am-g">
            			<div class="am-form-group">
					      <input type="text" placeholder="<?php echo L('login_username_text');?>" name="username" pattern="<?php echo L('common_regex_username');?>" data-validation-message="<?php echo L('login_username_format');?>" class="am-radius" required />
					    </div>
					    <div class="am-form-group form-horizontal m-t-20">
					      <input type="password" placeholder="<?php echo L('login_login_pwd_text');?>" name="login_pwd" minlength="6" maxlength="18" data-validation-message="<?php echo L('login_login_pwd_format');?>" class="am-radius" required />
					    </div>
                        <div class="am-form-group">
                        	<button type="submit" class="am-btn am-btn-primary am-radius btn-loading-example am-btn-sm w100" data-am-loading="{loadingText:'<?php echo L('login_button_loading_text');?>'}"><?php echo L('login_button_text');?></button>
                        </div>
                        
                        <div class="am-form-group">
                        	<a href="javascript:;" class="text-muted" data-am-popover="{theme: 'danger sm', content: '<?php echo L('login_forgot_pwd_tips');?>', trigger: 'hover focus'}"><?php echo L('login_forgot_pwd_text');?></a>
                        </div>
            		</div>
            	</form>
            </div>
        </div>
	</div>
</div>
<!-- content end -->
		
<!-- footer start -->
<!-- commom delete html start -->
<div class="am-modal am-modal-confirm" tabindex="-1" id="common-confirm-delete">
	<div class="am-modal-dialog am-radius">
		<div class="am-modal-bd"><?php echo L('common_delete_tips');?></div>
		<div class="am-modal-footer">
			<span class="am-modal-btn" data-am-modal-cancel><?php echo L('common_operation_cancel');?></span>
			<span class="am-modal-btn" data-am-modal-confirm><?php echo L('common_operation_confirm');?></span>
		</div>
	</div>
</div>
<!-- commom delete html end -->
</body>
</html>
<script type="text/javascript" src="/schoolcms_2.0_utf8/schoolcms/Public/Common/Lib/jquery/jquery-2.1.0.js"></script>
<script type="text/javascript" src="/schoolcms_2.0_utf8/schoolcms/Public/Common/Lib/assets/js/amazeui.min.js"></script>
<script type="text/javascript" src="/schoolcms_2.0_utf8/schoolcms/Public/Common/Lib/echarts/echarts.min.js"></script>
<script type="text/javascript" src="/schoolcms_2.0_utf8/schoolcms/Public/Common/Js/Common.js"></script>
<?php if(!empty($module_js)): ?><script type="text/javascript" src="/schoolcms_2.0_utf8/schoolcms/Public/<?php echo ($module_js); ?>"></script><?php endif; ?>
<!-- footer end -->