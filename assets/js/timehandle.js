/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var c = 0;
var t;
var timer_is_on = 0;

function getSessionTime() {
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    var time = localStorage.getItem("time");
    var timeTxt = document.getElementById('try_again_btn');
    if ((sPage == 'get'
            || sPage == 'next')
            && timeTxt == null) {
        if (time) {
            document.getElementById('time_store').value = time;
        } else {
            document.getElementById('time_store').value = 0;
        }
        timedCount();
    } else if (timeTxt != null) {
        genrateTime(time)
    } else {
        localStorage.setItem("time", 0)
    }
}

function genrateTime(time)
{
    var c = time;
    var minutes = (c / 60) | 0;
    var seconds = (c % 60) | 0;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    document.getElementById('timer').innerHTML = "";
    document.getElementById('timer').innerHTML = " Quiz time :"+minutes + ":" + seconds;
}

function timedCount()
{
    c = parseInt(document.getElementById('time_store').value);
    console.log("c :" + c);
    c = c + 1;
    document.getElementById('time_store').value = c;
    console.log("c :" + c);
    genrateTime(c);
    console.log("t value " + t);
    t = setTimeout("timedCount()", 1000);
}

function doTimer()
{
    if (!timer_is_on)
    {
        timer_is_on = 1;
        timedCount();
    }
}

function stopCount()
{
    clearTimeout(t);
    timer_is_on = 0;
    document.getElementById('time_store').value = c;
    localStorage.setItem("time", c);
}



