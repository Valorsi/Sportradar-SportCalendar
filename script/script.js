function filterSport() {
    var sport = $("#filter").val();
    console.log(sport);
        $.ajax({
            url: "filter.php",
            method: 'POST',
            data: {'sport':sport},
            success: function(result){
                $(".sport-calendar-row").remove();
                $(".sport-calendar-table").append(result);
            }});
}