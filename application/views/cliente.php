<?php 

	$this ->load-> view('base/header');
	$this ->load-> view('base/sidebar');
	if($tela != ''){
		 $this -> load -> view('telas/'.$tela);
	}else{
		redirect('/');
	}

	$this ->load-> view('base/footer');


