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
		<form class="am-form form-validation view-save" action="<?php echo U('Admin/Student/Save');?>" method="POST" request-type="ajax-url" request-value="<?php echo U('Admin/Student/Index');?>">
			<legend>
				<span class="fs-16">
					<?php if(empty($data['id'])): echo L('student_add_name');?>
					<?php else: ?>
						<?php echo L('student_edit_name'); endif; ?>
				</span>
				<a href="<?php echo U('Admin/Student/Index');?>" class="fr fs-14 m-t-5 am-icon-mail-reply"> <?php echo L('common_operation_back');?></a>
			</legend>
			<div class="am-form-group">
				<label><?php echo L('student_username_text');?>：</label>
				<input type="text" name="username" placeholder="<?php echo L('student_username_text');?>" minlength="2" maxlength="16" data-validation-message="<?php echo L('student_username_format');?>" class="am-radius" <?php if(!empty($data)): ?>value="<?php echo ($data["username"]); ?>"<?php endif; ?> required />
			</div>
			<div class="am-form-group">
				<label><?php echo L('common_view_id_card_text');?>：</label>
				<input type="text" name="id_card" placeholder="<?php echo L('common_view_id_card_text');?>" pattern="<?php echo L('common_regex_id_card');?>" data-validation-message="<?php echo L('common_view_id_card_format');?>" class="am-radius" <?php if(!empty($data)): ?>value="<?php echo ($data["id_card"]); ?>" disabled<?php endif; ?> required />
			</div>
			<!-- 性别 开始 -->
<div class="am-form-group">
	<label><?php echo L('common_view_gender_name');?>：</label>
	<div>
		<?php if(is_array($common_gender_list)): foreach($common_gender_list as $key=>$v): ?><label class="am-radio-inline m-r-10">
				<input type="radio" name="gender" value="<?php echo ($v["id"]); ?>" <?php if(isset($data['gender']) and $data['gender'] == $v['id']): ?>checked="checked"<?php else: if(!isset($data['gender']) and isset($v['checked']) and $v['checked'] == true): ?>checked="checked"<?php endif; endif; ?> data-am-ucheck /> <?php echo ($v["name"]); ?>
			</label><?php endforeach; endif; ?>
	</div>
</div>
<!-- 性别 结束 -->
			<div class="am-form-group">
				<label><?php echo L('student_birthday_text');?>：</label>
				<input type="text" name="birthday" class="am-radius" placeholder="<?php echo L('student_birthday_text');?>" pattern="<?php echo L('common_regex_birthday');?>" data-validation-message="<?php echo L('student_birthday_format');?>" <?php if(!empty($data)): ?>value="<?php echo ($data["birthday"]); ?>"<?php endif; ?> data-am-datepicker="{format: 'yyyy-mm-dd', viewMode: 'years'}" readonly required />
			</div>
			<div class="am-form-group">
				<label><?php echo L('student_class_text');?>：</label>
				<select name="class_id" class="am-radius c-p" data-validation-message="<?php echo L('student_class_format');?>" required>
					<option value=""><?php echo L('common_select_can_choose');?></option>
					<?php if(is_array($class_list)): foreach($class_list as $key=>$v): if(empty($v['item'])): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($data['class_id']) and $data['class_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option>
						<?php else: ?>
							<optgroup label="<?php echo ($v["name"]); ?>">
								<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><option value="<?php echo ($vs["id"]); ?>" <?php if(isset($data['class_id']) and $data['class_id'] == $vs['id']): ?>selected<?php endif; ?>><?php echo ($vs["name"]); ?></option><?php endforeach; endif; ?>
							</optgroup><?php endif; endforeach; endif; ?>
				</select>
			</div>
			<div class="am-form-group">
				<label><?php echo L('student_region_text');?>：</label>
				<select name="region_id" class="am-radius c-p" data-validation-message="<?php echo L('student_region_format');?>" required>
					<option value=""><?php echo L('common_select_can_choose');?></option>
					<?php if(is_array($region_list)): foreach($region_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($data['region_id']) and $data['region_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>
			<div class="am-form-group">
				<label><?php echo L('common_address_text');?>：</label>
				<input type="text" placeholder="<?php echo L('common_address_text');?>" name="address" data-validation-message="<?php echo L('common_address_format');?>" class="am-radius" <?php if(!empty($data)): ?>value="<?php echo ($data["address"]); ?>"<?php endif; ?> />
			</div>
			<div class="am-form-group">
				<label><?php echo L('common_view_tel_name');?>：</label>
				<input type="text" placeholder="<?php echo L('common_view_tel_tips');?>" name="tel" pattern="<?php echo L('common_regex_tel');?>" data-validation-message="<?php echo L('common_view_tel_tips');?>" class="am-radius" <?php if(!empty($data)): ?>value="<?php echo ($data["tel"]); ?>"<?php endif; ?> required />
			</div>
			<!-- 学生状态 开始 -->
<div class="am-form-group">
	<label><?php echo L('common_view_student_state_name');?>：</label>
	<select name="state" class="am-radius c-p" data-validation-message="<?php echo L('common_student_state_format');?>" required>
		<?php if(is_array($common_student_state_list)): foreach($common_student_state_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($data['state']) and $data['state'] == $v['id']): ?>selected<?php else: if(!isset($data['state']) and isset($v['checked']) and $v['checked'] == true): ?>selected<?php endif; endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
	</select>
</div>
<!-- 学生状态 结束 -->
			<div class="am-form-group">
				<label><?php echo L('student_tuition_state_text');?>：</label>
				<div>
					<?php if(is_array($common_tuition_state_list)): foreach($common_tuition_state_list as $key=>$v): ?><label class="am-radio-inline m-r-10">
							<input type="radio" name="tuition_state" value="<?php echo ($v["id"]); ?>" <?php if(isset($data['tuition_state']) and $data['tuition_state'] == $v['id']): ?>checked="checked"<?php else: if(!isset($data['tuition_state']) and isset($v['checked']) and $v['checked'] == true): ?>checked="checked"<?php endif; endif; ?> data-am-ucheck /> <?php echo ($v["name"]); ?>
						</label><?php endforeach; endif; ?>
				</div>
			</div>
			<div class="am-form-group">
				<input type="hidden" name="id" <?php if(!empty($data)): ?>value="<?php echo ($data["id"]); ?>"<?php endif; ?>" />
				<button type="submit" class="am-btn am-btn-primary am-radius btn-loading-example am-btn-sm w100" data-am-loading="{loadingText:'<?php echo L('common_form_loading_tips');?>'}"><?php echo L('common_operation_save');?></button>
			</div>
		</form>
        <!-- form end -->
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
<!-- footer end