<script>
    function recentlyViewed() {
        return {
            items: [],
            init() {
                const STORAGE_KEY = 'recently_viewed_products';
                try {
                    this.items = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
                } catch (e) {
                    this.items = [];
                }
            },
            scrollLeft() {
                this.$refs.track?.scrollBy({ left: -220, behavior: 'smooth' });
            },
            scrollRight() {
                this.$refs.track?.scrollBy({ left: 220, behavior: 'smooth' });
            },
        };
    }
</script>

<script>
    function allProducts(all, baseUrl) {
        return {
            all: all || [],
            baseUrl: baseUrl,
            perPage: 6,
            visibleCount: 6,

            init() {
                this.visibleCount = Math.min(this.perPage, this.all.length);
            },

            get visible() {
                return this.all.slice(0, this.visibleCount);
            },

            get hasMore() {
                return this.visibleCount < this.all.length;
            },

            loadMore() {
                this.visibleCount = Math.min(
                    this.visibleCount + this.perPage,
                    this.all.length
                );
            },

            formatPrice(value) {
                try {
                    return new Intl.NumberFormat('en-GH').format(value ?? 0);
                } catch (e) {
                    return value;
                }
            },
        };
    }
</script>
