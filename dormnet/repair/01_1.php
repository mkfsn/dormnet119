<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Dorm-net 119</title>
	<!-- TemplateEndEditable -->
	<!-- TemplateBeginEditable name="head" -->
	<!-- TemplateEndEditable -->
	<link href="./css/main.css" rel="stylesheet" type="text/css" />
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./scripts/main.js"></script>
</head>

<body>

<!-- HTML5 Canvas -->
<canvas height="300px">
	<p>Your browser doesn't support HTML5. Try using Firefox or Chrome.</p>
</canvas>
<script type="text/javascript" src="./scripts/bg.js"></script>

<div class="outerWrapper">
	<!-- @start .container -->
	<div class="container">
		<!-- @start .container -->
		<div class="header" style="width:1000px; height:200px;">
			<a href="./01_1.php"><img src="./images/banner.png" alt="Dormnet119 home" name="banner" /></a>
		<!-- end .header -->
		</div>

		<!-- @start .navbar -->
		<div id="navbar">
		<ul class="level1">
		<!-- Button 1 -->
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="宿網報修">宿網報修</a></li>

		<!-- Button 2 : Drop menu -->
		<li class="submenu">查詢...
			<ul class="level2">
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryIPInfomation&amp;lang=zh" title="查詢 IP 列表">查詢 IP 列表</a></li>
				<li><a href="http://wiki.cdpa.nsysu.edu.tw/Dorms_ip" title="封鎖列表" target="_blank">封鎖列表</a></li>
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryMACAddress&amp;lang=zh" title="維修進度">維修進度</a></li>
			</ul>
		</li>

		<!-- Button 3 -->
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="留言版">留言版</a></li>
		</ul>
		</div>
		<!-- @end .navigation -->

		<!-- @start .content -->
		<div class="content">

			<div>
				<h1 style="text-align: center; font-size: 36px; margin-left: -50px">宿網報修</h1>
			</div>

			<form name="buginfo" action="./?action=BugReport" method="post" onsubmit="return CheckInfo();">

				<!-- Box index 1 -->
				<div class="box1">
					<h2>聯絡方式</h2>
					<div class="input_type25em">
						<p>
							<input name="input_uname" placeholder="報修人姓名..." title="報修人姓名" maxlength="30" />
							*
						</p>
					</div>

					<div class="input_type25em">
						<p>
							<input name="input_email" placeholder="連絡信箱..." title="連絡信箱" maxlength="50" />
							*
							<span>
								<br />
								<small>(Ex. test@test.com)</small>
							</span>
						</p>
					</div>

					<div class="select_typ12em">
						<p>
							<select name="sel_dorm">
								<option value="" selected="selected"><-- 請選擇宿舍棟別 --></option>
								<option value="1">武嶺一村</option>
								<option value="2">武嶺二村</option>
								<option value="3">武嶺三村</option>
								<option value="4">武嶺四村</option>
								<option value="-">----------</option>
								<option value="A">翠亨A棟</option>
								<option value="B">翠亨B棟</option>
								<option value="C">翠亨C棟</option>
								<option value="D">翠亨D棟</option>
								<option value="E">翠亨E棟</option>
								<option value="F">翠亨F棟</option>
								<option value="G">翠亨G棟</option>
								<option value="H">翠亨H棟</option>
								<option value="L">翠亨L棟</option>
							</select>
							*
						</p>
					</div>

					<div class="input_type5em">
						<p>
							<input name="input_room" placeholder="房號..." title="房號" maxlength="5" />
							-
							<input name="input_roomPos" placeholder="床號..." title="床號" maxlength="5" />
							*
							<span>
								<br />
								<small>(Ex. 001-1)</small>
							</span>
						</p>
					</div>
				</div>

				<!-- Box index 2 -->
				<div class="box1">
					<h2>電腦設定</h2>
					<div class="input_type25em">
						<p>
							<input name="input_ip" placeholder="報修 IP 位址 (IPv4)..." title="報修 IP 位址 (IPv4)" maxlength="15" />
							*
							<span>
								<br />
								<small>(Ex. 140.117.255.255)</small>
							</span>
						</p>
					</div>
					<div class="input_type25em">
						<p>
							<input name="input_mac" placeholder="報修網路卡號 (MAC)..." title="報修網路卡號 (MAC)" maxlength="17" />
							*
							<span>
								<br />
								<small>(Ex. 00-AA-11-BB-22-CC)</small>
							</span>
						</p>
					</div>
				</div>

				<!-- Box index 3 -->
				<div class="box1">
					<h2>問題描述</h2>
					<div class="select_typ12em">
						<p>初步問題研判：
							<select name="sel_problem">
								<option value="" selected="selected"><-- 請選擇問題類型 --></option>
								<option value="ipstolen">(1) IP 被人佔用</option>
								<option value="reopen">(2) 申請解除封鎖</option>
								<option value="broken">(3) 網路插孔 外觀損壞，申請維修</option>
								<option value="dvo">(4) 網路插孔 已損壞</option>
								<option value="others">(5) 其他</option>
							</select>
							*
						</p>
					</div>

					<div class="textarea_typ16px">
						<p>
							<textarea name="textarea_desc">

你的問題描述...

</textarea>
						</p>
					</div>

					<br />
					<h3 class="formnote">送出維修申請單前，請再次確認上述資料填寫無誤，謝謝！</h3>
				</div>

				<div id="submitarea">
					<br />
					<input name="button_send" value="   送出 !   " type="submit" />
					<input name="button_clear" value="    清除    " type="reset" />
				</div>
			</form>

		<!-- @end .content -->
		</div>

		<!-- @start footer -->
		<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
			<br />
			Copyright © 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
		<!-- @end footer -->
		</div>

	<!-- @end .container -->
	</div>
</div>

</body>
</html>

