// <div class="container">
//     <div class="panel panel-primary">
//     <div class="panel-heading">
//     <h2 class="panel-title">Add your Address</h2>
// </div>
// <div class="panel-body">
//     <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" class="form-control">
//     <div id="address">
//     <div class="row">
//     <div class="col-md-6">
//     <label class="control-label">Street address</label>
// <input class="form-control" id="street_number" disabled="true">
//     </div>
//     <div class="col-md-6">
//     <label class="control-label">Route</label>
//     <input class="form-control" id="route" disabled="true">
//     </div>
//     </div>
//     <div class="row">
//     <div class="col-md-6">
//     <label class="control-label">City</label>
//     <input class="form-control field" id="locality" disabled="true">
//     </div>
//     <div class="col-md-6">
//     <label class="control-label">State</label>
//     <input class="form-control" id="administrative_area_level_1" disabled="true">
//     </div>
//     </div>
//     <div class="row">
//     <div class="col-md-6">
//     <label class="control-label">Zip code</label>
// <input class="form-control" id="postal_code" disabled="true">
//     </div>
//     <div class="col-md-6">
//     <label class="control-label">Country</label>
//     <input class="form-control" id="country" disabled="true">
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>
// <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAteeaTGDmHd0ECWPah2EIPMJksVSW5IyI&libraries=places&callback=initAutocomplete" async defer></script>

let autocomplete;
let componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    administrative_area_level_2: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    let place = autocomplete.getPlace();

    for (let component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (let i = 0; i < place.address_components.length; i++) {
        let addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            document.getElementById(addressType).value = place.address_components[i][componentForm[addressType]];
        }
    }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            let circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
function refuserToucheEntree(event)
{
    // Compatibilité IE / Firefox
    if(!event && window.event) {
        event = window.event;
    }
    // IE
    if(event.keyCode === 13) {
        event.returnValue = false;
        event.cancelBubble = true;
    }
    // DOM
    if(event.which === 13) {
        event.preventDefault();
        event.stopPropagation();
    }
}