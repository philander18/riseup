<script>
    $(document).ready(function() {
        $("#modal-home").modal('show');
    });
    swiper = new Swiper('.swiper', {
        loop: document.querySelectorAll('.swiper-slide').length > 1,
        autoplay: {
            delay: 100000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>