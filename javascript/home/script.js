document.addEventListener("DOMContentLoaded", function (event) {
    let isShowing = false;

    let nav = document.getElementById("nav");
    let header = document.getElementById("header");
    let btn = document.getElementById("btn");

    btn.addEventListener("click", () => {
        if (isShowing) {
            nav.style.left = "-70%";
            isShowing = false;
            header.style.marginLeft = "0px";

        } else {

            header.style.marginLeft = "70%";
            nav.style.left = "0px";
            isShowing = true;
        }
    });
});


$(function(){
    console.log("hello word");
});

function getUserActiveToWork(){

$.ajax({
    url: 'home/activeUsers',
    type: 'POST',
    success: function(response){
        let users = JSON.parse(response);
        let template = "";
        users.forEach(user => {
            template += `<div class='card'>
            <div class='card_info'>
                <div style='width: 60%' class='name_student'>
                    <strong> ${user.nombre} </strong>
                    <br><br>

                    <img width='50px' src='img/motorbike.png' alt=''>

                </div>
                <div>
                    <form action='home/contact' method='post'>
                        <input type='submit' value='enviar'> 
                    </form>
                    <br><br>
                    <span>$ 8.0000</span>
                    <br><br>
                    <strong>3.1 </strong><span style='font-size:10px ;'>Puntuación</span>
                </div>
            </div>
            
            <div class='card_roads' >
                <div class='road_title' >
                    <strong class='road_title'>rutas</strong>
                </div>
                <span class='rutas' >cerete</span>
                <span class='rutas' >cerete</span>
                <span class='rutas' >cerete</span>

            </div>
        </div>`;
        });

        $('#main-container').html(template);
    }
});

}

setInterval(function(){getUserActiveToWork()},1000);



