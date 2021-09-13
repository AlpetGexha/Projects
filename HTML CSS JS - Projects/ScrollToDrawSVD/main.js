var produkti = document.getElementById("produkti");
var length = produkti.getTotalLength();

produkti.style.strokeDasharray = length;
produkti.style.strokeDashoffset = length;

window.addEventListener("scroll", myFunction);


function myFunction() {
    var scrollpercent = (document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement
        .scrollHeight - document.documentElement.clientHeight);

    var draw = length * scrollpercent;


    produkti.style.strokeDashoffset = length - draw;
}