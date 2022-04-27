$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        theme: "material",
        searchInputPlaceholder: 'Search'
    }).on('select2:open',function (e){
        if (document.documentElement.lang === "en") {
            $('.select2-search__field').attr('placeholder', 'Search');
        } else {
            $('.select2-search__field').attr('placeholder', 'بحث');
        }

    });

});

function chickAirport(form){
    // for chick an airport are not same

    let origin = form['origin'].value
    let destination = form['destination'].value

    if (origin == 'select' || destination == 'select'){
        alert("Origin or Destination is not chosen");
        return false
    }
    if(origin !== destination){
        return true;
    }else{
        alert("Both origin and destination are same!");
        return false;
    }
}

function chickAirplane(plane){

    if(plane === 'select'){
        alert("No plane has been chosen")
        return false
    }
    else {
        return true
    }
}


function chickTime(depart, arrive){

    if(depart === arrive){
        alert("Time should be different")
        return false
    }
    else{
        return true;
    }

}

function chickFlight(form){

    let airport = chickAirport(form);
    let time = chickTime(form['departure_time'].value,form['arrival_time'].value);
    let airplane = chickAirplane(form['plane_id'].value);
    return !(airport === false || time === false || airplane === false);
}

function roundTrip(ob){
    let arriveDate = document.getElementById('awayDate')
    let round = ob
    if(arriveDate !== null){

        if(!round.checked){
            arriveDate.style.display = 'none';
        }
        if(round.checked){
            arriveDate.style.display = 'block';
        }
    }
}
$('#myCollapsible').collapse({
    toggle: false
})
