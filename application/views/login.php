<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<script src="<?= base_url(); ?>assets/jquery.js"></script>

	<link rel="stylesheet" href="<?= base_url(); ?>assets/stylelogin.css">
	<script src="<?= base_url(); ?>assets/jslogin.js"></script>
</head>
<body>



<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
            <div class="iconmelon">
              <svg viewBox="0 0 32 32">
                <g filter="">
                  <use xlink:href="#git"></use>
                </g>
              </svg>
            </div>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">ServTech</div>
            </div>     

            <div class="panel-body" >

            <?php
				$username = array('name' => 'username', 'placeholder' => 'nombre de usuario');
				$password = array('name' => 'password',	'placeholder' => 'introduce tu password');
				$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
			?>

              <!--  <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">-->
				<?=form_open(base_url().'login/new_user')?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="Usuário">                                        
                    </div>

                    <br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Senha">
                    </div>           

                    <br>                                                       

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Login</button>                          
                        </div>
                    </div>

				<?=form_hidden('token',$token)?>
				<?=form_close()?>
                <!--</form>     -->

            </div>                     
        </div>  
    </div>
</div>

<div id="particles"></div>






</body>
</html>