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
                    template += `
            <article class="profile-card">

            <div class="info-content">

                <figure class="img-content">
                    <img class="img-card" src="img/wallpaperflare.com_wallpaper (1).jpg">
                </figure>

                <div class="score-rate">
                    <div class="score-inf">
                        <h3>5.0</h3>
                        <p>Puntos</p>
                    </div>
                    <div class="rate-inf">
                        <h3>6K</h3>
                        <p>Tarifa</p>
                    </div>
                </div>
            </div>

            <div class="contact-content">

                <div class="name-content">
                    <span class="name">${user.nombre}</span><br>
                    <p class="IDP">ID00000${user.idEstudiante}</p>
                </div>
                <div class="button-content">
                    <a class="contact-button" href="#">Contactar</a>
                </div>
            </div>

            <div class="block-routes">

                <div class="title-rout">
                    <span>Rutas:</span>
                </div>

                <div class="routes-content">

                    <ul class="list-routes">
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>
                        <li class="item-routes"><a class="rout" href="#">Cerete</a></li>

                    </ul>

                </div>

            </div>
        </article>`;});

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
                    if (requestForm.css('left') != '-400px') {
                        requestForm.css('left', '-400px');
                    }
                }
                requestForm.css('background', 'green');
            }
        });

    }

    setInterval(function () { getUserActiveToWork() }, 1000);
    setInterval(function () { receiveServiceRequest() }, 1000);

    $('#accept-service-request-btn').click(function (e) {

        //codigo para rechazar



        $.post(
            'respondToServiceRequest',
            function () {
                //console.log(response);
            });

        e.preventDefault();


    });


    console.log('documento listo');
});//fin de la funcion que prueba si el documento cargó
















