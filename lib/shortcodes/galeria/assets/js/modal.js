/**
 * modal
 */

(function ($) {
    // $(document).ready(function () {
    //     $('.modal-content').appendTo('footer');
    // });

    // var modal = document.querySelector('.modal');
    // var modal = document.getElementById('modalImagen');
    // console.log(modal);

    // var open_modal = document.querySelector('.link-modal');
    // console.log(open_modal);

    // document.getElementById('open-modal').addEventListener('click', openModal);
    // document.getElementById('close-modal').addEventListener('click', closeModal);

    function openModal( image ) {
        // console.log('me has abierto');

        var modal = document.getElementById('modalImagen');
        modal.style.display = 'flex';
        console.log(modal);
    }

    function closeModal() {
        var modal = document.getElementById('modalImagen');
        console.log('me has cerrao');
        modal.style.display = 'none';
    }

    // document.getElementById("demo").addEventListener("click", myFunction);

    // function myFunction() {
    //     document.getElementById("demo").innerHTML = "YOU CLICKED ME!";
    // }

})(jQuery);