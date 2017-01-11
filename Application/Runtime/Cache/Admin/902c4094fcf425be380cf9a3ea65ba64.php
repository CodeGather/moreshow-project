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
		<form class="am-form view-list" action="<?php echo U('Admin/Fraction/Index');?>" method="POST">
			<div class="am-g">
				<input type="text" class="am-radius form-keyword" placeholder="<?php echo L('fraction_username_text');?>" name="keyword" <?php if(isset($param['keyword'])): ?>value="<?php echo ($param["keyword"]); ?>"<?php endif; ?> />
				<button type="submit" class="am-btn am-btn-secondary am-btn-sm am-radius form-submit"><?php echo L('common_operation_query');?></button>
				<label class="fs-12 m-l-5 c-p fw-100 more-submit">
					<?php echo L('common_more_screening');?>
					<input type="checkbox" name="is_more" value="1" id="is_more" <?php if(isset($param['is_more']) and $param['is_more'] == 1): ?>checked<?php endif; ?> />
					<i class="am-icon-angle-down"></i>
				</label>

				<div class="more-where <?php if(!isset($param['is_more']) or $param['is_more'] != 1): ?>none<?php endif; ?>">
					<select name="class_id" class="am-radius c-p m-t-10">
						<option value="0"><?php echo L('fraction_class_id_text');?></option>
						<?php if(is_array($class_list)): foreach($class_list as $key=>$v): if(empty($v['item'])): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['class_id']) and $param['class_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option>
							<?php else: ?>
								<optgroup label="<?php echo ($v["name"]); ?>">
									<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><option value="<?php echo ($vs["id"]); ?>" <?php if(isset($param['class_id']) and $param['class_id'] == $vs['id']): ?>selected<?php endif; ?>><?php echo ($vs["name"]); ?></option><?php endforeach; endif; ?>
								</optgroup><?php endif; endforeach; endif; ?>
					</select>
					<select  class="am-radius c-p m-t-10" name="score_id">
						<option value="0"><?php echo L('fraction_score_id_text');?></option>
						<?php if(is_array($score_list)): foreach($score_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['score_id']) and $param['score_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select  class="am-radius c-p m-t-10" name="subject_id">
						<option value="0"><?php echo L('fraction_subject_text');?></option>
						<?php if(is_array($subject_list)): foreach($subject_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['subject_id']) and $param['subject_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="score_level" class="am-radius c-p m-t-10">
						<option value="-1"><?php echo L('fraction_score_level_text');?></option>
						<?php if(is_array($common_fraction_level_list)): foreach($common_fraction_level_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['score_level']) and $param['score_level'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
		</form>
		<!-- form end -->

		<!-- list start -->
		<table class="am-table am-table-striped am-table-hover am-text-middle m-t-20">
			<thead>
				<tr>
					<th><?php echo L('fraction_username_text');?></th>
					<th class="am-hide-sm-only"><?php echo L('common_view_gender_name');?></th>
					<th class="am-hide-sm-only"><?php echo L('fraction_class_id_text');?></th>
					<th><?php echo L('fraction_score_id_text');?></th>
					<th><?php echo L('fraction_subject_text');?></th>
					<th class="am-hide-sm-only"><?php echo L('fraction_score_level_text');?></th>
					<th><?php echo L('fraction_score_text');?></th>
					<th><?php echo L('common_operation_name');?></th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$v): ?><tr id="data-list-<?php echo ($v["id"]); ?>-<?php echo ($v["student_id"]); ?>">
							<td><?php echo ($v["username"]); ?></td>
							<td class="am-hide-sm-only"><?php echo L('common_gender_list')[$v['gender']]['name'];?></td>
							<td class="am-hide-sm-only"><?php echo ($v["class_name"]); ?></td>
							<td><?php echo ($v["score_name"]); ?></td>
							<td><?php echo ($v["subject_name"]); ?></td>
							<td class="am-hide-sm-only"><?php echo ($v["score_level"]); ?></td>
							<td><?php echo ($v["score"]); ?></td>
							<td>
								<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-trash-o submit-delete" data-url="<?php echo U('Admin/Fraction/Delete');?>" data-am-popover="{content: '<?php echo L('common_operation_delete');?>', trigger: 'hover focus'}" data-id="<?php echo ($v["id"]); ?>-<?php echo ($v["student_id"]); ?>"></button>
							</td>
						</tr><?php endforeach; endif; ?>
				<?php else: ?>
					<tr><td colspan="10" class="table-no"><?php echo L('common_not_data_tips');?></td></tr><?php endif; ?>
			</tbody>
		</table>
		<!-- list end -->

		<!-- page start -->
		<?php if(!empty($list)): echo ($page_html); endif; ?>
		<!-- page end -->
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