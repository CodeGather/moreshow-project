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

<!-- right content start  -->
<div class="content-right">
	<div class="content">
		<p class="fw-700 list-title"><?php echo L('os_view_title');?></p>
		<dl class="dl-content">
			<dt><?php echo L('ver_name');?></dt>
			<dd><?php echo ($data["ver"]); ?><a href="<?php echo L('common_application_website');?>" target="_blank" class="m-l-10"><?php echo L('ver_to_view_name');?></a></dd>

			<dt><?php echo L('os_ver_name');?></dt>
			<dd><?php echo ($data["os_ver"]); ?></dd>

			<dt><?php echo L('php_ver_name');?></dt>
			<dd><?php echo ($data["php_ver"]); ?></dd>

			<dt><?php echo L('mysql_ver_name');?></dt>
			<dd><?php echo ($data["mysql_ver"]); ?></dd>

			<dt><?php echo L('server_ver_name');?></dt>
			<dd><?php echo ($data["server_ver"]); ?></dd>

			<dt><?php echo L('host_name');?></dt>
			<dd><?php echo ($data["host"]); ?></dd>
		</dl>

		<p class="fw-700 list-title"><?php echo L('team_view_title');?></p>
		<dl class="dl-content">
			<dt><?php echo L('copyright_name');?></dt>
			<dd><?php echo L('common_application_name');?></dd>

			<dt><?php echo L('originator_name');?></dt>
			<dd>Devil</dd>

			<dt><?php echo L('research_name');?></dt>
			<dd><a href="http://gong.gg/" target="_blank">Devil</a></dd>
		</dl>
	</div>
</div>
<!-- right content end  -->

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