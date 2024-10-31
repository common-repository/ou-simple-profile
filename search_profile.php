<?php
$iduser = intval($_POST['iduser']);

if(!empty($iduser))
{
	echo '<div id="ou_s_s_display_result_open_user2">';	
		global $wpdb;
		$ousptabledbusersearchuu1 = $wpdb->prefix . "ousimpleprofiledb";
	
		echo '<div style="margin:5px; width:468px; overflow:hidden;">';
		
			echo '<div class="ousimpleprofilelink1" style="width:468px; font-size:14px;">';
				echo '<b><a href="#" onclick="ou_s_s_o_u_back(); return false;">Back</a></b>';
				echo '<hr style="margin-top: 5px;  margin-bottom:1px; height: 1px; border: none; background: #3f0000; width:468px;">';
			echo '</div>';
		
			echo '<div style="width:468px; margin:5px 0px 0px 0px; overflow:hidden;">';	
				$ou_simple_profile_edit_pr_sqlsu = $wpdb->get_results( "SELECT * FROM $ousptabledbusersearchuu1 where ousimpleprofile_firstname IS NOT NULL AND ousimpleprofile_lastname IS NOT NULL AND ousimpleprofile_id_user = '$iduser'");
				foreach ($ou_simple_profile_edit_pr_sqlsu as $ou_simple_profile_edit_pr_sql2su)
				{	 
					$ousimpleprofile_id_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_id;   
					$ousimpleprofile_id_user_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_id_user;
					$ousimpleprofile_firstname_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_firstname;
					$ousimpleprofile_lastname_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_lastname;
					$ousimpleprofile_avatar_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_avatar;
					$ousimpleprofile_alias_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_alias;
					$ousimpleprofile_gender_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_gender;
					$ousimpleprofile_country_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_country;
					$ousimpleprofile_city_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_city;
					$ousimpleprofile_zip_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_zip;
					$ousimpleprofile_email_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_email;
					$ousimpleprofile_activity_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_activity;
					$ousimpleprofile_interests_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_interests;
					$ousimpleprofile_skills_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_skills;
					$ousimpleprofile_aboutme_su1 = $ou_simple_profile_edit_pr_sql2su->ousimpleprofile_aboutme;
					
					$ou_profile_edit_notavatarsearchsu =  plugin_dir_url( __FILE__ );
					$ousimpleprofile_avatar_enosearchsu = $ou_profile_edit_notavatarsearchsu.'images/nouserbig.png';
					
					$ousimpleprofile_e_e1u = $ou_profile_edit_notavatarsearchsu.'images/mask.png';
					$ousimpleprofile_e_e2u = $ou_profile_edit_notavatarsearchsu.'images/city.png';
					$ousimpleprofile_e_e3u = $ou_profile_edit_notavatarsearchsu.'images/country.png';
					$ousimpleprofile_e_e4u = $ou_profile_edit_notavatarsearchsu.'images/mail2.png';
					$ousimpleprofile_e_e5u = $ou_profile_edit_notavatarsearchsu.'images/phone.png';
					$ousimpleprofile_e_e6u = $ou_profile_edit_notavatarsearchsu.'images/me.png';
					$ousimpleprofile_e_e7u = $ou_profile_edit_notavatarsearchsu.'images/skills.png';
					$ousimpleprofile_e_e8u = $ou_profile_edit_notavatarsearchsu.'images/interest.png';
					$ousimpleprofile_e_e9u = $ou_profile_edit_notavatarsearchsu.'images/activity.png';
					$ousimpleprofile_e_e10u = $ou_profile_edit_notavatarsearchsu.'images/zip.png';
					$ousimpleprofile_e_e11u = $ou_profile_edit_notavatarsearchsu.'images/gender.png';
					
					echo '<div style="width:468px; margin:5px 0px 0px 0px; overflow:hidden;">';	
						
						
						echo '<div style="float:left; width:120px; min-height:120px;">';
							echo '<div style="padding:5px;">';
								if(!empty($ousimpleprofile_avatar_su1))
								{
										echo '<img src="'.$ousimpleprofile_avatar_su1.'" border="none" style="width:120px; height:120px;">';
								}
								if(empty($ousimpleprofile_avatar_su1))
								{
									echo '<img src="'.$ousimpleprofile_avatar_enosearchsu.'" border="none" style="width:120px; height:120px;">';
								}
							echo '</div>';
						echo '</div>'; 
						
						
						echo '<div style="float:left; width:348px; min-height:200px;">';
							
							echo '<div style="margin:5px 0px 0px 0px; width:348px; background:#071d07;">';
								echo '<div style="padding:3px 4px 3px 4px; color:#ffffff; font-size:14px;">';
									echo esc_html($ousimpleprofile_firstname_su1).' '.esc_html($ousimpleprofile_lastname_su1);
								echo '</div>';
							echo '</div>';
							
							echo '<div style="margin:5px 0px 0px 0px; width:348px;">';
								
									echo '<table class="ousimpleprofiletable2">';
										
										if(!empty($ousimpleprofile_alias_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e1u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Alias';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_alias_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_gender_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e11u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Gender';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_gender_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_country_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e3u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Country';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_country_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_city_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e2u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'City';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_city_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_zip_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e10u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Zip';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_zip_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_email_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e4u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Email';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_email_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_activity_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e9u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Activity';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_activity_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_interests_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e8u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Interests';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_interests_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_skills_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e7u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'Skills';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_skills_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
										if(!empty($ousimpleprofile_aboutme_su1))
										{
											echo '<tr style="border: none !important;">';
										
												echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
													echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
														echo '<img src="'.$ousimpleprofile_e_e6u.'" border="none" style="width:20px; height:20px;">';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
													echo '<div style="padding:2px; font-size:14px;">';
														echo 'About Me';
													echo '</div>';
												echo '</td>';
											
												echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
													echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
														echo esc_html($ousimpleprofile_aboutme_su1);
													echo '</div>';
												echo '</td>';
										
											echo '</tr>';
										}
									echo '</table>';
								
							echo '</div>';
							
							
						echo '</div>'; 
						
					echo '</div>';
					
				}
			echo '</div>';
		
		echo '</div>';
	
	echo '</div>';
}
?>