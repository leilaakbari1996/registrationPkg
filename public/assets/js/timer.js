let totalSecs;
$.timer = function ()
{
    let timer;
    let otp = $("[name = dateOtp]").val();

    var today = new Date();
    var dd = String(today.getSeconds()).padStart(2, '0');
    var mm = String(today.getMinutes() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getHours();
    today = yyyy + ':' + mm + ':' + dd;
    var time1= otp;
    var time2= today;

    totalSecs = $.strToMins(time1) - $.strToMins(time2);
    $.incTimer();


}

$.incTimer = function() {
    var currentMinutes = Math.floor(totalSecs / 60);
    var currentSeconds = totalSecs % 60;

    totalSecs--;
    $('#timer').text(currentMinutes + ":" + currentSeconds);
    if(currentMinutes < 1 && currentSeconds < 1 )
    {
        currentMinutes = 0;
        currentSeconds = 0;
        $('#timer').text(currentMinutes + ":" + currentSeconds);
        $('.resend-otp').css('display','block');
        $('#timer').css('display','none');
    }else
    {
        $('#timer').css('display','block');
        $('#timer1').css('display','block');
        timer = setTimeout('$.incTimer()', 1000);
    }
}

$.strToMins = function (t) {
    var s = t.split(":");
    return Number(s[0]) * 60 * 60 + s[1]*60 + Number(s[2]);
}
