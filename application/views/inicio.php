			<div class="page-inner">
                <div class="page-title">
                    <h3>Control de Usuarios</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Inicio</a></li>
                            <li class="active">Control de Usuarios</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                    
                    
<div class="col-md-12">
	<div class="panel panel-white">
        <div class="panel-heading">
                <div class="col-md-1" style="height:35px;">
                    <div id="imgLlegada"><img src="assets/libs/images/tiempo.jpg" height="35" /> &nbsp;
                    <span id="tmpLlegada"></span>
                    </div>
                </div>
                <div class="col-md-2" style="height:35px;">
                    <div id="imgDistancia"><img src="assets/libs/images/distancia.jpg" height="35" /> &nbsp;
                    <span id="tmpDistancia"></span>
                    </div>
                </div>
        </div>
        <div class="panel-body">
           <div class="table-responsive">
            &nbsp;<br />
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 500px;
      }
	  h3{
		margin:0px;
		padding:0px;  
	  }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <div id="map"></div>
    <script>

var map;
function initMap() {
	var marcadores = [
	
		<?Php 
		foreach($Autos as $key=>$Auto){ 
		///->Icon de posicionador Auto/Cliente[0] | latitud[1] | Longitud[2] | Tipo[3] | 
		///->							  Foto[4] | Nombre[5] | Telefono[6]
		?>
		['<?Php echo $Auto->imagen; ?>', <?Php echo $Conductores[$key]->lat; ?>, <?Php echo $Conductores[$key]->lng; ?>, 'Conductor', '<?Php echo $Conductores[$key]->foto; ?>', '<?Php echo $Conductores[$key]->nombre; ?>', '<?Php echo $Conductores[$key]->celular; ?>'],
		<?Php } ?>
	];
	
	var clientes = [
	
		<?Php 
		foreach($Clientes as $key=>$Cliente){ 
		///->Icon de posicionador Auto/Cliente[0] | latitud[1] | Longitud[2] | Tipo[3] |Foto[4] | Nombre[5] | Telefono[6] | Conductor-Auto[7]
		?>
		['<?Php echo $Cliente->imagen; ?>', <?Php echo $Cliente->lat; ?>, <?Php echo $Cliente->lng; ?>, 'Cliente', '<?Php echo $Cliente->foto; ?>', '<?Php echo $Cliente->nombre; ?>', '<?Php echo $Cliente->celular; ?>', '<?Php echo $Autos[$key]->imagen; ?>'],
		<?Php } ?>
	];
	  //console.log(clientes);
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 18.9180751, lng: -99.1717609},
		zoom: 16
	});
	
	//Capa para ver el tráfico del lugar
	var trafficLayer = new google.maps.TrafficLayer();
	trafficLayer.setMap(map);
  	
	//Capa para mostrar ventana emergente con informaicón del usuario
	var infoWindow = new google.maps.InfoWindow();
	
	//Servicio que calcula la ruta al destino
	for(i = 0; i < marcadores.length; i++){
		var data = marcadores[i];
		var tiempo="";
		//Marcando las rutas -> Inicia
		var objConfigDR={
			map: map,
			suppressMarkers: true
		};
		var objConfigDS={
			origin: new google.maps.LatLng(data[1], data[2]),
			destination: new google.maps.LatLng(clientes[i][1], clientes[i][2]),
			travelMode: google.maps.TravelMode.WALKING
		};
		
		var ds= new google.maps.DirectionsService();
		var dr= new google.maps.DirectionsRenderer(objConfigDR);
		
		ds.route(objConfigDS, fnRoutear );
		
		function fnRoutear(resultados, status){
			if(status == 'OK'){
				dr.setDirections(resultados);
				var route= resultados.routes[0];
				var duration = 0;
    //console.log(resultados);
				route.legs.forEach(function (leg) {
					// The leg duration in seconds.
					//console.log(leg);
					$("#tmpLlegada").append(leg.duration.text+"<br /><br />");
					$("#tmpDistancia").append(leg.distance.text+"<br /><br />");
				});
			}
			else{
				alert("Hay error: "+ status);
			}
		}
		
		///->Marcador de rutas -> Final
		
		var distancia= google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(data[1], data[2]), new google.maps.LatLng(clientes[i][1], clientes[i][2]));
		dist= Math.round(distancia * 100) / 100;
		
		var line = new google.maps.Marker({
			position: new google.maps.LatLng(data[1], data[2]),
			map: map,
			icon: data[0]
		});
		(function (line, data, dist) {
			google.maps.event.addListener(line, "click", function (e) {
				//if($('txtOculto_'+ data[5]).val() === "undefined"){
				var tiempo= $("#txtTemp").html();
				//}
				//Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
				infoWindow.setContent("<div style = 'width:200px;min-height:40px'><table width='100%'>"+
										"<tr>"+
										"	<td rowspan='2'><img src='assets/libs/images/" + data[4] + "' width='60' /></td>"+
										"	<td><h3>" + data[3] + "</h3><br /><strong>" + data[5] + "</strong></td>"+
										"</tr>"+
										"<tr>"+
										"	<td>Cel. <em>" + data[6] + "</em></td>"+
										"</tr>"+
									   "</table></div>");
				infoWindow.open(map, line);
				$("#txtTemp").html("");
			});
		})(line, data, dist);
	}
	for(i = 0; i < clientes.length; i++){
		var datCli = clientes[i];
		
		var line = new google.maps.Marker({
			position: new google.maps.LatLng(datCli[1], datCli[2]),
			map: map,
			icon: datCli[0]
		});
		(function (line, datCli) {
			google.maps.event.addListener(line, "click", function (e) {
				//Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
				infoWindow.setContent("<div style = 'width:200px;min-height:40px'><table width='100%'>"+
										"<tr>"+
										"	<td rowspan='3' valign='top'><img src='assets/libs/images/" + datCli[4] + "' width='60' /></td>"+
										"	<td><h3>" + datCli[3] + "</h3><br /><strong>" + datCli[5] + "</strong></td>"+
										"</tr>"+
										"<tr>"+
										"	<td>Cel. <em>" + datCli[6] + "</em></td>"+
										"</tr>"+
										"<tr>"+
										"	<td align='right'><br /><br /><img src='" + datCli[7] + "' width='25' title='Tu Conductor es...' /></td>"+
										"</tr>"+
										"</table>"+
				""+
				"</table></div>");
				infoWindow.open(map, line);
			});
		})(line, datCli);
	}
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADK2fh_MERN8UyoR0-5fCW-ESCkhogHkk&callback=initMap&libraries=geometry" async defer></script>
            </div>
        </div>
    </div>
</div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->