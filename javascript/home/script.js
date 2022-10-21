

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