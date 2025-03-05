<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('products', () => ({
            produks: <?= json_encode($produk) ?>,
        }));
        Alpine.store('cart', {
            items: [],
            total: 0,
            quantity: 0,

            add(newItem) {
                const cartItem = this.items.find((item) => item.id === newItem.id);
                if (!cartItem) {
                    this.items.push({
                        ...newItem,
                        quantity: 1,
                        total: Number(newItem.harga)
                    });
                    this.quantity++;
                    this.total += Number(newItem.harga);
                } else {
                    this.items = this.items.map((item) => {
                        if (item.id !== newItem.id) {
                            return item;
                        } else {
                            item.quantity++;
                            item.total = Number(item.harga) * item.quantity;
                            this.quantity++;
                            this.total += Number(item.harga);
                            return item;
                        }
                    })
                }
            },
            remove(id) {
                const cartItem = this.items.find((item) => item.id === id);
                if (cartItem.quantity > 1) {
                    this.items == this.items.map((item) => {
                        if (item.id !== id) {
                            return id;
                        } else {
                            item.quantity--;
                            item.total = Number(item.harga) * item.quantity;
                            this.quantity--;
                            this.total -= Number(item.harga);
                            return item;
                        }
                    })
                } else if (cartItem.quantity === 1) {
                    this.items = this.items.filter((item) => item.id !== id);
                    this.quantity--;
                    this.total -= Number(cartItem.harga);
                }
            },
        })
    });
    const rupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(number);
    };
</script>