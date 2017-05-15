<?php 

	$this ->load-> view('base/header');
	$this ->load-> view('base/sidebar');
	if($tela != ''){
		 $this -> load -> view('telas/servico/'.$tela);
	}else{
		redirect('/');
	}

	$this ->load-> view('base/footer');


