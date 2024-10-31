<?php
$ou_simple_p_s_s_firstname = sanitize_text_field($_POST['ou_simple_p_s_s_firstname']); 
$ou_simple_p_s_s_lastname = sanitize_text_field($_POST['ou_simple_p_s_s_lastname']); 
$ou_simple_p_s_s_alias = sanitize_text_field($_POST['ou_simple_p_s_s_alias']); 
$ou_simple_p_e_e_gender = sanitize_text_field($_POST['ou_simple_p_e_e_gender']); 
$ou_simple_p_s_s_country = sanitize_text_field($_POST['ou_simple_p_s_s_country']); 
$ou_simple_p_s_s_city = sanitize_text_field($_POST['ou_simple_p_s_s_city']); 

if(!empty($ou_simple_p_s_s_firstname))
{
	$ou_simple_p_s_s_firstnamedb = ' AND ousimpleprofile_firstname = "'.$ou_simple_p_s_s_firstname.'"';
}	

if(!empty($ou_simple_p_s_s_lastname))
{
	$ou_simple_p_s_s_lastnamedb = ' AND ousimpleprofile_lastname = "'.$ou_simple_p_s_s_lastname.'"';
}

if(!empty($ou_simple_p_s_s_alias))
{
	$ou_simple_p_s_s_aliasdb = ' AND ousimpleprofile_alias = "'.$ou_simple_p_s_s_alias.'"';
}	

if(!empty($ou_simple_p_e_e_gender))
{
	$ou_simple_p_e_e_genderdb = ' AND ousimpleprofile_gender = "'.$ou_simple_p_e_e_gender.'"';
}	

if(!empty($ou_simple_p_s_s_country))
{
	$ou_simple_p_s_s_countrydb = ' AND ousimpleprofile_country = "'.$ou_simple_p_s_s_country.'"';
}

if(!empty($ou_simple_p_s_s_city))
{
	$ou_simple_p_s_s_citydb = ' AND ousimpleprofile_city = "'.$ou_simple_p_s_s_city.'"';
}	

echo '<div id="ou_s_s_display_result_open_user">';	
	global $wpdb;
	$ousptabledbuser_search = $wpdb->prefix . "ousimpleprofiledb";
	$ou_s_s_s_result_count = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ousptabledbuser_search  where ousimpleprofile_firstname !='' AND ousimpleprofile_lastname !='' $ou_simple_p_s_s_firstnamedb $ou_simple_p_s_s_lastnamedb $ou_simple_p_s_s_aliasdb $ou_simple_p_e_e_genderdb $ou_simple_p_s_s_countrydb $ou_simple_p_s_s_citydb"),0);
	echo '<div style="margin:5px; width:468px; overflow:hidden;">';
		echo '<div style="width:468px; font-size:16px;">';
			echo '<b>Found: '.$ou_s_s_s_result_count.' users</b>';
			echo '<hr style="margin-top: 5px;  margin-bottom:1px; height: 1px; border: none; background: #3f0000; width:468px;">';
		echo '</div>';
		echo '<div style="width:468px; margin:5px 0px 0px 0px; overflow:hidden;">';	
			$ou_simple_profile_edit_pr_sqls = $wpdb->get_results( "SELECT * FROM $ousptabledbuser_search where ousimpleprofile_firstname !='' AND ousimpleprofile_lastname !='' $ou_simple_p_s_s_firstnamedb $ou_simple_p_s_s_lastnamedb $ou_simple_p_s_s_aliasdb $ou_simple_p_e_e_genderdb $ou_simple_p_s_s_countrydb $ou_simple_p_s_s_citydb");
			foreach ($ou_simple_profile_edit_pr_sqls as $ou_simple_profile_edit_pr_sql2s)
			{	 
				$ousimpleprofile_id_es = $ou_simple_profile_edit_pr_sql2s->ousimpleprofile_id;   
				$ousimpleprofile_id_user_es = $ou_simple_profile_edit_pr_sql2s->ousimpleprofile_id_user;
				$ousimpleprofile_firstname_es = $ou_simple_profile_edit_pr_sql2s->ousimpleprofile_firstname;
				$ousimpleprofile_lastname_es = $ou_simple_profile_edit_pr_sql2s->ousimpleprofile_lastname;
				$ousimpleprofile_avatar_es = $ou_simple_profile_edit_pr_sql2s->ousimpleprofile_avatar;		
				$ou_s_p_s_s_just_filesearch = plugin_dir_url( __FILE__ );
				$ou_s_p_s_s_just_filesearch1 = $ou_s_p_s_s_just_filesearch.'images/nouserbig.png';	
				if(!empty($ousimpleprofile_avatar_es) || empty($ousimpleprofile_avatar_es))
				{
					if(!empty($ousimpleprofile_avatar_es))
					{
						$ousimpleprofile_avatar_esr = $ousimpleprofile_avatar_es;
					}
					if(empty($ousimpleprofile_avatar_es))
					{
						$ousimpleprofile_avatar_esr = $ou_s_p_s_s_just_filesearch1;
					}
				}			
				?>
				<style>
				.ous_s_search_display_image<?php echo $ousimpleprofile_id_es;?>
				{
					width:118px; height:118px;  background:  url("<?php echo $ousimpleprofile_avatar_esr;?>") no-repeat;
					background-size:cover;
					overflow:hidden;
				}
				</style>
					
				<script>
				function ou_s_s_open_profile<?php echo $ousimpleprofile_id_es;?>()
				{
					var iduser = '<?php echo $ousimpleprofile_id_user_es;?>';
					jQuery.ajax({
					type: "post",
					url: ouspajaxw.ouspajax_url,
					data: { action:'ouspguserdisplaysearchuser', nonce : ouspajaxw.ouspajax_nonce, iduser:iduser},
					beforeSend: function() 
					{
						jQuery("#ou_s_s_search_result_display").hide();
						jQuery("#ou_s_p_s_s_search_loader1").show();
					},
					success: function(html)
					{ 
						jQuery("#ou_s_p_s_s_search_loader1").hide();
						jQuery("#ou_s_s_search_result_display").hide();
						jQuery("#ou_s_s_search_result_display2").append(html);
						jQuery("#ou_s_s_search_result_display2").show();
					}
					}); 
				}
				</script>
				<?php
				echo '<div style="float:left; height:118px; width:118px; margin:0px 2px 5px 1px;">';
					echo '<a href="#" onclick="ou_s_s_open_profile'.$ousimpleprofile_id_es.'(); return false;" >';
						echo '<div class="ous_s_search_display_image'.$ousimpleprofile_id_es.'" >';
							echo '<div style="margin:83px 0px 0px 0px; font-size:10px; background: rgba(0, 0, 0, 0.7); color:#ffffff; width:118px; height:35px;  text-align:center;">';
								echo esc_html($ousimpleprofile_firstname_es);
								echo '<br />';
								echo esc_html($ousimpleprofile_lastname_es);
							echo '</div>';	
						echo '</div>';
					echo '</a>';
				echo '</div>';
			}	
		echo '</div>';	
	echo '</div>';	
echo '</div>';
?>