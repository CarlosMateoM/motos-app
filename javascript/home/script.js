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


$(document).ready(function () {

    function getUserActiveToWork() {

        $.ajax({
            url: 'home/activeUsers',
            type: 'POST',
            success: function (response) {
                let users = JSON.parse(response);
                let template = "";
                users.forEach(user => {
                    template += `<div class='card'>
                <div class='card_info'>
                    <div style='width: 60%' class='name_student'>
                        <strong> ${user.nombre} </strong>
                        <br><br>
                        <strong id='id-estudiante'> ${user.telefono} </strong>
    
    
                        <img width='50px' src='img/motorbike.png' alt=''>
    
                    </div>
                    <div>
                        <form class='contact-student' action='hola'>
                            <strong> ${user.idEstudiante} </strong>
                            <input class='contact-student' type='submit' value='contactar'> 
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

                $('.contact-student').submit(function (e) {
                    console.log('submit');
                    let id = $(this).children()[0].innerHTML;
                    $.post(
                        'sendRequestService',
                        { id },
                        function (response) {
                            console.log(response);
                        });
                    e.preventDefault();
                });
            }
        });



    }


    function receiveServiceRequest() {

        $.ajax({
            url: 'receiveServiceRequest',
            type: 'POST',
            success: function (response) {
                let requestForm = $('.request-service');
                if (response != -1) {
                    requestForm.css('left', '0px');
                } else {
                    if(requestForm.css('left') != '-400px'){
                        requestForm.css('left', '-400px');
                    }
                }
            }
        });

    }

    setInterval(function () { getUserActiveToWork() }, 1000);
    setInterval(function () { receiveServiceRequest() }, 1000);

    $('#accept-service-request-btn').click(function(){
        
    });


    console.log('documento listo');
});//fin de la funcion que prueba si el documento cargó
















