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
            <button class="am-btn am-btn-secondary am-radius am-btn-xs am-icon-plus submit-add" data-am-modal="{target: '#power-save-win'}"> <?php echo L('common_operation_add');?></button>
        </div>
        <!-- operation end -->

        <div class="am-popup am-radius" id="power-save-win">
			<div class="am-popup-inner">
				<div class="am-popup-hd">
					<h4 class="am-popup-title" data-add-title="<?php echo L('power_add_name');?>" data-edit-title="<?php echo L('power_edit_name');?>"><?php echo L('power_add_name');?></h4>
					<span data-am-modal-close
					class="am-close">&times;</span>
					</div>
				<div class="am-popup-bd">
					<!-- form start -->
					<form class="am-form form-validation admin-save" action="<?php echo U('Admin/Power/PowerSave');?>" method="POST" request-type="ajax-reload" request-value="">
						<div class="am-form-group">
							<label><?php echo L('power_level_text');?>：</label>
							<select  class="am-radius c-p" name="pid" data-validation-message="<?php echo L('power_level_format');?>">
								<option value="0"><?php echo L('common_select_level_one_choice');?></option>
								<?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
						<div class="am-form-group">
							<label><?php echo L('power_name_text');?>：</label>
							<input type="text" placeholder="<?php echo L('power_name_text');?>" name="name" minlength="2" maxlength="16" data-validation-message="<?php echo L('power_name_format');?>" class="am-radius" required />
						</div>
						<div class="am-form-group">
							<label><?php echo L('power_control_text');?>：</label>
							<input type="text" placeholder="<?php echo L('power_control_text');?>" name="control" pattern="<?php echo L('common_regex_control');?>"  data-validation-message="<?php echo L('power_control_format');?>" class="am-radius" required />
						</div>
						<div class="am-form-group">
							<label><?php echo L('power_action_text');?>：</label>
							<input type="text" placeholder="<?php echo L('power_action_text');?>" name="action" pattern="<?php echo L('common_regex_action');?>"  data-validation-message="<?php echo L('power_action_format');?>" class="am-radius" required />
						</div>
						<div class="am-form-group">
							<label><?php echo L('common_view_sort_title');?>：</label>
							<input type="number" placeholder="<?php echo L('common_view_sort_title');?>" name="sort" pattern="<?php echo L('common_regex_sort');?>" data-validation-message="<?php echo L('common_sort_error');?>" class="am-radius" value="0" required />
						</div>
						<!-- 是否显示 开始 -->
<div class="am-form-group">
	<label><?php echo L('common_view_is_show_title');?>：</label>
	<div>
		<?php if(is_array($common_is_show_list)): foreach($common_is_show_list as $key=>$v): ?><label class="am-radio-inline m-r-10">
				<input type="radio" name="is_show" value="<?php echo ($v["id"]); ?>" <?php if(isset($data['is_show']) and $data['is_show'] == $v['id']): ?>checked="checked"<?php else: if(!isset($data['is_show']) and isset($v['checked']) and $v['checked'] == true): ?>checked="checked"<?php endif; endif; ?> data-am-ucheck /> <?php echo ($v["name"]); ?>
			</label><?php endforeach; endif; ?>
	</div>
</div>
<!-- 是否显示 结束 -->
						<div class="am-form-group">
							<input type="hidden" name="id" />
							<button type="submit" class="am-btn am-btn-primary am-radius btn-loading-example am-btn-sm w100" data-am-loading="{loadingText:'<?php echo L('common_form_loading_tips');?>'}"><?php echo L('common_operation_save');?></button>
						</div>
					</form>
					<!-- form end -->
				</div>
			</div>
		</div>
        <!-- content start -->
		<ul class="tree-list p-0 m-t-15">
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><li id="data-list-<?php echo ($v["id"]); ?>" <?php if($v['is_show'] == 0): ?>class="bk-cr-ffd"<?php endif; ?>>
					<?php if(!empty($v['item'])): ?><i class="am-icon-minus-square c-p m-r-5"></i>
						<label class="c-p">
					<?php else: ?>
						<label class="c-p m-l-20"><?php endif; ?>
						<span><?php echo ($v["name"]); ?></span>
					</label>
					<div class="fr m-r-20 list-submit">
						<span class="am-icon-edit am-icon-md c-p submit-edit <?php if(!empty($v['item'])): ?>m-r-5<?php endif; ?>" data-am-popover="{content: '<?php echo L('common_operation_edit');?>', trigger: 'hover focus'}" data-am-modal="{target: '#power-save-win'}" data-json='<?php echo json_encode($v);?>' data-item="<?php if(!empty($v['item'])): ?>ok<?php else: ?>no<?php endif; ?>"></span>
						<?php if(empty($v['item'])): ?><span class="am-icon-trash-o am-icon-md c-p m-l-20 m-r-15 submit-delete" data-url="<?php echo U('Admin/Power/PowerDelete');?>" data-am-popover="{content: '<?php echo L('common_operation_delete');?>', trigger: 'hover focus'}" data-id="<?php echo ($v["id"]); ?>"></span><?php endif; ?>
					</div>
				</li>
				<?php if(!empty($v['item'])): ?><ul class="list-find p-0 m-t-5">
						<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><li id="data-list-<?php echo ($vs["id"]); ?>" <?php if($vs['is_show'] == 0): ?>class="bk-cr-ffd"<?php endif; ?>>
								<label class="c-p">
									<span><?php echo ($vs["name"]); ?></span>
								</label>
								<div class="fr m-r-20 find-submit">
									<span class="am-icon-edit am-icon-md c-p submit-edit" data-am-popover="{content: '<?php echo L('common_operation_edit');?>', trigger: 'hover focus'}" data-am-modal="{target: '#power-save-win'}" data-json='<?php echo json_encode($vs);?>' data-item="no"></span>
									<span class="am-icon-trash-o am-icon-md c-p m-l-20 m-r-15 submit-delete" data-url="<?php echo U('Admin/Power/PowerDelete');?>" data-am-popover="{content: '<?php echo L('common_operation_delete');?>', trigger: 'hover focus'}" data-id="<?php echo ($vs["id"]); ?>"></span>
								</div>
							</li><?php endforeach; endif; ?>
					</ul><?php endif; endforeach; endif; ?>
		</ul>
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