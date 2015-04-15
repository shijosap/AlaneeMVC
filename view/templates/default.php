<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="description"
	content="<?php echo $this->resultSet['meta']['description'];?>">
<meta name="keywords"
	content="<?php echo $this->resultSet['meta']['keywords'];?>">
<meta name="google-translate-customization"
	content="1fea04e055fb6965-35248e5248638537-g6177b01b3439e3b2-16"></meta>
<meta property="og:type" content="article" />
<meta property="og:image"
	content="http://japanmacroadvisors.com/images/japan-macro-advisors.png" />
<meta property="og:site_name" content="japanmacroadvisors.com" />
<meta property="og:url"
	content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
<meta property="og:title"
	content="<?php echo !isset($this->pageTitle) ? 'Japan economy | Macro economy | Economist - GDP, Inflation - Analysis on Japanese economy by Mr. Takuji Okubo' : $this->pageTitle; ?>" />
<meta property="og:description"
	content="<?php echo $this->resultSet['meta']['description'];?>" />
<base href="<?php echo $this->rootPath; ?>">
<title><?php echo !isset($this->pageTitle) ? 'Japan economy | Macro economy | Economist - GDP, Inflation - Analysis on Japanese economy by Mr. Takuji Okubo' : $this->pageTitle; ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/icon">
<link rel="icon" href="favicon.ico" type="image/icon">
<script type="text/javascript"
	src="<?php echo $this->javascript."jquery.min.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."handlebars-v2.0.0.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."jquery.fancybox-1.3.4.pack.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."highstock.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."jquery.validate.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."rgbcolor.js";?>"></script>
<script type="text/javascript"
	src="<?php echo $this->javascript."jma.js";?>"></script>
<?php echo $this->getAllJavascript(); ?>
<link
	href="http://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic"
	rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif"
	rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Arimo:400,700"
	rel="stylesheet" type="text/css">
<link href="<?php echo $this->css."master.css";?>" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" id="themeCSS"
	href="<?php echo $this->css."classic.css";?>" />
<link rel="stylesheet" href="<?php echo $this->css."style.css";?>" />
<link rel="stylesheet"
	href="<?php echo $this->css."jquery.fancybox-1.3.4.css";?>" />
<link rel="stylesheet" media="print"
	href="<?php echo $this->css."print_page.css";?>" />
<link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php echo $this->getAllCss(); ?>
<script type="text/javascript">
 var JMA = new Jma('<?php echo $this->rootPath; ?>','<?php echo $this->controllername; ?>','<?php echo $this->actionname; ?>','<?php echo is_array($this->params) ? implode('/', $this->params) : ''; ?>');
<?php
if (isset ( $_SESSION ['user'] ) && $_SESSION ['user'] ['id'] > 0) {
	?>
 	JMA.userDetails = <?php echo json_encode($_SESSION['user']);?>;
<?php

}
?>
</script>
</head>
<body onload="JMA.JMAChart.screen();">

	<script type="template/alanee" id="template_graph_full">
