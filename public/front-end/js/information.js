
$(function () {

    const fileUploader = document.getElementById('food-banner');
    fileUploader.addEventListener('change', (e) => {
        var image = document.getElementById('img-food-banner');
        image.src = URL.createObjectURL(e.target.files[0]);
    });

    const fileUploader2 = document.getElementById('menu-banner');
    fileUploader2.addEventListener('change', (e) => {
        var image = document.getElementById('img-menu-banner');
        image.src = URL.createObjectURL(e.target.files[0]);
    });

});
