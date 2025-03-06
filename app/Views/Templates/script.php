<script>
    function method_url(controller, method) {
        const base_url = "<?= base_url(); ?>" + controller + '/' + method;
        return base_url;
    }

    function tombol_checkout() {
        if ($('#nama-pelanggan').val() != '' && $('#pengiriman-pelanggan').val() != '' && $('#jumlah-item').val() != 0) {
            if ($('#pengiriman-pelanggan').val() == 'pribadi') {
                if ($('#hp-pelanggan').val() != '' && $('#alamat-pelanggan').val() != '') {
                    $('#checkout').prop('disabled', false);
                } else {
                    $('#checkout').prop('disabled', true);
                }
            } else {
                if ($('#gereja-pelanggan').val() != '') {
                    $('#checkout').prop('disabled', false);
                } else {
                    $('#checkout').prop('disabled', true);
                }
            }
        } else {
            $('#checkout').prop('disabled', true);
        }
    }

    function kosong_form_pelanggan() {
        $('#nama-pelanggan').val('');
        $('#pengiriman-pelanggan').val('');
        $('#hp-pelanggan').val('');
        $('#alamat-pelanggan').val('');
        $('#textarea-alamat-pelanggan').html(200);
        $('#gereja-pelanggan').val('');
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