<div style="height:414px;margin-bottom:20px">
<div class="h_graph_wrap notranslate" id="h_graph_wrap_{{chart_details.chartIndex}}">
	<div class="h_graph_graph_area">
		<div class="h_graph_top_area">
			{{#unless chart_details.isRightPannel}}
			<a href="#"><i class="fa fa-download" style="color:#EF6F07"></i>&nbsp;Download</a> &nbsp;&nbsp;<a href="#"><i class="fa fa-file-image-o" style="color:#EF6F07"></i>&nbsp;Export</a>&nbsp;&nbsp;
			{{/unless}}
		</div>
		<div class="h_graph_content_area" id="Jma_chart_container_{{chart_details.chartIndex}}">
		 &nbsp;
		</div>
	</div>
	{{#if chart_details.isRightPannel}}
	<div class="h_graph_tab_area">
		<div class="Graph_tabset_tabset_tabs">
			<div chart_index="{{chart_details.chartIndex}}"  class="Graph_tabset_tab active fst Graph_tabset_tab_head_dataseries" contentdiv="#Dv_dataseries_{{chart_details.chartIndex}}"><div class="tab-title">Series</div></div>
			<div chart_index="{{chart_details.chartIndex}}" class="Graph_tabset_tab inactive mdl Graph_tabset_tab_head_download" contentdiv="#Dv_download_{{chart_details.chartIndex}}"><div class="tab-title">Download</div></div>
			<div chart_index="{{chart_details.chartIndex}}" class="Graph_tabset_tab inactive mdl Graph_tabset_tab_head_share" contentdiv="#Dv_share_{{chart_details.chartIndex}}"><div class="tab-title">Share</div></div>
		</div>
		<div class="Graph_tabset_contentarea">
			<div id="Dv_dataseries_{{chart_details.chartIndex}}" class="Graph_tabset_contentdiv graph-right">
				&nbsp;
			</div>
			<div id="Dv_download_{{chart_details.chartIndex}}" class="Graph_tabset_contentdiv graph-right" style="display:none">
				<div>
					<div><span class="addmore">Download Data</span></div>
					<div>
						<br>
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr><td align="left">
								Select format
							</tr></td>
							<tr><td align="center">
								<select id="download_data_select_format_{{chart_details.chartIndex}}" class="addmore-select">
									<option value="csv">Comma seperated Value (CSV)</option>
								</select>
							</tr></td>
							<tr><td align="center">
								<input type="button" style="width:67px;height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Download" onClick="JMA.JMAChart.downloadChartData({{chart_details.chartIndex}});">
								<form name="frm_download_chart_data_{{chart_details.chartIndex}}" id="frm_download_chart_data_{{chart_details.chartIndex}}" method="post" action="<?php echo $this->url('chart/downloadxls');?>">
									<input type="hidden" id="frm_input_download_chart_codes_{{chart_details.chartIndex}}" name="chart_codes" value="">
									<input type="hidden" id="frm_input_download_chart_datatype_{{chart_details.chartIndex}}" name="chart_datatype" value="">
								</form>
							</tr></td>
						</table>
					</div>
					<br><br>
					<div><span class="addmore">Export Chart</span></div>
					<div>
						<br>
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr><td align="left">
								Export as
							</tr></td>
							<tr><td align="center">
								<select id="export_chart_image_select_format_{{chart_details.chartIndex}}" class="addmore-select">
									<option value="jpeg">Image (JPEG)</option>
									<option value="png">Image (PNG)</option>
									<option value="pdf">Document (PDF)</option>	
								</select>
							</tr></td>
							<tr><td align="left">
								Select size
							</tr></td>
							<tr><td align="center">
								<select id="export_chart_image_size_{{chart_details.chartIndex}}" class="addmore-select">
									<option value="small">Small</option>
									<option value="medium">Medium</option>
									<option value="large">Large</option>	
								</select>
							</tr></td>
							<tr><td align="center">
								<input type="button" style="width:67px;height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Export" onClick="JMA.JMAChart.exportChart({{chart_details.chartIndex}});">&nbsp;&nbsp;
								<input type="button" style="width:67px;height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Print" onClick="JMA.JMAChart.printChart({{chart_details.chartIndex}});">
							</tr></td>
						</table>
					</div>
				</div>
			</div>
			<div id="Dv_share_{{chart_details.chartIndex}}" class="Graph_tabset_contentdiv graph-right" style="display:none">
				<div>
					<div class="social_share_buttons">
						<div class="social_icon_facebook"></div>
						<div class="social_share_button">
							<a href="javascript:void(0)" class="share" link_input_id="graph_share_url_{{chart_details.chartIndex}}" stype="facebook"><input type="button" style="height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Share on facebook"></a>
						</div>
					</div>
					<div class="social_share_buttons">
                    	<div class="social_icon_twitter"></div>
						<div class="social_share_button">
							<a href="javascript:void(0)" class="share" link_input_id="graph_share_url_{{chart_details.chartIndex}}" stype="twitter"><input type="button" style="height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Share on twitter"></a>
						</div>
					</div>
					<div class="social_share_buttons">
                    	<div class="social_icon_googleplus"></div>
						<div class="social_share_button">
							<a href="javascript:void(0)" class="share" link_input_id="graph_share_url_{{chart_details.chartIndex}}" stype="google"><input type="button" style="height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Share on google+"></a>
						</div>
					</div>
					<div class="social_share_buttons">
                    	<div class="social_icon_linkedin"></div>
						<div class="social_share_button">
							<a href="javascript:void(0)" class="share" link_input_id="graph_share_url_{{chart_details.chartIndex}}" stype="linkedin"><input type="button" style="height:20px;margin-left:10px;margin-top:10px;padding:2px" class="graph_share_button" value="Share on linkedin"></a>
						</div>
					</div>
					<div class="social_share_buttons">
                    	<div class="">Share Link</div>
						<div class="social_share_button">
							<input type="text" class="graph_share_input" name="graph_share_url_{{chart_details.chartIndex}}" id="graph_share_url_{{chart_details.chartIndex}}" value="<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'];?>" onclick="this.select()" readonly>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	{{/if}}
</div>
</div>
</script>
	<script type="template/alanee" id="template_graph_section_series">
<div>
	<div class="graph-list" id="Dv_placeholder_graph_series_section_{{chartIndex}}">
		{{#each current_series}}
		<div class="graph-line" id="Dv_placeholder_graph_currentseries_select_{{../chartIndex}}_{{@index}}">
			<select onChange="JMA.JMAChart.populateYSubDropdown({{../chartIndex}},{{@index}},this)">
				{{#each series}}
					<option value="{{@index}}" {{#if isCurrent}}selected{{/if}}>{{label}}</option>
				{{/each}}
			</select>
			{{#each series}}
				{{#if isCurrent}}
					<div class="Dv_placeholder_graph_currentseries_ysub_select">
					<select class="chart-select" onChange="JMA.JMAChart.replaceThisGraphCode({{../../../chartIndex}},{{@../index}},this)">
						{{#each series}}
						<option value="{{code}}" {{#if isCurrent}}selected{{/if}}>{{label}}</option>
						{{/each}}
					</select>
					</div>
				{{/if}}
			{{/each}}
			<div class="graph-line-controls">{{#ifCond @index '>' 0}}<a href="javascript:void(0)" onClick="JMA.JMAChart.removeThisChartCodeByIndex({{../../chartIndex}},{{@index}})">Remove</a>{{/ifCond}}</div>
		</div>
		{{/each}}
	</div>
	{{#if isAddMoreseries}}
	<div class="graph-addmore">
		<span class="addmore">Add More Series</span>
		<select id="select_series_addmore-select_{{chartIndex}}" class="addmore-select">
			{{#each available_series}}
			<option value="{{code}}">{{label}}</option>
			{{/each}}
		</select>
		<div class="dv_addmore-button"><a class="addmore-button" href="javascript:void(0)" onClick="JMA.JMAChart.addThisGraphCode({{chartIndex}})">Add more</a></div>
	</div>
	{{/if}}
	{{#ifCond isBarChart '!=' true}}
		<div class="checkbox"><input type="checkbox" value="checkbox" name="multiaxis_checkbox__{{chartIndex}}" id="multiaxis_checkbox__{{chartIndex}}" {{#if isMultiAxis}}checked{{/if}} onClick="JMA.JMAChart.switchToMultiAxisLine({{chartIndex}},this);">Multiple yAxis</div>
	{{/ifCond}}
	<div class="checkbox"><input type="checkbox" value="checkbox" name="barchart_checkbox__{{chartIndex}}" id="barchart_checkbox__{{chartIndex}}" {{#if isBarChart}}checked{{/if}} onClick="JMA.JMAChart.switchToBarChart({{chartIndex}},this);">Bar chart</div>
</div>
</script>
	<div id="wrapper">
		<!--header section-->
		<div id="headerouter">
			<div class="logosection">
				<a href="<?php echo $this->url('/');?>"><img
					src="<?php echo $this->images;?>logo.png"
					alt="Unbiased opinion on Japan's economy" /></a>
			</div>
			<div class="top_navigation">
				<ul>
					<li><a href="<?php echo $this->url('/');?>" class="top_link_common">Home</a></li>
					<li><a href="<?php echo $this->url('aboutus');?>"
						class="top_link_common">About us</a></li>
					<li><a href="<?php echo $this->url('products');?>"
						class="top_link_common">Products</a></li>
					<!-- <li><a href="<?php // echo $this->url('careers');?>"
						class="top_link_common">Careers</a></li> -->
					<li><a href="<?php echo $this->url('contact');?>"
						class="top_link_common">Contact</a></li>
         <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] > 0) {?>
        <li><a href="<?php echo $this->url('aboutus/privacypolicy');?>"
						class="top_link_common">Our Privacy Policy</a></li>
					<li><a href="<?php echo $this->url('user/myaccount');?>"
						class="top_link_common"><font color="red"><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname'];?></font></a></li>
					<li class="last"><a href="<?php echo $this->url('user/logout');?>"
						class="top_link_common">Signout</a></li>
		<?php } else {?>
		<li><a href="<?php echo $this->url('aboutus/privacypolicy');?>"
						class="top_link_common">Our Privacy Policy</a></li>
					<li class="last" id="lnk_client_login"><a
						href="<?php echo $this->url('user/login');?>"
						class="top_link_client_login">USER LOGIN</a></li>
		<?php }?>
      </ul>
				<br>
				<br>
				<div id="google_translate_element" style="float: right"></div>
				<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'af,ar,az,be,bg,bn,bs,ca,ceb,cs,cy,da,de,el,en,eo,es,et,eu,fa,fi,fr,ga,gl,gu,ha,hi,hmn,hr,ht,hu,hy,id,ig,is,it,iw,jv,ka,kk,km,kn,ko,la,lo,lt,lv,mg,mi,mk,ml,mn,mr,ms,mt,my,nl,no,ny,pa,pl,pt,ro,ru,si,sk,sl,so,sq,sr,su,sv,sw,ta,te,tg,th,tl,tr,uk,ur,uz,vi,yi,yo,zh-CN,zh-TW,zu', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>
				<script type="text/javascript"
					src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

			</div>
			<div id="header-logo">

				<a href=<?php echo $this->url('user/myaccount/subscription');?>>
					<div class="right"> 
  
  	<?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] > 0) { ?>
  		
		<div style="color: #393939; margin-top: 0px; font-size: 12px">
							<div style="font-size: 14px">
								<i style="color: #EF6F07; font-size: 14px;" class="fa fa-th"></i>&nbsp;<strong><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname'];?></strong>
							</div>
							<div style="margin-top: 14px; padding-left: 15px;">			
			<?php if ($_SESSION['user']['user_type'] == 'corporate') {?>
				<i style="color: #22558F; font-size: 14px"
									class="fa fa-building fa-lg"></i>&nbsp;<strong>Corporate
									Account</strong>
			<?php } ?>
			<?php if ($_SESSION['user']['user_type'] == 'individual') {?>
				<i style="color: #22558F; font-size: 14px; margin: 0 0 0 0;"
									class="fa fa-user fa-lg"></i><i
									style="color: #22558F; font-size: 10px; margin: -10px -1px -6px -2px;"
									class="fa fa-star fa-fw"></i>&nbsp;<strong>Premium Account</strong>
			<?php } ?>		
			<?php if ($_SESSION['user']['user_type'] == 'free') {?>
				<i style="color: #6EB92B; font-size: 14px; margin: 8px 0 0;"
									class="fa fa-user fa-lg"></i>&nbsp;<strong>Individual Free
									Accounts</strong>
			<?php } ?>
			</div>
							<!-- 
			<div style="margin-top:10px;padding-left:15px;">
			<?php // if ($_SESSION['user']['user_type'] != 'free' && time() > $_SESSION['user']['expiry_on']) {?>
				<i style="color:#EF6F07;font-size:14px;" class="fa fa-calendar-o"></i>&nbsp;<strong>Account is expired.</strong>
			<?php // }elseif($_SESSION['user']['user_type'] != 'individual'){?>			
				<i style="color:#EF6F07;font-size:14px;" class="fa fa-calendar-o"></i>&nbsp;<strong>Expiry on <?php // echo date('d, M Y',$_SESSION['user']['expiry_on']);?></strong>
			<?php // }else{?>
				<i style="color:#EF6F07;font-size:14px;" class="fa fa-calendar-o"></i>&nbsp;<strong>Expiry : NA</strong>
			<?php // }?>
			</div>
			 -->
						</div>
		<?php } else {?>
		<div id="Dv_top_right_register_go">
							<a id="Dv_top_right_register_go_icon"
								href="<?php echo $this->url('user/signup');?>"><div class="icon">
									<i class="fa fa-play-circle"
										style="color: #F39019; font-size: 36px; padding: 1px 10px 3px 2px;"></i>
								</div>
								<div class="icon">
									Register <br>for a Free account
								</div> </a>
						</div>
					<?php
				if ($this->resultSet ['status'] == 3333) {
					$login_msgs = $this->resultSet ['message'];
				} else {
					$login_msgs = '';
				}
				$register_msg = '';
				?>
				<?php if(!isset($_COOKIE['isLoginBox']) || $_COOKIE['isLoginBox'] !='0'){?>
					<div class='popup'>
							<div class='cnt223'>
								<div class="POPUser">
									<i class="fa fa-user fa-lg"
										style="color: #666666; font-size: 17px; margin: 0 4px 1px 5px;"></i>User
									Login
									<div alt='quit' class='x' id='x'>
										<i class="fa fa-times" style="color: #EA2635"></i>
									</div>
								</div>
								<div id="Dv_login_wrapper">

									<form name="login_frm" id="login_frm"
										action="<?php echo $this->url('/user/login');?>" method="post">
										<div class="login_box_input">
											<input type="text" placeholder="User ID"
												class="formPop_textfield" name="login_email"
												id="login_email" />
										</div>
										<div class="login_box_input">
											<input type="password" placeholder="password"
												class="formPop_textfield" name="login_password"
												id="login_password" />
										</div>
										<div class="login_box_input">
											<input type="submit" value="&nbsp;&nbsp;Submit&nbsp;&nbsp;"
												class="form_pop_btn" name="login_btn" style="height: 30px" />
										</div>
										<div class="ForPassword">
											<a href="<?php echo $this->url('user/forgotpassword');?>">Forgot
												your password?</a>
										</div>
									</form>
									<div class="HR"></div>
									<div class="popreg">
										<a class="form_submit" href="user/signup"
											style="text-decoration: none; color: white; background: #EA6F1F; font-size: 12px;"><i
											class="fa fa-play-circle"
											style="color: white; font-size: 20px"></i>&nbspREGISTER FREE</a>
									</div>
								</div>
							</div>
						</div>
			<?php }?>			
  	<?php }?>
  </div>
				</a>
				<div class="left" style="margin-top: 40px;">CONCISE AND INSIGHTFUL
					ANALYSIS ON THE JAPANESE ECONOMY</div>

			</div>
		</div>
		<!--header section-->
		<!--content section-->
		<div class="contentouter">
 <?php
	include ('view/templates/left_navigation.php');
	?>

	<?php
	$this->view ();
	?>
<?php

	include ('view/templates/footer.php');
	?>
<script type="text/javascript">
//script
if ( !("placeholder" in document.createElement("input")) ) {
    $("input[placeholder], textarea[placeholder]").each(function() {
        var val = $(this).attr("placeholder");
        if ( this.value == "" ) {
            this.value = val;
        }
        $(this).focus(function() {
            if ( this.value == val ) {
                this.value = "";
            }
        }).blur(function() {
            if ( $.trim(this.value) == "" ) {
                this.value = val;
            }
        });
    });

    // Clear default placeholder values on form submit
    $('form').submit(function() {
        $(this).find("input[placeholder], textarea[placeholder]").each(function() {
            if ( this.value == $(this).attr("placeholder") ) {
                this.value = "";
            }
        });
    });
}
/*
$(".cls_graph_share_form").each(function(){$(this).validate({
	rules: {
		graph_share_input_to_email: {
			required : true,
			comaseperatedemail : true
		},
		graph_share_input_from_email : {
			required : true,
			email : true,
			maxlength : 40
		}
	},
	messages: {
		graph_share_input_to_email: {
			required : "",
			comaseperatedemail : ""
		},
		graph_share_input_from_email: {
			required : "",
			email : ""
		}
	},
	errorLabelContainer : '#placeholder_error_dv',
//	wrapper: "li",
	submitHandler : function(form) {
		var idx= $(form).attr('g_idx');
		graph.sendShare(idx);
	},
	invalidHandler : function(event, validator) {
		var errMsg = '';
		$.each(validator.errorList,function(key,value) {
			errMsg += value['message']+'<br>';
		});
		$('#placeholder_error_dv').html(errMsg);
	}
	showErrors: function(errorMap, errorList) {
		var errMsg = '';
		$.each(errorList,function(key,value) {
			errMsg += value['message']+'<br>';
		});
		$('#placeholder_error_dv').html(errMsg);
	}
});}); 
*/
</script>
			<div id="Dv_modal_login" title="User Log-In">
				<form name="login_frm_ajx" id="login_frm_ajx"
					action="<?php echo $this->url('/user/login');?>" method="post">
					<div style="width: 472px; height: 21px">
						<div style="float: right; cursor: pointer" class="modal_close_btn"
							onclick="$.fancybox.close();"></div>
					</div>
					<div class="modal_login_box_outer">
						<div class="modal_login_box_inner">
							<div style="width: 422px;">
								<div class="Users">
									<h4>User Log-in</h4>
								</div>
								<div class="icons">
									<div class="Uheader">

										<div class="download">
											<i class="fa fa-user fa-lg"
												style="color: #6EB92B; font-size: 22px;"></i>FREE
										</div>
									</div>
									<div class="premium" style="float: left">
										<div class="Uheader">
											<div class="icon">
												<i class="fa fa-user fa-lg"
													style="color: #22558F; font-size: 20px;"></i>
											</div>
											<div class="icon">
												<i class="fa fa-star fa-fw"
													style="color: #22558F; font-size: 12px; margin: -7px 0 0 -6px;"></i>
											</div>
											<div class="icon">PREMIUM</div>
										</div>
										<div class="Uheader">
											<i class="fa fa-building fa-lg"
												style="color: #22558F; font-size: 18px"></i>CORPORATE
										</div>
									</div>
								</div>
							</div>
							<br style="clear: left;" />
							<div style="font-size: 12px; padding-bottom: 6px">
								<div class="premium">
									This content is restricted <b>for paying users only.</b> If you
									are a CORPORATE or PREMIUM account user, please log-in.<br>
								</div>
								<div class="download">
									Please log-in to access our <b>data download functions.</b><br>
								</div>
							</div>
							</br>
							<div class="login_frm_ajx_login_status"
								style="font-size: 12px; padding-bottom: 6px; display: none; color: #ff0000;">
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right" style="font-size: 12px">
									Username &nbsp;&nbsp;&nbsp;&nbsp; <input type="text"
										class="form_textfield" name="login_email" id="login_email"
										style="border-radius: 1px;" />
								</div>
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right" style="font-size: 12px">
									Password &nbsp;&nbsp;&nbsp;&nbsp; <input type="password"
										class="form_textfield" name="login_password"
										id="login_password" style="border-radius: 1px;" /> <input
										type="hidden" name="chart_login_perm_type"
										id="chart_login_perm_type" value=""> <input type="hidden"
										name="chart_login_chart_index" id="chart_login_chart_index"
										value="">
										<input type="hidden"
										name="chart_login_premium_url" id="chart_login_premium_url"
										value="">
								</div>
							</div>
							<div class="modal_register_form_singleouter" id="SubmitForgotPss"
								style="margin-left: 72px;">
								<div id="SubmitForgotPss">
									<input type="button" value="Submit" class="form_submit_btn"
										name="login_btn" id="pop_login_btn"
										style="height: 30px; width: 117px; background: #578ACA" />
								</div>
								<div class="form_singleouter_right" id="SubmitForgotPss"
									style="width: 117px; margin-top: 7px;">
									<a href="<?php echo $this->url('user/forgotpassword');?>">Forgot
										Password?</a>
								</div>
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right_modal">
									<div class="premium">
										<a href="<?php echo $this->url('products');?>">Request
											Information </a> of CORPORATE or PREMIUM account.
									</div>
									<div class="download">
										Not registered?</br> <i class="fa fa-play-circle"
											style="color: #F39019; font-size: 20px; padding: 1px 5px 3px 2px;"></i><a
											href="<?php echo $this->url('products');?>">Setup an <b>INDIVIDUAL
												Free Account</b></a> to access our download functions free
										of charge.
									</div>

								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div id="Dv_modal_upgrade" title="Upgrade subscription">
				<input type="hidden" value="<?php echo $login_ts; ?>"
					name="login_ts" />
				<div style="width: 472px; height: 21px">
					<div style="float: right; cursor: pointer" class="modal_close_btn"
						onclick="$.fancybox.close();"></div>
				</div>
				<div class="modal_login_box_outer">
					<div class="modal_login_box_inner">
						<!--Hi, <strong><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']?></strong><br>
						<br> Sorrry..! you do not have permission to view premium
						contents. Please review your subscription status.<br>
						<br> <a href="<?php echo $this->url('user/myaccount');?>">Account
							details</a>-->
						</br>
						</br>
						<div class="form_singleouter_right_modal" style="font-size: 12px;">
							Sorry, this content is restricted <b>for paying users only.</b> <a
								href="<?php echo $this->url('helpdesk/post');?>" style="">Request
								Information</a> of CORPORATE or PREMIUM account.
						</div>

					</div>
				</div>
			</div>
			<div id="Dv_modal_login" title="User Log-In">
				<form name="login_frm" id="login_frm"
					action="<?php echo $this->url('/user/login');?>" method="post">
					<input type="hidden" value="<?php echo $login_ts; ?>"
						name="login_ts" />
					<div style="width: 472px; height: 21px">
						<div style="float: right; cursor: pointer" class="modal_close_btn"
							onclick="$.fancybox.close();"></div>
					</div>
					<div class="modal_login_box_outer">
						<div class="modal_login_box_inner">
							<h4>User Log-in</h4>
							<div style="font-size: 12px; padding-bottom: 6px">
								Please enter your username and password to access your
								subscriptions.<br>
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right" style="font-size: 12px">
									Username<br>
									<input type="text" class="form_textfield" name="login_email"
										id="login_email" />
								</div>
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right" style="font-size: 12px">
									Password<br>
									<input type="password" class="form_textfield"
										name="login_password" id="login_password" />
								</div>
							</div>
							<div class="modal_register_form_singleouter">
								<input type="submit" value="Submit" class="form_submit_btn"
									name="login_btn" style="height: 30px" />
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right">
									<a href="<?php echo $this->url('user/forgotpassword');?>">Forgot
										Password?</a>
								</div>
							</div>
							<div class="modal_register_form_singleouter">
								<div class="form_singleouter_right_modal">
									Regular Visitor? <a
										href="<?php echo $this->url('user/signup');?>">Setup a
										full-featured free trial account for 30 days.</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div id="Dv_modal_upgrade" title="Upgrade subscription">
				<input type="hidden" value="<?php echo $login_ts; ?>"
					name="login_ts" />
				<div style="width: 472px; height: 21px">
					<div style="float: right; cursor: pointer" class="modal_close_btn"
						onclick="$.fancybox.close();"></div>
				</div>
				<div class="modal_login_box_outer">
					<div class="modal_login_box_inner">
						Hi, <strong><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']?></strong><br>
						<br> Sorrry..! you do not have permission to view premium
						contents. Please review your subscription status.<br>
						<br> <a href="<?php echo $this->url('user/myaccount');?>">Account
							details</a>
					</div>
				</div>
			</div>

</body>
</html>