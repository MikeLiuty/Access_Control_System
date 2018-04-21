$(document).ready(function() {

    var d = new Date();
    var hour = d.getHours();
    if (hour >= 6 && hour <= 12) {
        greetingtime = 'Good Morning, ';
    } else if (hour >= 13 && hour <= 17) {
        greetingtime = 'Good Afternooon, ';
    } else if (hour >= 18 && hour <= 23) {
        greetingtime = 'Good Evening, ';
    } else {
        greetingtime = "Wow, you're working really hard, ";
    }

    $('#greetingtime').html(greetingtime);

});