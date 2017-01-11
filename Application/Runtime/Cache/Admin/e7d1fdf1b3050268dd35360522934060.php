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
        <!-- form start -->
        <form class="am-form form-validation view-save" action="<?php echo U('Admin/Power/RoleSave');?>" method="POST" request-type="ajax-url" request-value="<?php echo U('Admin/Power/Role');?>">
        	<legend>
				<span class="fs-16">
					<?php if(empty($data['id'])): echo L('role_add_name');?>
					<?php else: ?>
						<?php echo L('role_edit_name'); endif; ?>
				</span>
				<a href="<?php echo U('Admin/Power/Role');?>" class="fr fs-14 m-t-5 am-icon-mail-reply"> <?php echo L('common_operation_back');?></a>
			</legend>
        	<div class="am-form-group">
				<label><?php echo L('role_view_role_text');?>：</label>
				<input type="text" placeholder="<?php echo L('role_view_role_text');?>" name="name" minlength="2" maxlength="16" data-validation-message="<?php echo L('role_name_format');?>" class="am-radius" <?php if(isset($data)): ?>value="<?php echo ($data["name"]); ?>"<?php endif; ?> required />
			</div>
			<!-- 是否启用 开始 -->
<div class="am-form-group">
	<label><?php echo L('common_view_enable_title');?>：</label>
	<div>
		<?php if(is_array($common_is_enable_list)): foreach($common_is_enable_list as $key=>$v): ?><label class="am-radio-inline m-r-10">
				<input type="radio" name="is_enable" value="<?php echo ($v["id"]); ?>" <?php if(isset($data['is_enable']) and $data['is_enable'] == $v['id']): ?>checked="checked"<?php else: if(!isset($data['is_enable']) and isset($v['checked']) and $v['checked'] == true): ?>checked="checked"<?php endif; endif; ?> data-am-ucheck /> <?php echo ($v["name"]); ?>
			</label><?php endforeach; endif; ?>
	</div>
</div>
<!-- 是否启用 结束 -->
			<div class="am-form-group">
				<label><?php echo L('power_view_have_title');?>：</label>
				<ul class="tree-list p-0">
					<?php if(is_array($power)): foreach($power as $key=>$v): ?><li <?php if($v['is_show'] == 0): ?>class="bk-cr-ffd"<?php endif; ?>>
							<?php if(!empty($v['item'])): ?><i class="am-icon-minus-square c-p m-r-5"></i>
								<label class="c-p">
							<?php else: ?>
								<label class="c-p m-l-20"><?php endif; ?>
								<input type="checkbox" name="power_id" value="<?php echo ($v["id"]); ?>" class="node-choice" <?php if($v['is_power'] == 'ok'): ?>checked<?php endif; ?> />
								<span><?php echo ($v["name"]); ?></span>
							</label>
						</li>
						<?php if(!empty($v['item'])): ?><ul class="list-find p-0 m-t-5">
								<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><li <?php if($vs['is_show'] == 0): ?>class="bk-cr-ffd"<?php endif; ?>>
										<label class="c-p">
											<input type="checkbox" name="power_id" value="<?php echo ($vs["id"]); ?>" <?php if($vs['is_power'] == 'ok'): ?>checked<?php endif; ?> />
											<span><?php echo ($vs["name"]); ?></span>
										</label>
									</li><?php endforeach; endif; ?>
							</ul><?php endif; endforeach; endif; ?>
				</ul>
			</div>
			<div class="am-form-group">
				<input type="hidden" name="id" <?php if(isset($data)): ?>value="<?php echo ($data["id"]); ?>"<?php endif; ?>" />
				<button type="submit" class="am-btn am-btn-primary am-radius btn-loading-example am-btn-sm w100" data-am-loading="{loadingText:'<?php echo L('common_form_loading_tips');?>'}"><?php echo L('common_operation_save');?></button>
			</div>
		</form>
		<!-- right form end  -->
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