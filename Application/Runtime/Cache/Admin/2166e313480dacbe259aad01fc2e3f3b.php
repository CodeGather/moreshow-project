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
<!-- nav start -->
<header class="am-topbar am-topbar-inverse admin-header">
	<div class="am-topbar-brand">
		<a href="<?php echo U('Admin/Index/Index');?>">
			<h2><?php echo L('common_site_name');?></h2>
		</a>
	</div>
	<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only am-radius header-nav-submit" data-am-collapse="{target: '#topbar-collapse'}">
		<span class="am-sr-only"><?php echo L('nav_switch_text');?></span>
		<i class="am-icon-bars"></i>
	</button>
	<div class="am-collapse am-topbar-collapse" id="topbar-collapse">
		<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
			<li class="am-dropdown am-hide-sm-only">
				<a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link">
					<i class="am-icon-arrows-alt"></i>
					<span class="admin-fulltext" fulltext-open="<?php echo L('nav_fulltext_open');?>" fulltext-exit="<?php echo L('nav_fulltext_exit');?>"><?php echo L('nav_fulltext_open');?></span>
				</a>
			</li>
			<li class="am-dropdown common-nav-top" data-am-dropdown data-am-dropdown-toggle>
				<a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
					<i class="am-icon-user"></i>
					<span class="tpl-header-list-user-nick"><?php echo ($admin["username"]); ?></span>
					<span class="tpl-header-list-user-ico">
					</span>
				</a>
				<ul class="am-dropdown-content">
					<li>
						<a href="javascript:;" data-type="nav" data-url="<?php echo U('Admin/Admin/SaveInfo', array('id'=>$admin['id']));?>">
							<i class="am-icon-cog"></i>
							设置
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/Admin/Logout');?>">
							<i class="am-icon-power-off"></i>
							退出
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</header>
<!-- nav end -->
		
<!-- content start -->
<div class="admin">
	<!-- left menu start -->
	<div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
	<div class="am-offcanvas-bar admin-offcanvas-bar">
		<ul class="am-list admin-sidebar-list common-left-menu">
			<li>
				<a href="javascript:;" data-type="menu" data-url="<?php echo U('Admin/Index/Init');?>" class="common-left-menu-active">首页</a>
			</li>
			<?php if(is_array($left_menu)): foreach($left_menu as $key=>$v): if(empty($v['item'])): ?><li>
						<a href="javascript:;" data-type="menu" data-url="<?php echo U('Admin/'.$v['control'].'/'.$v['action']);?>"><?php echo ($v["name"]); ?></a>
					</li>
				<?php else: ?>
					<li class="admin-parent">
						<a data-type="menu" class="am-cf" data-am-collapse="{target: '#power-menu-<?php echo ($v["id"]); ?>'}">
							<?php echo ($v["name"]); ?>
							<i class="am-icon-angle-down am-fr am-margin-right"></i>
						</a>
						<ul class="am-list am-collapse admin-sidebar-sub am-in" id="power-menu-<?php echo ($v["id"]); ?>">
							<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><li>
									<a href="javascript:;" data-type="menu" data-url="<?php echo U('Admin/'.$vs['control'].'/'.$vs['action']);?>"><?php echo ($vs["name"]); ?></a>
								</li><?php endforeach; endif; ?>
						</ul>
					</li><?php endif; endforeach; endif; ?>
		</ul>
	</div>
</div>
	<!-- left menu end -->

	<!-- right content start  -->
	<iframe id="ifcontent" src="<?php echo U('Admin/Index/Init');?>"></iframe>
	<!-- right content end  -->
</div>
<!-- content end -->

<!-- navbar start -->
<a href="javascript:;" class="am-icon-btn am-icon-th-list am-show-sm-only common-nav-bar" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<!-- navbar end -->
		
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