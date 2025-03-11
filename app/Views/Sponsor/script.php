<script>
    $(document).ready(function() {
        $("#modal-sponsor").modal('show');
        setTimeout(function() {
            var swiper = new Swiper('.swiper', {
                loop: document.querySelectorAll('.swiper-slide').length > 1,
                autoplay: {
                    delay: 3000,
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
        }, 1000);
    });
</script>