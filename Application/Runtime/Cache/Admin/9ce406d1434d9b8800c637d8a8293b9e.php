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
		<form class="am-form view-list" action="<?php echo U('Admin/Student/Index');?>" method="POST">
			<div class="am-g">
				<input type="text" class="am-radius form-keyword" placeholder="<?php echo L('student_so_keyword_tips');?>" name="keyword" <?php if(isset($param['keyword'])): ?>value="<?php echo ($param["keyword"]); ?>"<?php endif; ?> />
				<button type="submit" class="am-btn am-btn-secondary am-btn-sm am-radius form-submit"><?php echo L('common_operation_query');?></button>
				<label class="fs-12 m-l-5 c-p fw-100 more-submit">
					<?php echo L('common_more_screening');?>
					<input type="checkbox" name="is_more" value="1" id="is_more" <?php if(isset($param['is_more']) and $param['is_more'] == 1): ?>checked<?php endif; ?> />
					<i class="am-icon-angle-down"></i>
				</label>

				<div class="more-where <?php if(!isset($param['is_more']) or $param['is_more'] != 1): ?>none<?php endif; ?>">
					<select  class="am-radius c-p m-t-10 m-l-5 param-where" name="region_id">
						<option value="0"><?php echo L('student_region_text');?></option>
						<?php if(is_array($region_list)): foreach($region_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['region_id']) and $param['region_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="class_id" class="am-radius c-p m-t-10 m-l-5 param-where">
						<option value="0"><?php echo L('student_class_text');?></option>
						<?php if(is_array($class_list)): foreach($class_list as $key=>$v): if(empty($v['item'])): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['class_id']) and $param['class_id'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option>
							<?php else: ?>
								<optgroup label="<?php echo ($v["name"]); ?>">
									<?php if(is_array($v["item"])): foreach($v["item"] as $key=>$vs): ?><option value="<?php echo ($vs["id"]); ?>" <?php if(isset($param['class_id']) and $param['class_id'] == $vs['id']): ?>selected<?php endif; ?>><?php echo ($vs["name"]); ?></option><?php endforeach; endif; ?>
								</optgroup><?php endif; endforeach; endif; ?>
					</select>
					<select name="state" class="am-radius c-p m-t-10 m-l-5 param-where">
						<option value="-1"><?php echo L('common_view_student_state_name');?></option>
						<?php if(is_array($common_student_state_list)): foreach($common_student_state_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['state']) and $param['state'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="tuition_state" class="am-radius c-p m-t-10 m-l-5 param-where">
						<option value="-1"><?php echo L('student_tuition_state_text');?></option>
						<?php if(is_array($common_tuition_state_list)): foreach($common_tuition_state_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['tuition_state']) and $param['tuition_state'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="gender" class="am-radius c-p m-t-10 m-l-5 param-where">
						<option value="-1"><?php echo L('common_view_gender_name');?></option>
						<?php if(is_array($common_gender_list)): foreach($common_gender_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(isset($param['gender']) and $param['gender'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<div class="param-date param-where m-l-5">
						<input type="text" name="time_start" readonly="readonly" class="am-radius m-t-10" placeholder="<?php echo L('student_time_start_text');?>" id="time_start" <?php if(isset($param['time_start'])): ?>value="<?php echo ($param["time_start"]); ?>"<?php endif; ?>/>
						<span>~</span>
						<input type="text" readonly="readonly" class="am-radius m-t-10" placeholder="<?php echo L('student_time_end_text');?>" name="time_end" id="time_end" <?php if(isset($param['time_end'])): ?>value="<?php echo ($param["time_end"]); ?>"<?php endif; ?>/>
					</div>
				</div>
			</div>
        </form>
        <!-- form end -->

        <!-- operation start -->
        <div class="am-g m-t-15">
            <a href="<?php echo U('Admin/Student/SaveInfo');?>" class="am-btn am-btn-secondary am-radius am-btn-xs am-icon-plus"> <?php echo L('common_operation_add');?></a>
        </div>
        <!-- operation end -->

		<!-- list start -->
		<table class="am-table am-table-striped am-table-hover am-text-middle m-t-10 m-l-5">
			<thead>
				<tr>
					<th><?php echo L('student_username_name');?></th>
					<th class="am-hide-sm-only"><?php echo L('common_view_id_card_text');?></th>
					<th><?php echo L('common_view_gender_name');?></th>
					<th class="am-hide-sm-only"><?php echo L('student_class_text');?></th>
					<th class="am-hide-sm-only"><?php echo L('common_view_student_state_name');?></th>
					<th><?php echo L('common_more_name');?></th>
					<th><?php echo L('common_operation_name');?></th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$v): ?><tr id="data-list-<?php echo ($v["id"]); ?>-<?php echo ($v["id_card"]); ?>">
							<td><?php echo ($v["username"]); ?></td>
							<td class="am-hide-sm-only"><?php echo ($v["id_card"]); ?></td>
							<td><?php echo L('common_gender_list')[$v['gender']]['name'];?></td>
							<td class="am-hide-sm-only"><?php echo ($v["class_name"]); ?></td>
							<td class="am-hide-sm-only"><?php echo L('common_student_state_list')[$v['state']]['name'];?></td>
							<td>
								<span class="am-icon-caret-down c-p" data-am-modal="{target: '#my-popup<?php echo ($v["id"]); ?>'}"> <?php echo L('common_see_more_name');?></span>
								<div class="am-popup am-radius" id="my-popup<?php echo ($v["id"]); ?>">
									<div class="am-popup-inner">
										<div class="am-popup-hd">
											<h4 class="am-popup-title"><?php echo L('common_detail_content');?></h4>
											<span data-am-modal-close
											class="am-close">&times;</span>
										</div>
										<div class="am-popup-bd">
											<dl class="dl-content">
												<dt><?php echo L('common_address_text');?></dt>
												<dd><?php echo ($v["region_name"]); ?> <?php echo ($v["address"]); ?></dd>

												<dt><?php echo L('student_birthday_text');?></dt>
												<dd><?php echo date('Y-m-d', $v['birthday']);?></dd>

												<dt><?php echo L('student_sign_up_name');?></dt>
												<dd><?php echo date('Y-m-d H:i:s', $v['add_time']);?></dd>

												<dt><?php echo L('common_view_tel_name');?></dt>
												<dd><?php echo ($v["tel"]); ?></dd>

												<dt><?php echo L('student_class_text');?></dt>
												<dd><?php echo ($v["class_name"]); ?></dd>

												<dt><?php echo L('student_tuition_state_text');?></dt>
												<dd><?php echo L('common_tuition_state_list')[$v['tuition_state']]['name'];?></dd>

												<dt><?php echo L('common_view_student_state_name');?></dt>
												<dd><?php echo L('common_student_state_list')[$v['state']]['name'];?></dd>
											</dl>
										</div>
									</div>
								</div>
							</td>
							<td>
								<a href="<?php echo U('Admin/Fraction/SaveInfo', array('id'=>$v['id']));?>">
									<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-line-chart" data-am-popover="{content: '<?php echo L('common_operation_fraction');?>', trigger: 'hover focus'}"></button>
								</a>
								<a href="<?php echo U('Admin/Student/SaveInfo', array('id'=>$v['id']));?>">
									<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-edit" data-am-popover="{content: '<?php echo L('common_operation_edit');?>', trigger: 'hover focus'}"></button>
								</a>
								<button class="am-btn am-btn-default am-btn-xs am-radius am-icon-trash-o submit-delete" data-url="<?php echo U('Admin/Student/Delete');?>" data-am-popover="{content: '<?php echo L('common_operation_delete');?>', trigger: 'hover focus'}" data-id="<?php echo ($v["id"]); ?>-<?php echo ($v["id_card"]); ?>"></button>
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