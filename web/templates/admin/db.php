<?
require_once "func.php";
$back = getBack("/list/db/");
?>


<form id="vstobjects" name="<?=$formName ?>" method="post">
	<div class="content-wrapper">
		<?php include "content_header.php" ?>

		<!-- Main content -->
		<section class="content">

			<? if ($formName == "v_edit_db") : ?>
				<div class="row">

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Status</span>
								<span class="info-box-number"><?php echo __($v_status) ?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Created Date</span>
								<span class="info-box-number"><?php echo strftime("%d %b %Y", strtotime($v_date))?> <br/><?php echo $v_time?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>
				</div>
			<? endif; ?>

			<div class="row">

				<div class="col-md-7">

					<? if (!empty($_SESSION['error_msg'])) : ?>
						<div class="callout callout-danger">
							<h4>Error</h4>
							<p><?=$_SESSION['error_msg'] ?></p>
						</div>
					<? elseif (!empty($_SESSION['ok_msg'])) : ?>
						<div class="callout callout-info">
							<h4>Info</h4>
							<p><?=$_SESSION['ok_msg'] ?></p>
						</div>
					<? endif; ?>

					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><?=$title ?></h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label><?php print __('Database');?> </label>
									<? if (! isEditPage($formName)) : ?>
										<div class=" input-group">
											<span class="input-group-addon"><?=$user."_" ?></span>
											<input type="text" class="vst-input form-control" name="v_database" <?php if (!empty($v_database)) echo "value=".$v_database; ?> />
										</div>

										<p class="help-block">
											<?php print __('Prefix will be automaticaly added to database name and database user',$user."_");?>
										</p>
									<? else : ?>
										<input type="text" class="form-control"name="v_database" <?php if (!empty($v_database)) echo "value=".$v_database; ?> disabled>

									<? endif; ?>


							</div>

							<div class="form-group">
								<label><?php print __('User');?> </label>
								<input type="text"  class="form-control" name="v_dbuser" <?php if (!empty($v_dbuser)) echo "value=".$v_dbuser; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Password');?> / <a href="javascript:randomString();" class="generate"><?php print __('generate');?></a>
								</label>
								<input type="text"  class="form-control password" name="v_password" autocomplete="off" <?php if (!empty($v_password)) echo "value=".$v_password; ?>>
							</div>

							<div class="form-group">
								<label><?php print __('Type');?> </label>

								<? if (isEditPage($formName)) : ?>
									<input type="text" class="form-control"name="v_type" <?php if (!empty($v_type)) echo "value=".$v_type; ?> disabled>

								<? else : ?>
									<select class="vst-list form-control" name="v_type">
										<?php
										foreach ($db_types as $key => $value) {
											echo "\n\t\t\t\t\t\t\t\t\t\t<option value=\"".$value."\"";
											if ((!empty($v_type)) && ( $value == $v_type )) echo ' selected';
											echo ">".$value."</option>";
										}
										?>
									</select>
								<? endif; ?>


							</div>

							<div class="form-group">
								<label><?php print __('Host');?> </label>

								<? if (isEditPage($formName)) : ?>
									<input type="text" class="form-control"name="v_host" <?php if (!empty($v_host)) echo "value=".$v_host; ?> disabled>

								<? else : ?>

									<select class="vst-list form-control" name="v_host">
										<?php
										foreach ($db_hosts as $key => $value) {
											echo "\n\t\t\t\t\t\t\t\t\t\t<option value=\"".$key."\"";
											if ((!empty($v_host)) && ( $key == $v_host )) echo ' selected';
											echo ">".$key."</option>";
										}
										?>
									</select>
								<? endif; ?>


							</div>

							<div class="form-group">
								<label><?php print __('Charset');?> </label>

								<? if (isEditPage($formName)) : ?>
									<input type="text" class="form-control"name="v_charset" <?php if (!empty($v_charset)) echo "value=".$v_charset; ?> disabled>

								<? else : ?>
									<select class="form-control" name="v_charset">
										<option value=big5 <?php if ((!empty($v_charset)) && ( $v_charset == 'big5')) echo 'selected';?> >big5</option>
										<option value=dec8 <?php if ((!empty($v_charset)) && ( $v_charset == 'dec8')) echo 'selected';?> >dec8</option>
										<option value=cp850 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp850')) echo 'selected';?> >cp850</option>
										<option value=hp8 <?php if ((!empty($v_charset)) && ( $v_charset == 'hp8')) echo 'selected';?> >hp8</option>
										<option value=koi8r <?php if ((!empty($v_charset)) && ( $v_charset == 'koi8r')) echo 'selected';?> >koi8r</option>
										<option value=latin1 <?php if ((!empty($v_charset)) && ( $v_charset == 'latin1')) echo 'selected';?> >latin1</option>
										<option value=latin2 <?php if ((!empty($v_charset)) && ( $v_charset == 'latin2')) echo 'selected';?> >latin2</option>
										<option value=swe7 <?php if ((!empty($v_charset)) && ( $v_charset == 'swe7')) echo 'selected';?> >swe7</option>
										<option value=ascii <?php if ((!empty($v_charset)) && ( $v_charset == 'ascii')) echo 'selected';?> >ascii</option>
										<option value=ujis <?php if ((!empty($v_charset)) && ( $v_charset == 'ujis')) echo 'selected';?> >ujis</option>
										<option value=sjis <?php if ((!empty($v_charset)) && ( $v_charset == 'sjis')) echo 'selected';?> >sjis</option>
										<option value=hebrew <?php if ((!empty($v_charset)) && ( $v_charset == 'hebrew')) echo 'selected';?> >hebrew</option>
										<option value=tis620 <?php if ((!empty($v_charset)) && ( $v_charset == 'tis620')) echo 'selected';?> >tis620</option>
										<option value=euckr <?php if ((!empty($v_charset)) && ( $v_charset == 'euckr')) echo 'selected';?> >euckr</option>
										<option value=koi8u <?php if ((!empty($v_charset)) && ( $v_charset == 'koi8u')) echo 'selected';?> >koi8u</option>
										<option value=gb2312 <?php if ((!empty($v_charset)) && ( $v_charset == 'gb2312')) echo 'selected';?> >gb2312</option>
										<option value=greek <?php if ((!empty($v_charset)) && ( $v_charset == 'greek')) echo 'selected';?> >greek</option>
										<option value=cp1250 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp1250')) echo 'selected';?> >cp1250</option>
										<option value=gbk <?php if ((!empty($v_charset)) && ( $v_charset == 'gbk')) echo 'selected';?> >gbk</option>
										<option value=latin5 <?php if ((!empty($v_charset)) && ( $v_charset == 'latin5')) echo 'selected';?> >latin5</option>
										<option value=armscii8 <?php if ((!empty($v_charset)) && ( $v_charset == 'armscii8')) echo 'selected';?> >armscii8</option>
										<option value=utf8 <?php if ((!empty($v_charset)) && ( $v_charset == 'utf8')) echo 'selected';?> <?php if (empty($v_charset)) echo 'selected';?> >utf8</option>
										<option value=ucs2 <?php if ((!empty($v_charset)) && ( $v_charset == 'ucs2')) echo 'selected';?> >ucs2</option>
										<option value=cp866 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp866')) echo 'selected';?> >cp866</option>
										<option value=keybcs2 <?php if ((!empty($v_charset)) && ( $v_charset == 'keybcs2')) echo 'selected';?> >keybcs2</option>
										<option value=macce <?php if ((!empty($v_charset)) && ( $v_charset == 'macce')) echo 'selected';?> >macce</option>
										<option value=macroman <?php if ((!empty($v_charset)) && ( $v_charset == 'macroman')) echo 'selected';?> >macroman</option>
										<option value=cp852 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp852')) echo 'selected';?> >cp852</option>
										<option value=latin7 <?php if ((!empty($v_charset)) && ( $v_charset == 'latin7')) echo 'selected';?> >latin7</option>
										<option value=cp1251 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp1251')) echo 'selected';?> >cp1251</option>
										<option value=cp1256 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp1256')) echo 'selected';?> >cp1256</option>
										<option value=cp1257 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp1257')) echo 'selected';?> >cp1257</option>
										<option value=binary <?php if ((!empty($v_charset)) && ( $v_charset == 'binary')) echo 'selected';?> >binary</option>
										<option value=geostd8 <?php if ((!empty($v_charset)) && ( $v_charset == 'geostd8')) echo 'selected';?> >geostd8</option>
										<option value=cp932 <?php if ((!empty($v_charset)) && ( $v_charset == 'cp932')) echo 'selected';?> >cp932</option>
										<option value=eucjpms <?php if ((!empty($v_charset)) && ( $v_charset == 'eucjpms')) echo 'selected';?> >eucjpms</option>
									</select>

								<? endif; ?>


							</div>

							<? if (! isEditPage($formName)) : ?>
							<div class="form-group">
								<label><?php print __('Send login credentials to email address') ?>  </label>
								<input type="text"  class="form-control" name="v_db_email" <?php if (!empty($v_db_email)) echo "value=".$v_db_email; ?>>

							</div>
							<? endif; ?>
						</div>

						<div class="box-footer">
							<input type="submit" name="<?=$submitName ?>" value="<?php print $submitButtonName ?>" class="btn btn-primary">
							<input type="button" class="btn" value="<?php print __('Back');?>" onclick="<?php echo $back ?>">

						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
</form>

<script type="text/javascript">
	function elementHideShow(elementToHideOrShow) {
		var el = document.getElementById(elementToHideOrShow);
		if (el.style.display == "block") {
			el.style.display = "none";
		} else {
			el.style.display = "block";
		}
	}
	function randomString() {
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 10;
		var randomstring = '';
		for (var i=0; i<string_length; i++) {
			var rnum = Math.floor(Math.random() * chars.length);
			randomstring += chars.substring(rnum,rnum+1);
		}
		$("[name=v_password]").val(randomstring);
	}
</script>

<script type="text/javascript">
	GLOBAL.DB_USER_PREFIX = '<?php echo $user; ?>_';
	GLOBAL.DB_DBNAME_PREFIX = '<?php echo $user; ?>_';
</script>

<? if (isEditPage($formName)) : ?>
	<script type="text/javascript" src="/js/pages/edit.db.js"></script>
<? else : ?>
	<script type="text/javascript" src="/js/pages/add.db.js"></script>
<? endif; ?>


