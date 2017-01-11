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
        <!-- operation start -->
        <div class="am-g">
            <a href="<?php echo U('Admin/Power/RoleSaveInfo');?>" class="am-btn am-btn-secondary am-radius am-btn-xs am-icon-plus"> <?php echo L('common_operation_add');?></a>
        </div>
        <!-- operation end -->

        <!-- list start -->
		<table class="am-table am-table-striped am-table-hover am-text-middle m-t-10 role-list">
			<thead>
				<tr>
					<th><?php echo L('common_view_name_title');?></th>
					<th><?php echo L('common_view_state_title');?></th>
					<th><?php echo L('power_view_have_title');?></th>
					<th class="am-hide-sm-only"><?php echo L('common_create_time_name');?></th>
					<th><?php echo L('common_operation_name');?></th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$v): ?><tr id="data-list-<?php echo ($v["id"]); ?>" <?php if($v['is_enable'] == 0): ?>class="am-active"<?php endif; ?>>
							<td><?php echo ($v["name"]); ?></td>
							<td>
								<span <?php if($v['is_enable'] == 0): ?>class="cr-ccc"<?php endif; ?>><?php echo L('common_is_enable_tips')[$v['is_enable']]['name'];?></span>
							</td>
							<td class="power-text">
								<?php if(!empty($v['item'])): if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><span class="am-badge <?php echo L('common_color_list')[rand(0, 5)];?> am-round m-r-5"><?php echo ($vs["name"]); ?></span><?php endforeach; endif; endif; ?>
							</td>
							<td class="am-hide-sm-only"><?php echo date('Y-m-d H:i:s', $v['add_time']);?></td>
							<td>
								<?php if($v['id'] == 1 and C('close_admin_operation') == 'ok'): ?><span class="cr-ccc"><?php echo L('common_do_not_operate');?></span>
								<?php else: ?>
									<a href="<?php echo U('Admin/Power/RoleSaveInfo', array('id'=>$v['id']));?>">
										<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-edit" data-am-popover="{content: '<?php echo L('common_operation_edit');?>', trigger: 'hover focus'}"></button>
									</a>
									<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-trash-o submit-delete" data-url="<?php echo U('Admin/Power/RoleDelete');?>" data-am-popover="{content: '<?php echo L('common_operation_delete');?>', trigger: 'hover focus'}" data-id="<?php echo ($v["id"]); ?>"></button><?php endif; ?>
							</td>
						</tr><?php endforeach; endif; ?>
				<?php else: ?>
					<tr><td colspan="5" class="table-no"><?php echo L('common_not_data_tips');?></td></tr><?php endif; ?>
			</tbody>
		</table>
		<!-- list end -->
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