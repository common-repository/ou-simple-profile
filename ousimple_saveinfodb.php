<?php
$ou_s_p_check_usersaveinfodb = get_current_user_id();
	
$ou_simple_p_e_e_firstname =  sanitize_text_field($_POST['ou_simple_p_e_e_firstname']);
	
if(!$ou_simple_p_e_e_firstname)
{
	$ou_simple_p_e_e_firstname = '';
}
	
$ou_simple_p_e_e_lastname =  sanitize_text_field($_POST['ou_simple_p_e_e_lastname']);
	
if(!$ou_simple_p_e_e_lastname)
{
	$ou_simple_p_e_e_lastname = '';
}
	
$ou_simple_p_e_e_alias =  sanitize_text_field($_POST['ou_simple_p_e_e_alias']);
	
if(!$ou_simple_p_e_e_alias)
{
	$ou_simple_p_e_e_alias = '';
}
	
$ou_simple_p_e_e_gender =  sanitize_text_field($_POST['ou_simple_p_e_e_gender']);
	
if(!$ou_simple_p_e_e_gender)
{
	$ou_simple_p_e_e_gender = '';
}
	
$ou_simple_p_e_e_country =  sanitize_text_field($_POST['ou_simple_p_e_e_country']);
	
if(!$ou_simple_p_e_e_country)
{
	$ou_simple_p_e_e_country = '';
}
	
$ou_simple_p_e_e_city =  sanitize_text_field($_POST['ou_simple_p_e_e_city']);
	
if(!$ou_simple_p_e_e_city)
{
	$ou_simple_p_e_e_city = '';
}
	
$ou_simple_p_e_e_zip =  intval($_POST['ou_simple_p_e_e_zip']);
	
if(!$ou_simple_p_e_e_zip) 
{
	$ou_simple_p_e_e_zip = '';
}
	
$ou_simple_p_e_e_emailok =  sanitize_email($_POST['ou_simple_p_e_e_email']);
	
if(!$ou_simple_p_e_e_emailok)
{
	$ou_simple_p_e_e_emailok = '';
}

$ou_simple_p_e_e_activity =  sanitize_text_field($_POST['ou_simple_p_e_e_activity']);
	
if(!$ou_simple_p_e_e_activity)
{
	$ou_simple_p_e_e_activity = '';
}
	
$ou_simple_p_e_e_interests =  sanitize_text_field($_POST['ou_simple_p_e_e_interests']);
	
if(!$ou_simple_p_e_e_interests)
{
	$ou_simple_p_e_e_interests = '';
}
	
$ou_simple_p_e_e_skills =  sanitize_text_field($_POST['ou_simple_p_e_e_skills']);
	
if(!$ou_simple_p_e_e_skills)
{
	$ou_simple_p_e_e_skills = '';
}
	
$ou_simple_p_e_e_aboutme =  sanitize_text_field($_POST['ou_simple_p_e_e_aboutme']);
	
if(!$ou_simple_p_e_e_aboutme)
{
	$ou_simple_p_e_e_aboutme = '';
}
global $wpdb;
$outabledbsave = $wpdb->prefix."ousimpleprofiledb";	
$wpdb->update( $outabledbsave,
array('ousimpleprofile_firstname' =>$ou_simple_p_e_e_firstname, 'ousimpleprofile_lastname' =>$ou_simple_p_e_e_lastname, 'ousimpleprofile_alias' =>$ou_simple_p_e_e_alias, 'ousimpleprofile_gender' =>$ou_simple_p_e_e_gender, 'ousimpleprofile_country' =>$ou_simple_p_e_e_country, 'ousimpleprofile_city' =>$ou_simple_p_e_e_city, 'ousimpleprofile_zip' =>$ou_simple_p_e_e_zip, 'ousimpleprofile_email' =>$ou_simple_p_e_e_emailok, 'ousimpleprofile_activity' =>$ou_simple_p_e_e_activity, 'ousimpleprofile_interests' =>$ou_simple_p_e_e_interests, 'ousimpleprofile_skills' =>$ou_simple_p_e_e_skills, 'ousimpleprofile_aboutme' =>$ou_simple_p_e_e_aboutme),
array('ousimpleprofile_id_user' =>$ou_s_p_check_usersaveinfodb));
?>