<?php
$ou_simple_profile_main_m_db = $wpdb->prefix . "ousimpleprofiledb";
$ou_simple_profile_main_m_count = mysql_result (mysql_query( "SELECT COUNT(*) FROM $ou_simple_profile_main_m_db  where ousimpleprofile_lastname !='' AND ousimpleprofile_firstname !=''"),0);

if($ou_simple_profile_main_m_count >=1)
{
	echo '<div style="margin:5px; width:688px;" id="ou_s_p_main_gfd1">';
		echo '<div style="padding:5px 5px 5px 5px; font-size:20px; color:#36648B;">';
			echo 'Last 12 Logged Users';
		echo '</div>';
	echo '</div>';
	
	echo '<div style="margin:5px; width:688px; overflow:hidden;" id="ou_s_p_main_gfd11">';
		$ou_simple_profile_edit_pr_sqlmm1 = $wpdb->get_results( "SELECT * FROM $ou_simple_profile_main_m_db where ousimpleprofile_lastname !='' AND ousimpleprofile_firstname !='' ORDER BY ousimpleprofile_id DESC LIMIT 12 ");
		foreach ($ou_simple_profile_edit_pr_sqlmm1 as $ou_simple_profile_edit_pr_sql2mm1)
		{ 
			$ousimpleprofile_id_emm1 = $ou_simple_profile_edit_pr_sql2mm1->ousimpleprofile_id;   
			$ousimpleprofile_id_user_emm1 = $ou_simple_profile_edit_pr_sql2mm1->ousimpleprofile_id_user;
			$ousimpleprofile_firstname_emm1 = $ou_simple_profile_edit_pr_sql2mm1->ousimpleprofile_firstname;
			$ousimpleprofile_lastname_emm1 = $ou_simple_profile_edit_pr_sql2mm1->ousimpleprofile_lastname;
			$ousimpleprofile_avatar_emm1 = $ou_simple_profile_edit_pr_sql2mm1->ousimpleprofile_avatar;
			
			$ousimpleprofile_avatar_emm1notav1 = plugin_dir_url( __FILE__ );
			$ousimpleprofile_avatar_emm1notav = $ousimpleprofile_avatar_emm1notav1.'images/nouserbig.png';
			$ousimpleprofile_loader_mm1 = $ousimpleprofile_avatar_emm1notav1.'images/loader2.gif';
			
			if(!empty($ousimpleprofile_avatar_emm1) || empty($ousimpleprofile_avatar_emm1))
			{
				if(!empty($ousimpleprofile_avatar_emm1))
				{
					$ousimpleprofile_avatar_esrmm1 = $ousimpleprofile_avatar_emm1;
				}
				if(empty($ousimpleprofile_avatar_emm1))
				{
					$ousimpleprofile_avatar_esrmm1 = $ousimpleprofile_avatar_emm1notav;
				}
			}	
			?>
			<style>
			.ous_s_search_display_imagemm1<?php echo $ousimpleprofile_id_emm1;?>
			{
						width:161px; height:161px;  background:  url("<?php echo $ousimpleprofile_avatar_esrmm1;?>") no-repeat;
						background-size:cover;
						overflow:hidden;
			}
			</style>
			
			<script>
			function ou_s_s_open_profilemm1<?php echo $ousimpleprofile_id_emm1;?>()
			{
				var idusermain = '<?php echo $ousimpleprofile_id_user_emm1;?>';
				jQuery.ajax({
				type: "post",
				url: ouspajaxw.ouspajax_url,
				data: { action: 'ouspguserdisplay', nonce : ouspajaxw.ouspajax_nonce, idusermain:idusermain},
				beforeSend: function() 
				{
					jQuery("#ou_s_p_main_gfd11").hide();
					jQuery("#ou_s_p_main_gfd2").hide();
					jQuery("#ou_s_p_main_gfd3").hide();
					jQuery("#ou_s_p_s_s_main_loader2").show();
					
				},
				success: function(html)
				{ 
					jQuery("#ou_s_p_s_s_main_loader2").hide();
					jQuery("#ou_s_p_main_gfd3").empty();
					jQuery("#ou_s_p_main_gfd3").append(html);
					jQuery("#ou_s_p_main_gfd2").show();
					jQuery("#ou_s_p_main_gfd3").show();
				}
				});  
			}
			</script>
			<?php
			echo '<div style="float:left; height:161px; width:161px; margin:0px 3px 5px 3px;">';
				echo '<a href="#" onclick="ou_s_s_open_profilemm1'.$ousimpleprofile_id_emm1.'(); return false;" >';
					echo '<div class="ous_s_search_display_imagemm1'.$ousimpleprofile_id_emm1.'" >';
						echo '<div style="margin:126px 0px 0px 0px; font-size:10px; background: rgba(0, 0, 0, 0.7); color:#ffffff; width:161px; height:35px;  text-align:center;">';
							echo esc_html($ousimpleprofile_firstname_emm1);
							echo '<br />';
							echo esc_html($ousimpleprofile_lastname_emm1);		
						echo '</div>';
					echo '</div>';
				echo '</a>';
			echo '</div>';
		}
	echo '</div>';
	
	echo '<div id="ou_s_p_s_s_main_loader2" style="overflow:hidden; display:none; padding:140px 0px 140px 0px; text-align:center;">';
		echo '<img src="'.$ousimpleprofile_loader_mm1.'" border="none" style="width:100px; height:100px;">';
	echo '</div>';
	
	echo '<div style="margin:5px; display:none; width:688px;" id="ou_s_p_main_gfd2">';
		echo '<div class="ousimpleprofilelink1" style="padding:5px 5px 5px 5px; font-size:14px; color:#36648B;">';
			echo '<b><a href="#" onclick="ou_s_main_o_m_back(); return false;">Back</a></b>';
				echo '<hr style="margin-top: 5px;  margin-bottom:1px; height: 1px; border: none; background: #3f0000; width:688px;">';
		echo '</div>';
	echo '</div>';
	
	echo '<div id="ou_s_p_main_gfd3"></div>';
}

if($ou_simple_profile_main_m_count ==0)
{
	echo '<div style="margin:5px; text-align:center; width:688px;">';
		echo '<div style="padding:130px 5px 130px 5px; font-size:20px; color:#36648B;">';
			echo 'No Logged Users';
		echo '</div>';
	echo '</div>';
}
?>