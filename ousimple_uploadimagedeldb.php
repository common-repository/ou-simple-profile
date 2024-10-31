<?php
$ou_s_p_check_userdeldb = get_current_user_id();
global $wpdb;
$outabledbdel = $wpdb->prefix."ousimpleprofiledb";
	
$ou_simple_profile_edit_pr_sqldb1 = $wpdb->get_results( "SELECT * FROM $outabledbdel where ousimpleprofile_id_user = '$ou_s_p_check_userdeldb'");
foreach ($ou_simple_profile_edit_pr_sqldb1 as $ou_simple_profile_edit_pr_sql2db1)
{ 
	$ousimpleprofile_id_edb1 = $ou_simple_profile_edit_pr_sql2db1->ousimpleprofile_id;   
	$ousimpleprofile_avatar_edb1 = $ou_simple_profile_edit_pr_sql2db1->ousimpleprofile_avatar;
	
	if(!empty($ousimpleprofile_avatar_edb1))
	{
		$ou_p_e_upload_dir1 = wp_upload_dir();
		$ou_p_e_upload_start_before1 = str_replace($ou_p_e_upload_dir1['baseurl'], "", $ousimpleprofile_avatar_edb1);
		$ou_p_e21s2_upload_start1 = '../../uploads'.$ou_p_e_upload_start_before1;
			
		if (file_exists($ou_p_e21s2_upload_start1))
		{
			unlink($ou_p_e21s2_upload_start1);
		} 	
			
		$wpdb->update( $outabledbdel,
		array( 'ousimpleprofile_avatar' =>''),
		array( 'ousimpleprofile_id_user' =>$ou_s_p_check_userdeldb));
	}
}
$ou_s_p_im_removeim = plugin_dir_url( __FILE__ );
$ou_s_p_im_removeim1 = $ou_s_p_im_removeim.'images/nouserbig.png';
echo '<img src="'.$ou_s_p_im_removeim1.'"  border="none" style="width:190px; height:190px;">';
?>