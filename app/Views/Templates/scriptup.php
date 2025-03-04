<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('products', () => ({
            produks: <?= json_encode($produk) ?>,
        }));
    });
    const rupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(number);
    };
</script>