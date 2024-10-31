<?php
if(!empty($idusermain))
{
	echo '<div style="margin:5px; width:688px; overflow:hidden;">';
		global $wpdb;
		$ousptabledmain_pr1 = $wpdb->prefix . "ousimpleprofiledb";
		$ou_simple_profile_pr_sqlsumm = $wpdb->get_results( "SELECT * FROM $ousptabledmain_pr1 where ousimpleprofile_firstname IS NOT NULL AND ousimpleprofile_lastname IS NOT NULL AND ousimpleprofile_id_user = '$idusermain'");
		foreach ($ou_simple_profile_pr_sqlsumm as $ou_simple_profile_pr_sqlsumm2)
		{	 
			$ousimpleprofile_id_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_id;   
			$ousimpleprofile_id_user_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_id_user;
			$ousimpleprofile_firstname_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_firstname;
			$ousimpleprofile_lastname_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_lastname;
			$ousimpleprofile_avatar_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_avatar;
			$ousimpleprofile_alias_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_alias;
			$ousimpleprofile_gender_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_gender;
			$ousimpleprofile_country_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_country;
			$ousimpleprofile_city_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_city;
			$ousimpleprofile_zip_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_zip;
			$ousimpleprofile_email_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_email;
			$ousimpleprofile_activity_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_activity;
			$ousimpleprofile_interests_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_interests;
			$ousimpleprofile_skills_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_skills;
			$ousimpleprofile_aboutme_su2 = $ou_simple_profile_pr_sqlsumm2->ousimpleprofile_aboutme;
			
			$ou_profile_edit_notavatarsearchsu2 =  plugin_dir_url( __FILE__ );
			$ousimpleprofile_avatar_enosearchsu2 = $ou_profile_edit_notavatarsearchsu2.'images/nouserbig.png';
					
			$ousimpleprofile_e_e1u2 = $ou_profile_edit_notavatarsearchsu2.'images/mask.png';
			$ousimpleprofile_e_e2u2 = $ou_profile_edit_notavatarsearchsu2.'images/city.png';
			$ousimpleprofile_e_e3u2 = $ou_profile_edit_notavatarsearchsu2.'images/country.png';
			$ousimpleprofile_e_e4u2 = $ou_profile_edit_notavatarsearchsu2.'images/mail2.png';
			$ousimpleprofile_e_e5u2 = $ou_profile_edit_notavatarsearchsu2.'images/phone.png';
			$ousimpleprofile_e_e6u2 = $ou_profile_edit_notavatarsearchsu2.'images/me.png';
			$ousimpleprofile_e_e7u2 = $ou_profile_edit_notavatarsearchsu2.'images/skills.png';
			$ousimpleprofile_e_e8u2 = $ou_profile_edit_notavatarsearchsu2.'images/interest.png';
			$ousimpleprofile_e_e9u2 = $ou_profile_edit_notavatarsearchsu2.'images/activity.png';
			$ousimpleprofile_e_e10u2 = $ou_profile_edit_notavatarsearchsu2.'images/zip.png';
			$ousimpleprofile_e_e11u2 = $ou_profile_edit_notavatarsearchsu2.'images/gender.png';
			
			echo '<div style="width:688px; overflow:hidden; overflow:hidden;">';	
				
				echo '<div style="float:left; width:200px; min-height:200px;">';
					echo '<div style="padding:5px;">';
						if(!empty($ousimpleprofile_avatar_su2))
						{
							echo '<img src="'.$ousimpleprofile_avatar_su2.'" border="none" style="width:190px; height:190px;">';
						}
						if(empty($ousimpleprofile_avatar_su2))
						{
							echo '<img src="'.$ousimpleprofile_avatar_enosearchsu2.'" border="none" style="width:190px; height:190px;">';
						}
					echo '</div>';
				echo '</div>'; 
				
				
				echo '<div style="float:left; width:488px; min-height:200px;">';
					
					echo '<div style="margin:5px 0px 0px 0px; width:488px; background:#071d07;">';
						echo '<div style="padding:3px 4px 3px 4px; color:#ffffff; font-size:14px;">';
							echo esc_html($ousimpleprofile_firstname_su2).' '.esc_html($ousimpleprofile_lastname_su2);
						echo '</div>';
					echo '</div>';
					
					echo '<div style="margin:0px 0px 0px 0px; width:488px;">';		
						echo '<table class="ousimpleprofiletable3">';	
							if(!empty($ousimpleprofile_alias_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e1u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Alias';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_alias_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_gender_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e11u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Gender';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_gender_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_country_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e3u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Country';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_country_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_city_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e2u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'City';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_city_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_zip_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e10u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Zip';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_zip_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_email_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e4u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Email';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_email_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
						
							if(!empty($ousimpleprofile_activity_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e9u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Activity';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_activity_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_interests_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e8u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Interests';
										echo '</div>';
									echo '</td>';
										
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_interests_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_skills_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e7u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'Skills';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:303px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_skills_su2);
										echo '</div>';
									echo '</td>';
										
								echo '</tr>';
							}
							
							if(!empty($ousimpleprofile_aboutme_su2))
							{
								echo '<tr style="border: none !important;">';
										
									echo '<td style="width:35px; padding: 0px !important; border: none !important;  background:#071d07; color:#ffffff;">';
										echo '<div style="padding:2px 5px 2px 5px; font-size:14px;">';
											echo '<img src="'.$ousimpleprofile_e_e6u2.'" border="none" style="width:20px; height:20px;">';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:105px; padding: 0px !important; border: none !important;  background:#3f0000; color:#ffffff;">';
										echo '<div style="padding:2px; font-size:14px;">';
											echo 'About Me';
										echo '</div>';
									echo '</td>';
											
									echo '<td style="width:208px; padding: 0px !important; border: none !important; color:#000000;">';
										echo '<div style="padding:2px; text-align:justify; font-size:12px;">';
											echo esc_html($ousimpleprofile_aboutme_su2);
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
}
?>