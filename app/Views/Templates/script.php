<script>
    // toogle class active

    // Ketika hamburger-menu di klik
    $(document).ready(function() {
        // toogle class active
        // Ketika hamburger-menu di klik
        $('#hamburger-menu').on('click', function() {
            $('.navbar-nav').toggleClass('active');
        });
        // Klik di luar sidebar untuk menghilangkan nav
        $(document).click(function(event) {
            if (!$(event.target).closest(".navbar-nav, #hamburger-menu").length) {
                $(".navbar-nav").removeClass('active');
            }
        })
    })
</script>