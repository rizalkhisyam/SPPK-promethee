$(document).ready(function () {
    var loc = window.location.pathname; // grabbing the url
    // console.log(loc);
    var str = loc.split("/")[4]; // splitting the url and taking the third 
    // console.log(str);
    if(str.localeCompare("") == 0)
      $("#home").addClass("active");
    else
      $("#" + str).addClass("active");
});