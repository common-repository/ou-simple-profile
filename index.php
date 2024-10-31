<?php
/*
Plugin Name: OU SIMPLE PROFILE
Plugin URI: http://oleksandrustymenko.com/ousimpleprofile.html
Description: OU SIMPLE PROFILE is a simple plugin to create the user profile. Add shorcode [ousimpleprofilecode] on your page. 
Version: 1.0
Author: Oleksandr Ustymenko
Author URI: http://oleksandrustymenko.com
*/

/*  
	Copyright 2016 oleksandr87 (email:ustymenkooleksandrnew@gmail.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
global $jal_db_version;
$jal_db_version = "1.0";

function ousimpleprofileactivate () 
{
	global $wpdb;
	global $jal_db_version;
	
	$ousimpleprofiledbtable = $wpdb->prefix . "ousimpleprofiledb";
	if($wpdb->get_var("show tables like '$ousimpleprofiledbtable'") != $ousimpleprofiledbtable)
	{     
		$sql = "CREATE TABLE " . $ousimpleprofiledbtable . " (
		ousimpleprofile_id INTEGER NOT NULL AUTO_INCREMENT,
		ousimpleprofile_id_user INTEGER,
		ousimpleprofile_firstname TEXT,
		ousimpleprofile_lastname TEXT,
		ousimpleprofile_avatar TEXT,
		ousimpleprofile_alias TEXT,
		ousimpleprofile_gender TEXT,
		ousimpleprofile_country TEXT,
		ousimpleprofile_city TEXT,
		ousimpleprofile_zip TEXT,
		ousimpleprofile_email TEXT,
		ousimpleprofile_activity TEXT,
		ousimpleprofile_interests TEXT,
		ousimpleprofile_skills TEXT,
		ousimpleprofile_aboutme TEXT,
		ousimpleprofile_status TEXT,
		UNIQUE KEY  (ousimpleprofile_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		add_option("jal_db_version", $jal_db_version);  
	}
}
register_activation_hook(__FILE__,'ousimpleprofileactivate');

function ousimpleprofiledeactivate()
{
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ousimpleprofiledb");
}
register_uninstall_hook(__FILE__, 'ousimpleprofiledeactivate');


function ousimpleprofile_cssfile() 
{
	wp_register_style('ousimpleprofile-style', plugins_url('ousimpleprofile.css', __FILE__));
	wp_enqueue_style('ousimpleprofile-style');
}

function ousimpleprofile_jsfile() 
{
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'ousimpleprofilescript', plugin_dir_url( __FILE__ ) . 'js/ousimpleprofilescript.js');
	
	wp_localize_script( 'jquery', 'ouspajaxw', 
	array(
   'ouspajax_url'   => admin_url('admin-ajax.php'),
   'ouspajax_nonce' => wp_create_nonce('ouspcreatenonce')
	));
	
}

add_action('wp_enqueue_scripts', 'ousimpleprofile_jsfile');

add_action('wp_enqueue_scripts', 'ousimpleprofile_cssfile');


function ouspguserdisplayf()
{
	$idusermain = intval($_POST['idusermain']);
	$ouspverify_nonce = $_POST['nonce'];
	
	if (!wp_verify_nonce($ouspverify_nonce, 'ouspcreatenonce'))
	{
		wp_die();
	}
		
	require_once( plugin_dir_path(__FILE__).'main_user.php');
	exit;
}
add_action( 'wp_ajax_ouspguserdisplay', 'ouspguserdisplayf' );
add_action( 'wp_ajax_nopriv_ouspguserdisplay', 'ouspguserdisplayf' );


function ouspguserdisplaysearchf()
{
	$ouspverify_nonce1 = $_POST['nonce'];
	if (!wp_verify_nonce($ouspverify_nonce1, 'ouspcreatenonce'))
	{
		wp_die();
	}
		
	require_once( plugin_dir_path(__FILE__).'search_result.php');
	exit;
}

add_action( 'wp_ajax_ouspguserdisplaysearch', 'ouspguserdisplaysearchf' );
add_action( 'wp_ajax_nopriv_ouspguserdisplaysearch', 'ouspguserdisplaysearchf' );


function ouspguserdisplaysearchuserf()
{
	$ouspverify_nonce2 = $_POST['nonce'];
	if (!wp_verify_nonce($ouspverify_nonce2, 'ouspcreatenonce'))
	{
		wp_die();
	}
		
	require_once( plugin_dir_path(__FILE__).'search_profile.php');
	exit;
}

add_action( 'wp_ajax_ouspguserdisplaysearchuser', 'ouspguserdisplaysearchuserf' );
add_action( 'wp_ajax_nopriv_ouspguserdisplaysearchuser', 'ouspguserdisplaysearchuserf' );

function ouspgusereditimagef()
{
	$ouspverify_nonce3 = $_POST['nonce'];
	if (!wp_verify_nonce($ouspverify_nonce3, 'ouspcreatenonce'))
	{
		wp_die();
	}
		
	require_once( plugin_dir_path(__FILE__).'ousimple_uploadimagedb.php');
	exit;
}

add_action( 'wp_ajax_ouspgusereditimage', 'ouspgusereditimagef' );

function ouspgusereditimagedeletef()
{
	$ouspverify_nonce4 = $_POST['nonce'];
	if (!wp_verify_nonce($ouspverify_nonce4, 'ouspcreatenonce'))
	{
		wp_die();
	}
		
	require_once( plugin_dir_path(__FILE__).'ousimple_uploadimagedeldb.php');
	exit;
}

add_action( 'wp_ajax_ouspgusereditimagedelete', 'ouspgusereditimagedeletef' );

function ouspgusereditsaveinfof()
{
	$ouspverify_nonce5 = $_POST['nonce'];
	if (!wp_verify_nonce($ouspverify_nonce5, 'ouspcreatenonce'))
	{
		wp_die();
	}
	
	require_once( plugin_dir_path(__FILE__).'ousimple_saveinfodb.php');
	exit;
}

add_action( 'wp_ajax_ouspgusereditsaveinfo', 'ouspgusereditsaveinfof' );

function ousimpleprofilecodefunction()
{
	global $wpdb;
	global $jal_db_version;
	$ou_s_p_check_user = get_current_user_id();
	
	if(!empty($ou_s_p_check_user))
	{
		$ousimpleprofiledbtablecheck = $wpdb->prefix . "ousimpleprofiledb";
		
		$ou_check_user_in_db =	$wpdb->get_var( "SELECT COUNT(*) FROM $ousimpleprofiledbtablecheck where ousimpleprofile_id_user = $ou_s_p_check_user " );
	
		if($ou_check_user_in_db ==0)
		{
			$ou_simple_profile_status ='yes';
			$wpdb->insert( $ousimpleprofiledbtablecheck, array( 'ousimpleprofile_status' => $ou_simple_profile_status, 'ousimpleprofile_id_user' => $ou_s_p_check_user  ) );
		}
	
	}
	
	echo '<div class="ou_simple_profile_css_main_window">';
		
		echo '<div style="width:698px; background:#071d07;">';
			echo '<div class="ousimpleprofilelink0" style="padding:5px; text-align:right;">';
				
				echo '<a href="#" onclick="ou_s_p_search(); return false;">Search</a>';
				if(!empty($ou_s_p_check_user))
				{
					echo '<span style="color:#FFB90F; font-size:18px;"> | </span>';
					echo '<span id="ou_p_e_d_m_edit_m1"><a href="#" style="font-size:18px;" onclick="ou_s_p_edit_profile(); return false;">Edit Profile</a></span>';
					echo '<span style="display:none;" id="ou_p_e_d_m_edit_m2"><a href="#" style="font-size:18px;" onclick="ou_s_p_edit_profile_hide(); return false;">Edit Profile (hide)</a></span>';
				}
			echo '</div>';
		echo '</div>'; 
		$ou_s_p_s_s_just_file = plugin_dir_url( __FILE__ );
		$ou_s_p_s_s_just_file1 = $ou_s_p_s_s_just_file.'search_result.php';
		$ou_s_p_s_s_just_loader = $ou_s_p_s_s_just_file.'images/loader.gif';
		?>
		<script>
		function ou_simple_p_s_s_search()
		{
			var formData = new FormData(jQuery('#ou_simple_p_s_search_form')[0]);
			formData.append('action', 'ouspguserdisplaysearch');
			formData.append('nonce', ouspajaxw.ouspajax_nonce);
			jQuery.ajax({
			type: "post",
			url: ouspajaxw.ouspajax_url,
			data: formData,
			contentType:false,
			processData:false,
			beforeSend: function() 
			{
				jQuery("#ou_s_s_search_result_display2").hide();
				jQuery("#ou_s_s_search_result_display2").empty();
				jQuery("#ou_s_s_search_hide_button1").hide();
				jQuery("#ou_s_s_search_result_display").empty();
				jQuery("#ou_s_s_search_result_display").hide();
				jQuery("#ou_s_p_s_s_search_loader1").show();
			},
			success: function(html)
			{
				jQuery("#ou_s_p_s_s_search_loader1").hide();
				jQuery("#ou_s_s_search_result_display").empty();
				jQuery("#ou_s_s_search_result_display").show();
				jQuery("#ou_s_s_search_result_display").append(html);
				jQuery("#ou_s_s_search_hide_button1").show();
			}
			});
		}
		</script>
		<?php
		echo '<div style="width:698px; min-height:100px;" id ="ousimpleprofile_main">';
			require_once( plugin_dir_path(__FILE__).'main.php');
		echo '</div>';
	
		echo '<div style="display:none; width:698px; min-height:100px;" id ="ousimpleprofile_search">';
			echo '<div style="margin:5px; width:688px;">';
				echo '<div style="padding:5px 5px 5px 5px; font-size:20px; color:#36648B;">';
					echo 'Search';
				echo '</div>';
			echo '</div>';
		
			echo '<div style="margin:5px; width:688px; overflow:hidden;">';
				
				
				echo '<div style="float:left; background:#E8E8E8; overflow-x:hidden; overflow-y:scroll; width:500px; height:400px;">';
					
					echo '<div id="ou_s_s_search_result_display" style="overflow:hidden; background:#E8E8E8; width:486px;"></div>';
					echo '<div id="ou_s_s_search_result_display2" style="display:none; overflow:hidden; background:#E8E8E8; width:486px;"></div>';
					
					echo '<div id="ou_s_p_s_s_search_loader1" style="overflow:hidden; display:none; padding:140px 0px 0px 0px; text-align:center;">';
						echo '<img src="'.$ou_s_p_s_s_just_loader.'" border="none" style="width:100px; height:100px;">';
					echo '</div>';
				
				echo '</div>'; 
					
				echo '<div style="float:left; width:188px; background:#071d07; height:400px;">';
					echo '<form enctype="multipart/form-data" name="ou_simple_p_s_search_form_name"  method="POST" id="ou_simple_p_s_search_form">';
						echo '<div style="margin:5px; width:178px; height:390px;">';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'First Name';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<input type="text" name="ou_simple_p_s_s_firstname" autocomplete="off" value="" class="ousimpleprofileinput2">';
							echo '</div>';
							
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'Last Name';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<input type="text" name="ou_simple_p_s_s_lastname" autocomplete="off" value="" class="ousimpleprofileinput2">';
							echo '</div>';
							
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'Alias';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<input type="text" name="ou_simple_p_s_s_alias" autocomplete="off" value="" class="ousimpleprofileinput2">';
							echo '</div>';
							
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'Gender';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<select name="ou_simple_p_e_e_gender" autocomplete="off" class="ousimpleprofileselect2">';
									echo '<option value="">Select Gender</option>';
									echo '<option value="Male">Male</option>';
									echo '<option value="Female">Female</option>';
								echo '</select>';
							echo '</div>';
							
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'Country';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<input type="text" name="ou_simple_p_s_s_country" autocomplete="off" value="" class="ousimpleprofileinput2">';
							echo '</div>';
							
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo 'City';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<input type="text" name="ou_simple_p_s_s_city" autocomplete="off" value="" class="ousimpleprofileinput2">';
							echo '</div>';
						
							echo '<div style="text-align:left; font-size:14px; color:#ffffff;">';
								echo '<span id="ou_s_s_search_hide_button1"><a href="#" onclick="ou_simple_p_s_s_search(); return false;">';
									echo '<div style="margin:5px 0px 5px 0px; border:1px solid #36648B; border-radius:5px; width:70px; background:#36648B;">';
										echo '<div style="padding:5px; text-align:center; color: #FFFF00; font-size:14px;">';
											echo 'Search';
										echo '</div>';
									echo '</div>';
								echo '</a></span>';
							echo '</div>';
						
						echo '</div>';
					echo '</form>';
				echo '</div>'; 
				
			echo '</div>';
		
		echo '</div>';
		
		if(!empty($ou_s_p_check_user))
		{
			$ou_simple_profile_edit_pr_table = $wpdb->prefix . "ousimpleprofiledb";
			$ou_simple_profile_edit_pr_sql = $wpdb->get_results( "SELECT * FROM $ou_simple_profile_edit_pr_table where ousimpleprofile_id_user = '$ou_s_p_check_user'");
			foreach ($ou_simple_profile_edit_pr_sql as $ou_simple_profile_edit_pr_sql2)
			{ 
				$ousimpleprofile_id_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_id;   
				$ousimpleprofile_id_user_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_id_user;
				$ousimpleprofile_firstname_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_firstname;
				$ousimpleprofile_lastname_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_lastname;
				$ousimpleprofile_avatar_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_avatar;
				$ousimpleprofile_alias_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_alias;
				$ousimpleprofile_gender_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_gender;
				$ousimpleprofile_country_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_country;
				$ousimpleprofile_city_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_city;
				$ousimpleprofile_zip_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_zip;
				$ousimpleprofile_email_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_email;
				$ousimpleprofile_activity_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_activity;
				$ousimpleprofile_interests_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_interests;
				$ousimpleprofile_skills_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_skills;
				$ousimpleprofile_aboutme_e = $ou_simple_profile_edit_pr_sql2->ousimpleprofile_aboutme;
		
				$ou_profile_edit_notavatar =  plugin_dir_url( __FILE__ );
				$ousimpleprofile_avatar_eno = $ou_profile_edit_notavatar.'images/nouserbig.png';
				$ousimpleprofile_e_e1 = $ou_profile_edit_notavatar.'images/mask.png';
				$ousimpleprofile_e_e2 = $ou_profile_edit_notavatar.'images/city.png';
				$ousimpleprofile_e_e3 = $ou_profile_edit_notavatar.'images/country.png';
				$ousimpleprofile_e_e4 = $ou_profile_edit_notavatar.'images/mail2.png';
				$ousimpleprofile_e_e6 = $ou_profile_edit_notavatar.'images/me.png';
				$ousimpleprofile_e_e7 = $ou_profile_edit_notavatar.'images/skills.png';
				$ousimpleprofile_e_e8 = $ou_profile_edit_notavatar.'images/interest.png';
				$ousimpleprofile_e_e9 = $ou_profile_edit_notavatar.'images/activity.png';
				$ousimpleprofile_e_e10 = $ou_profile_edit_notavatar.'images/zip.png';
				$ousimpleprofile_e_e11 = $ou_profile_edit_notavatar.'images/gender.png';
				$ousimpleprofile_e_e12 = $ou_profile_edit_notavatar.'images/firstname.png';
				$ousimpleprofile_e_e13 = $ou_profile_edit_notavatar.'images/lastname.png';
				?>
				<script>
				function ou_s_p_edit_profile_upload_image_button()
				{
					var formData = new FormData(jQuery('#ou_simple_p_edit_form_uploadaddimage_form')[0]);
					formData.append('action', 'ouspgusereditimage');
					formData.append('nonce', ouspajaxw.ouspajax_nonce);
					
					jQuery.ajax({
					type: "post",
					url: ouspajaxw.ouspajax_url,
					data: formData,
					contentType: false,
					processData: false,
					beforeSend: function() 
					{
						jQuery("#ousimple_p_e_e_upload_e1h").hide();
						jQuery("#ousimple_p_e_e_upload_e2h").show();
					},	
					success: function(html)
					{
						jQuery("#ou_simple_profile_edit_profile_upload_image_result").empty();
						jQuery("#ou_simple_profile_edit_profile_upload_image_result").append(html);
						jQuery("#ousimple_p_e_e_upload_e2h").hide();
						jQuery("#ousimple_p_e_e_upload_e1h").show();
					}
					}); 
				}
				
				function ou_s_p_edit_puimageremoveuserphoto()
				{
					var formData = new FormData(jQuery('#ou_simple_p_edit_form_uploadaddimage_form')[0]);
					formData.append('action', 'ouspgusereditimagedelete');
					formData.append('nonce', ouspajaxw.ouspajax_nonce);
					jQuery.ajax({
					type: "post",
					url: ouspajaxw.ouspajax_url,
					data: formData,
					contentType: false,
					processData: false,
					beforeSend: function() 
					{
						jQuery("#ou_s_p_edit_hof_dwe1").hide();
						jQuery("#ou_s_p_edit_hof_dwe2").show();
					},
					success: function(html)
					{
						jQuery("#ou_simple_profile_edit_profile_upload_image_result").empty();
						jQuery("#ou_simple_profile_edit_profile_upload_image_result").append(html);
						jQuery("#ou_s_p_edit_hof_dwe2").hide();
						jQuery("#ou_s_p_edit_hof_dwe1").show();  
					}
					});
				}
				
				function ou_s_p_edit_profile_save_info_button()
				{
					var formData = new FormData(jQuery('#ou_simple_p_edit_form_saveinfo_form')[0]);
					formData.append('action', 'ouspgusereditsaveinfo');
					formData.append('nonce', ouspajaxw.ouspajax_nonce);
					jQuery.ajax({
					type: "post",
					url: ouspajaxw.ouspajax_url,
					data: formData,
					contentType: false,
					processData: false,
					beforeSend: function() 
					{
						jQuery("#ou_simple_p_e_e_display_result_save").show();
					},
					success: function(html)
					{
						setTimeout(ou_s_p_edit_profile_save_info_sd, 2000);
					}
					}); 
				}					
				</script>
				<?php
				
				echo '<div style="width:698px; min-height:100px; display:none;" id ="ousimpleprofile_my_edit_profile">';
		
					echo '<div style="margin:5px; width:688px;">';
						echo '<div style="padding:5px 5px 5px 5px; font-size:20px; color:#36648B;">';
							echo 'Edit Profile';
						echo '</div>';
					echo '</div>';
			
					echo '<div style="margin:5px; width:688px; overflow:hidden;">';
						
						echo '<div style="float:left; width:200px; min-height:200px;">';
							echo '<div style="padding: 5px 5px 5px 5px;" id="ou_simple_profile_edit_profile_upload_image_result">';
								if(!empty($ousimpleprofile_avatar_e))
								{
									echo '<img src="'.$ousimpleprofile_avatar_e.'" border="none" style="width:190px; height:190px;">';
								}
								if(empty($ousimpleprofile_avatar_e))
								{
									echo '<img src="'.$ousimpleprofile_avatar_eno.'" border="none" style="width:190px; height:190px;">';
								}
							echo '</div>';
							
							echo '<div class="ousimpleprofilelink1" style="padding: 0px 5px 0px 5px; text-align:center;">';
								echo '<span id="ou_s_p_edit_profile_a1"><a href="#" onclick="ou_s_p_edit_profile_upload_image(); return false;">Edit user photo</a></span>';
								echo '<span id="ou_s_p_edit_profile_a2" style="display:none;"><a href="#"  onclick="ou_s_p_edit_profile_upload_image_hide(); return false;">Edit user photo (hide)</a></span>';
							echo '</div>';
							echo '<div id="ou_s_p_edit_profile_a3" class="ousimpleprofilelink1" style="padding: 0px 5px 5px 5px; text-align:center;">';
								echo '<span id="ou_s_p_edit_hof_dwe1"><a href="#" class="ousimpleprofilelink1" onclick="ou_s_p_edit_puimageremoveuserphoto(); return false;">Remove user photo</a></span>';
								echo '<span style="display:none; font-size:12px;" id="ou_s_p_edit_hof_dwe2">Please wait!</span>';
							echo '</div>';
							
							echo '<div id="ou_simple_profile_edit_profile_upload_image_open" style=" display:none; margin: 0px 5px 5px 5px; background:#071d07; width:190px; min-height:10px;">';
								echo '<form enctype="multipart/form-data" action="javascript:void(null);"  method="POST" id="ou_simple_p_edit_form_uploadaddimage_form">';
									echo '<div style="width:180px; color:#63B8FF; font-size:12px; margin:5px;">';
										echo '<div style="padding:5px 0px 5px 0px;">';
											echo '<input type="file" accept="image/*" name="ou_simple_profile_upload_image_file" onchange="ou_simple_profile_upload_image_filefunction(); return false;"  autocomplete="off" style="color:#63B8FF; background:#071d07 !important; font-size:12px; width:180px;">';
										echo '</div>';
										echo '<div id="ou_simple_profile_upload_image_file_show_button" style="display:none; padding:0px 0px 5px 0px; text-align:center;">';
											echo '<span class="ousimpleprofilelink1" id="ousimple_p_e_e_upload_e1h"><a href="#" onclick="ou_s_p_edit_profile_upload_image_button(); return false;">Upload user photo</a></span>';
											echo '<span style="display:none; font-size:12px;" id="ousimple_p_e_e_upload_e2h">Please Wait!</span>';
										echo '</div>';
									echo '</div>';
									
								echo '</form>';
							echo '</div>';
							
						echo '</div>'; 
						
						echo '<div style="float:left; width:488px; min-height:200px;">';
					
							echo '<div style="padding:5px;">';
								echo '<form enctype="multipart/form-data" action="javascript:void(null);"  method="POST" id="ou_simple_p_edit_form_saveinfo_form">';
									echo '<table class="ousimpleprofiletable1">';
							
										echo '<tr style="border: none !important;">';
											
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e12.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'First Name (*)';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_firstname" autocomplete="off" value="'.esc_html($ousimpleprofile_firstname_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
									
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e13.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Last Name (*)';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_lastname" autocomplete="off" value="'.esc_html($ousimpleprofile_lastname_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
									
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e1.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Alias';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_alias" autocomplete="off" value="'.esc_html($ousimpleprofile_alias_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e11.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Gender';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<select name="ou_simple_p_e_e_gender" autocomplete="off" class="ousimpleprofileselect1">';
														?>
														<option value="">Select gender</option>
														<option value="Male" <?php if($ousimpleprofile_gender_e=='Male') echo "selected";?>>Male</option>
														<option value="Female" <?php if($ousimpleprofile_gender_e=='Female') echo "selected";?>>Female</option>
														<?php
													echo '</select>';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e3.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Country';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_country" autocomplete="off" value="'.esc_html($ousimpleprofile_country_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e2.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'City';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_city" autocomplete="off" value="'.esc_html($ousimpleprofile_city_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e10.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important; background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Zip';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_zip" autocomplete="off" value="'.esc_html($ousimpleprofile_zip_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e4.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important; background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Email';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<input type="text" name="ou_simple_p_e_e_email" autocomplete="off" value="'.esc_html($ousimpleprofile_email_e).'" class="ousimpleprofileinput1">';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e9.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important; background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Activity';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<textarea autocomplete="off" name="ou_simple_p_e_e_activity" class="ousimpleprofilearea1">'.esc_html($ousimpleprofile_activity_e).'</textarea>';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e8.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Interests';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<textarea autocomplete="off" name="ou_simple_p_e_e_interests" class="ousimpleprofilearea1">'.esc_html($ousimpleprofile_interests_e).'</textarea>';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e7.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important; background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'Skills';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<textarea autocomplete="off" name="ou_simple_p_e_e_skills" class="ousimpleprofilearea1">'.esc_html($ousimpleprofile_skills_e).'</textarea>';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
										
										echo '<tr style="border: none !important;">';
											echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo '<img src="'.$ousimpleprofile_e_e6.'" border="none" style="width:20px; height:20px;">';
												echo '</div>';
											echo '</td>';
											echo '<td style="width:165px; padding: 0px !important; border: none !important; background:#3f0000; color:#ffffff;">';
												echo '<div style="padding:5px; font-size:14px;">';
													echo 'About Me';
												echo '</div>';
											echo '</td>';
										
											echo '<td style="width:278px; padding: 0px !important; border: none !important; background:#3f0000; color:ffffff;">';
												echo '<div style="padding:5px 0px 5px 0px; font-size:14px;">';
													echo '<textarea autocomplete="off" name="ou_simple_p_e_e_aboutme" class="ousimpleprofilearea1">'.esc_html($ousimpleprofile_aboutme_e).'</textarea>';
												echo '</div>';
											echo '</td>';
										
										echo '</tr>';
							
									echo '</table>';
							
									echo '<div style="padding:0px;" class="ousimpleprofilelink2">';
										echo '<a href="#" onclick="ou_s_p_edit_profile_save_info_button(); return false;">';
											echo '<div style="margin:5px 0px 5px 0px; border:1px solid #36648B; border-radius:5px; width:70px; background:#36648B;">';
												echo '<div style="padding:5px; text-decoration: none !important; text-align:center; color: #FFFF00; font-size:14px;">';
													echo 'Save';
												echo '</div>';
											echo '</div>';
										echo '</a>';
										echo ' <div style="display:none;" id="ou_simple_p_e_e_display_result_save">Information have been saved!</div>';
									echo '</div>';
									
									echo '<div style="padding:5px 0px 0px 0px; font-size:14px; color:#000000;">';
										echo '<b>All fields marked * must be filled!</b>';
									echo '</div>';
							
								echo '</form>';
							
							echo '</div>';
					
						echo '</div>'; 
			
					echo '</div>';
		
				echo '</div>'; 
			}
		}
	echo '</div>';
}
add_shortcode('ousimpleprofilecode', 'ousimpleprofilecodefunction');
?>