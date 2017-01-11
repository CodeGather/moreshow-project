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
		<form class="am-form form-validation view-save" action="<?php echo U('Admin/Fraction/Save');?>" method="POST" request-type="ajax-url" request-value="<?php echo U('Admin/Fraction/Index');?>">
			<legend>
				<span class="fs-16">
					<?php if(empty($data['id'])): echo L('fraction_add_name');?>
					<?php else: ?>
						<?php echo L('fraction_edit_name'); endif; ?>
				</span>
				<a href="<?php echo U('Admin/Student/Index');?>" class="fr fs-14 m-t-5 am-icon-mail-reply"> <?php echo L('common_operation_back');?></a>
			</legend>
			<div class="am-form-group">
				<label><?php echo L('fraction_username_text');?>：</label>
				<input type="text" placeholder="<?php echo L('fraction_username_text');?>" minlength="2" maxlength="16" data-validation-message="<?php echo L('fraction_student_username_format');?>" class="am-radius" <?php if(isset($student)): ?>value="<?php echo ($student["username"]); ?>"<?php endif; ?> disabled required />
			</div>
			<div class="am-form-group">
				<label><?php echo L('fraction_score_id_text');?>：</label>
				<select name="score_id" class="am-radius c-p" data-validation-message="<?php echo L('fraction_score_id_format');?>" required>
					<option value=""><?php echo L('common_select_can_choose');?></option>
					<?php if(is_array($score_list)): foreach($score_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($data['score_id']) and $data['score_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>
			<div class="am-form-group">
				<label><?php echo L('fraction_subject_text');?>：</label>
				<select name="subject_id" class="am-radius c-p" data-validation-message="<?php echo L('fraction_subject_format');?>" required>
					<option value=""><?php echo L('common_select_can_choose');?></option>
					<?php if(is_array($subject_list)): foreach($subject_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($data['subject_id']) and $data['subject_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>
			<div class="am-form-group">
				<label><?php echo L('fraction_score_text');?>：</label>
				<input type="number" name="score" placeholder="<?php echo L('fraction_score_text');?>" pattern="<?php echo L('common_regex_score');?>" data-validation-message="<?php echo L('fraction_score_format');?>" class="am-radius" <?php if(isset($data)): ?>value="<?php echo ($data["score"]); ?>"<?php endif; ?> required />
			</div>
			<div class="am-form-group">
				<input type="hidden" name="student_id" <?php if(isset($student)): ?>value="<?php echo ($student["id"]); ?>"<?php endif; ?>" />
				<input type="hidden" name="id" <?php if(isset($data)): ?>value="<?php echo ($data["id"]); ?>"<?php endif; ?>" />
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