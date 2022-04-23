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
    if(origin !== destination){
        return true;
    }else{
        alert("Both origin and destination are same!");
        return false;
    }
}
