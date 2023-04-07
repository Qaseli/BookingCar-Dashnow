let input1 = document.getElementById('from')
let input2 = document.getElementById('to')

let autocomplete1 = new google.maps.places.Autocomplete(input1)
let autocomplete2 = new google.maps.places.Autocomplete(input2)

let mtLatLng={
    lat:38.346,
    lng:-0.4907
}
let mapOptions = {
    center:mtLatLng,
    zoom:7,
    mapTypeId:google.maps.MapTypeId.ROADMAP
}

let map = new google.maps.Map(document.getElementById('googleMap'),mapOptions);

var directionService = new google.maps.DirectionService();

var directionDisplay = new google.maps.DirectionRenderer();

directionDisplay.setMap(map);

function calRoute(){
    let request = {
        origin : document.getElementById('form').value,
        destination : document.getElementById('to').value,
        travelMode : google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.IMPERIAL
    }

    DirectionService.route(request,function(result,status){
        if(status == google.maps.DirectionStatus.OK){
            const output = document.querySelector("#output");
            output.innerHTML =
                "<div class='alert-info'>From: " +
                document.getElementById("from").value +
                ".<br />To: " +
                document.getElementById("to").value +
                ".<br /> Driving distance <i class='fas fa-road'></i> : " +
                result.routes[0].legs[0].distance.text +
                ".<br /> Duration <i class='fas fa-hourglass-start'></i> : " +
                result.routes[0].legs[0].duration.text + 
                ".</div>";

                directionDisplay.setDirections(result);
        }
    })
}