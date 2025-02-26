<script>
    function method_url(controller, method) {
        const base_url = "<?= base_url(); ?>" + controller + '/' + method;
        return base_url;
    }

    function updateCountdown() {
        var targetDate = new Date("April 26, 2025 16:00:00").getTime();
        var now = new Date().getTime();
        var distance = targetDate - now;

        if (distance < 0) {
            $("#countdown").html("Waktu telah tiba!");
            return;
        }

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $("#countdown").html(days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik lagi");
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>