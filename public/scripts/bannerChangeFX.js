let img_state = false;

function changeImg(idImg, delay, urlImg) {
    let image = $(idImg);

    image.fadeOut(delay, () => {
        image.css("background-image", "url("+urlImg+")");
        image.fadeIn(delay);
    });
}

$(document).ready(() => {
    $('#img_login').click(() => {
        img_state = !img_state;

        if (img_state)
            changeImg('#img_login', 1000, "img/cursed_hedge.jpg");
        else 
            changeImg('#img_login', 1000, "img/banner_izq.png");
    });
});
