$(document).ready(() => {

    var i = 0;
    var w = window.matchMedia("(min-width: 768px)");
    var txt = "welcome to my portfolio hi, i'm AAron :]";
    var speed = 90;
    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("text").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
    typeWriter();
})

/*

 This code will repeat the typewriter animation on a time interval. I just want it to run once when page loads. 

* else{
            rep(w);
            w.addListener(rep);
        }
    }
    function rep(w) {
        if (w.matches) {
            setTimeout(function(){
                i = 0;
                speed = 80;
                document.getElementById("text").innerHTML = '';
                setTimeout(typeWriter, speed);
            }, 5000);
        }
    }
*
*
* */
