google.maps.event.addDomListener(window,"load",function(){
    const ubicacion = new Localizacion(()=>{
        const myLatLng={lat: ubicacion.latitude, lng: ubicacion.longitude};
        
        const options={
            center: myLatLng,
            zoom:15
        };
        
        
        var map = document.getElementById('map');
        const mapa = new google.maps.Map(map,options);
        const marcador = new google.maps.Marker({
            position: myLatLng,
            map: mapa, 
            draggable: true,
            animation: google.maps.Animation.DROP,
        });
        

        var informacion = new google.maps.InfoWindow();
        
        

        
        marcador.addListener('click',function(){
            informacion.open(mapa,marcador);
            document.getElementById("txtlat").value = this.getPosition().lat();
            document.getElementById("txtlon").value = this.getPosition().lng();
        });
        marcador.addListener('click', toggleBounce);
        marcador.addListener( 'dragend', function (event)
      {
        document.getElementById("txtlat").value = this.getPosition().lat();
        document.getElementById("txtlon").value = this.getPosition().lng();
      });
        
       
        var autocomplete = document.getElementById('autocomplete');
        const search = new google.maps.places.Autocomplete(autocomplete);
        
        search.bindTo("bounds",mapa);
  
        
        search.addListener('place_changed',function(){
            informacion.close();
            marcador.setVisible(false);
            
            var place = search.getPlace();
            
            if (!place.geometry.viewport) {
                window.alert("Error al mostrar el lugar");
                return;
            }
            if (place.geometry.viewport) {
                mapa.fitBounds(place.geometry.viewport);
            }else{
                mapa.setCenter(place.geometry.location);
                mapa.setZoom(18);
            }
            marcador.setPosition(place.geometry.location);
           
           
            
            marcador.setVisible(true);
            var addres = "";
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || ''),
                ];
            }
            
            informacion.setContent('<div><strong>'+place.name+'</strong><br>'+address);
            informacion.open(map,marcador);
        });


    });
    

});
const marcador = new google.maps.Marker
function toggleBounce() {
  if (marcador.getAnimation() !== null) {
    marcador.setAnimation(null);
  } else {
    marcador.setAnimation(google.maps.Animation.BOUNCE);
  }
}

