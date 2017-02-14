<!-- PNotify -->
<link href="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<?Php if($exisUser != "registrado"){ ?>
<style>
	html, body{
		height:100%;
		font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	}
	#shadowLogin{
		position:absolute;
		width:100%;
		height:100%;
		background:rgba(52,66,90,0.7);
		z-index:999;
	}
	#divLogin{
		position:absolute;
		z-index:1000;
		background:rgba(255,255,255,1);
		margin-left:35%;
		margin-top:5%;
	}
	.txtTitulo{
		background:rgba(51,102,102,1);
		color:rgba(255,255,255,1);
		height:50px;
		text-align:center;
		padding-top:8px;
		font-size:20px;
		font-weight:bold;
	}
	.txtInput{
		height:55px;
		padding-left:10px;
	}
	input{
		width:120px;
		font-weight:bold;
		padding:0px 5px;
		margin:0px 15px;
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f0f9ff+0,deddff+36,b3cff2+100 */
background: #f0f9ff; /* Old browsers */
background: -moz-linear-gradient(top, #f0f9ff 0%, #deddff 36%, #b3cff2 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #f0f9ff 0%,#deddff 36%,#b3cff2 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #f0f9ff 0%,#deddff 36%,#b3cff2 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0f9ff', endColorstr='#b3cff2',GradientType=0 ); /* IE6-9 */
	}
	#txtError{
		color:rgba(255,0,0,1);
		font-size:14px;
		font-style:italic;
		display:none;
		height:35px;
	}
</style>
<div id="shadowLogin"></div>
<div id="divLogin">
	<?Php echo form_open('', array('name' => 'formLogin', 'id' => 'formLogin')); ?>
	<table width="100%">
    	<tr>
        	<td colspan="2" class="txtTitulo">Accesos restringido</td>
        </tr>
    	<tr>
    	  <td class="txtInput">Usuario:</td>
    	  <td><?Php echo form_input(array(
        'name'          => 'txtUsr',
        'id'            => 'txtUsr',
        'maxlength'     => '100'
)); ?></td>
  	  </tr>
    	<tr>
    	  <td class="txtInput">Contraseña:</td>
    	  <td><?Php echo form_password(array(
        'name'          => 'txtPsw',
        'id'            => 'txtPsw'
)); ?></td>
  	  </tr>
      <tr>
    	  <td>&nbsp;</td>
    	  <td>&nbsp;</td>
  	  </tr>
      <tr>
    	  <td>&nbsp;</td>
    	  <td><?Php echo form_button('btnEntrar','Entrar',array(
        'id'            => 'btnEntrar',
		'class'			=> 'btn btn-info'
)); ?></td>
  	  </tr>
      <tr>
    	  <td colspan="2" align="center"><div id="txtError"></div></td>
  	  </tr>
    </table>
    <?Php echo form_close(); ?>
</div>
<script type="text/javascript">
$(window).load(function() {
	$( "#btnEntrar" ).click(function() {
		$.post( "<?Php echo base_url(); ?>index.php/admin/login", $( "#formLogin" ).serialize() )
		.done( function(data) {
			var resp= data.split("|");
				var elTexto= resp[1];
				var elTipo= resp[0];
				
				if(elTipo != "error"){
					$("#shadowLogin").fadeOut(500);
					$("#divLogin").delay(100).fadeOut(500);
				}
				else{
					$("#txtError").html(elTexto);
					$("#txtError").slideDown(500);
				}
		});
	});
});
</script>
<?Php } ?>
<div class="page-title">
                    <h3>Administardor</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Inicio</a></li>
                            <li class="active">Administardor</li>
                        </ol>
                    </div><!-- page-breadcrumb -->
                </div><!-- page-title -->
                <div id="main-wrapper">
                    <div class="row">
                    	<?Php echo form_open('', array('name' => 'form1', 'id' => 'form1')); ?>
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Configuración de servicios</h4>
                                    </div>
                                    <div class="panel-body">
                                       <div class="table-responsive">
                                        &nbsp;<br /><br />&nbsp;
                                            <div class="form-group">
                                            	<?Php echo form_label('Conductores visibles: ', 'totales',array('class'=>'col-sm-2 control-label')); ?>
                                                <div class="col-sm-10">
                                                    <input type="number" min="1" max="5" class="form-control" name="totales" id="totales" placeholder="Cantidad" value="<?Php echo $getVisibles[0]->totales; ?>">
                                                    <p class="help-block">Introduce la Cantidad en número. Minimo 1 y Máximo 5.</p>
                                                </div>
                                                <p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-12" align="right">
                                                <?Php echo form_button('btnGuardar','Guardar',array('class' => 'btn btn-success', 'id' => 'btnGuardar')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?Php echo form_close(); ?>
                	</div><!-- Row -->
				</div><!-- Main Wrapper -->
<!-- PNotify -->
<script src="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.js"></script>
<script src="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?Php echo base_url(); ?>assets/libs/plugins/pnotify/dist/pnotify.nonblock.js"></script>
<script type="text/javascript">
$(window).load(function() {
	notificacion= function(elText, elType){
		new PNotify({
			title: 'Configuración de servicios',
			text: elText,
			type: elType,
			styling: 'bootstrap3'
		});
	}
	$( "#btnGuardar" ).click(function() {
		$.post( "<?Php echo base_url(); ?>index.php/admin/save", $( "#form1" ).serialize() )
		.done(function(data) {
			var resp= data.split("|");
				console.log("Resp=> "+ data);
				var elTexto= resp[1];
				var elTipo= resp[0];
				//
				if(elTipo == "danger"){
					$("#totales").val("");
				}
			notificacion(elTexto,elTipo);
		});
	});
});
</script>