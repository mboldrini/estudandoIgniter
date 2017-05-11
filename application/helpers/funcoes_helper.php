<? php
defined('BASEPATH') OR exit('No direct script access allowed');


if( !function_exists('set_msg') ){

	function set_msg( $msg=NULL){
		$data = array
            (
                'username' => $u->username,
                'usergroup' => $u->usergroup->get(),
                'is_logged_in' => true
            );
            $obj=& get_instance();
            $obj->session->set_userdata($data);
	}

}
