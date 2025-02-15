<script>
    function tombol_registrasi() {
        if ($('#nama').val() != '' && $('#hp').val() != '' && $('#umur').val() != '' && $('#gender').val() != '' && ((($('#gereja').val() != '' && $('#gereja').val() != 'lainnya')) || (($('#gereja').val() == 'lainnya' && $('#gerejaLainInput').val() != ''))) && $('#harapan').val() != '') {
            $('.submit-registrasi').prop('disabled', false);
        } else {
            $('.submit-registrasi').prop('disabled', true);
        }
    }

    function tampil_flash() {
        $.ajax({
            url: method_url('Home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('#gereja').change(function() {
            if ($(this).val() === 'lainnya') {
                $("#gerejaLain").addClass('active');
            } else {
                $("#gerejaLain").removeClass('active');
            }
        });

        $('#nama, #hp, #umur, #gender, #gereja, #harapan, #gerejaLainInput').on('change', function() {
            tombol_registrasi();
        });

        $('#submit-registrasi').on('click', function() {
            const nama = $('#nama').val(),
                hp = $('#hp').val(),
                umur = $('#umur').val(),
                gender = $('#gender').val(),
                harapan = $('#harapan').val();
            if ($('#gereja').val() == 'lainnya') {
                var gereja = $('#gerejaLainInput').val();
            } else {
                var gereja = $('#gereja').val();
            }
            console.log(gereja);
            $.ajax({
                url: method_url('Registrasi', 'input_peserta'),
                data: {
                    nama: nama,
                    hp: hp,
                    umur: umur,
                    gender: gender,
                    gereja: gereja,
                    harapan: harapan,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.flash').html(data);
                    $('#nama').val('');
                    $('#hp').val('');
                    $('#umur').val('');
                    $('#gender').val('');
                    $('#gereja').val('');
                    $('#harapan').val('');
                    tombol_registrasi();
                }
            });
        });

    });
</script>