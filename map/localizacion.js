class Localizacion{
    constructor(callback){
        if (navigator.geolocation) {
            //obtener la ubicacion
            navigator.geolocation.getCurrentPosition((position)=>{
                this.latitude = position.coords.latitude;
                this.longitude = position.coords.longitude;
                document.getElementById("txtlon").value = this.longitude;
                document.getElementById("txtlat").value = this.latitude;
                
                callback();
            });
        }else{
            alert("Tu navegador no soporta geolocalizacion");
        }
        
    }
}