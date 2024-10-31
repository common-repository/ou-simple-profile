<?php
$ou_s_p_check_userdb = get_current_user_id();
$ou_s_p_imagesource = strtolower(pathinfo($_FILES['ou_simple_profile_upload_image_file']['name'], PATHINFO_EXTENSION));
	
$ou_s_p_check_images = array('jpeg','jpg','JPEG','JPG','png','PNG','GIF','gif');
	
if(in_array($ou_s_p_imagesource, $ou_s_p_check_images))
{
	$ou_s_p_link_at_the_image = uniqid().'.'.$ou_s_p_imagesource;
	$ou_s_p_im_upload = wp_upload_bits($ou_s_p_link_at_the_image, null, file_get_contents($_FILES["ou_simple_profile_upload_image_file"]["tmp_name"]));
	
	$ou_s_p_im_result = wp_get_image_editor( $ou_s_p_im_upload['file'] );
		
	if(!is_wp_error($ou_s_p_im_result))
	{
		$ou_s_p_im_result->resize( 190, 190, true ); 
		$ou_s_p_im_result->save( $ou_s_p_im_upload['file'] );
	}
		
	echo '<img src="'.$ou_s_p_im_upload['url'].'"  border="none" style="width:190px; height:190px;">';
		
	global $wpdb;
	$outabledb = $wpdb->prefix."ousimpleprofiledb";
		
	$ou_simple_profile_edit_pr_sqldb = $wpdb->get_results( "SELECT * FROM $outabledb where ousimpleprofile_id_user = '$ou_s_p_check_userdb'");
	foreach ($ou_simple_profile_edit_pr_sqldb as $ou_simple_profile_edit_pr_sql2db)
	{ 
		$ousimpleprofile_id_edb = $ou_simple_profile_edit_pr_sql2db->ousimpleprofile_id;   
		$ousimpleprofile_avatar_edb = $ou_simple_profile_edit_pr_sql2db->ousimpleprofile_avatar;
	}
		
	if(!empty($ousimpleprofile_avatar_edb))
	{
		$ou_p_e_upload_dir = wp_upload_dir();
		$ou_p_e_upload_start_before = str_replace($ou_p_e_upload_dir['baseurl'], "", $ousimpleprofile_avatar_edb);
		$ou_p_e21s2_upload_start = '../../uploads'.$ou_p_e_upload_start_before;
			
		if (file_exists($ou_p_e21s2_upload_start))
		{
			unlink($ou_p_e21s2_upload_start);
		} 			
	}
		
	$wpdb->update( $outabledb,
	array( 'ousimpleprofile_avatar' => $ou_s_p_im_upload['url']),
	array( 'ousimpleprofile_id_user' =>$ou_s_p_check_userdb));
}
?>