<div class="content-wrapper">
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $descricao; ?></small>
  </h1>
</section>
<section class="content">





<div class="col-md-3">
	<div class="info-box">
  		<!-- Apply any bg-* class to to the icon to color it -->
  		<span class="info-box-icon bg-red"><i class="fa fa-cogs"></i></span>
  		<div class="info-box-content">
    		<span class="info-box-text">Serviços <br>Cadastrados</span>
    		<span class="info-box-number"><?php echo $qtdSerCad; ?></span>
  		</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
</div>

<div class="col-md-3">
	<div class="info-box">
  		<!-- Apply any bg-* class to to the icon to color it -->
  		<span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>
  		<div class="info-box-content">
    		<span class="info-box-text">Clientes</span>
    		<span class="info-box-number"><?php echo $qtdCliCad; ?></span>
  		</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
</div>

<div class="col-md-3">
	<div class="info-box">
  		<!-- Apply any bg-* class to to the icon to color it -->
  		<span class="info-box-icon bg-blue"><i class="fa fa-cubes"></i></span>
  		<div class="info-box-content">
    		<span class="info-box-text">Tipos de <br>Serviços</span>
    		<span class="info-box-number"><?php echo $qtdTipSer; ?></span>
  		</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
</div>

<div class="col-md-3">
  <div class="info-box">
      <!-- Apply any bg-* class to to the icon to color it -->
      <span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Usuários <br>Cadastrados</span>
        <span class="info-box-number"><?php echo $qtdUsrCad; ?></span>
      </div><!-- /.info-box-content -->
  </div><!-- /.info-box -->
</div>



<!-- <div class="col-md-8">
  <canvas id="myChart"></canvas>
</div> -->



</section><!-- section da porra toda -->
</div><!-- div da porra toda -->
