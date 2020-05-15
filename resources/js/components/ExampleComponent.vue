<template>
    <div class="container ">
        <div class="row justify-content-md-center">
            <template v-for="(seat, index) in seats">
                <button
                    v-if="index < 10 && seat.row == 'A'"
                    class="btn m-2"
                    :class="buttonClasses(seat)"
                    :key="index"
                    @click="updateProduct(seat.id)"
                >
                    {{ seat.id }} - {{ seat.row }}
                </button>
            </template>
        </div>
        <div class="row justify-content-md-center">
            <template v-for="(seat, index) in seats">
                <button
                    v-if="index < 50 && seat.row == 'B'"
                    class="btn m-2"
                    :class="buttonClasses(seat)"
                    :key="index"
                    @click="updateProduct(seat.id)"
                >
                    {{ seat.id }} - {{ seat.row }}
                </button>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            seats: [
                { id: 1, row: "A", available: false },
                { id: 2, row: "A", available: false },
                { id: 3, row: "A", available: false },
                { id: 4, row: "A", available: false },
                { id: 5, row: "A", available: false },
                { id: 6, row: "A", available: true },
                { id: 7, row: "A", available: true },
                { id: 8, row: "A", available: true },
                { id: 9, row: "A", available: true },
                { id: 10, row: "A", available: true },
                { id: 11, row: "B", available: false },
                { id: 12, row: "B", available: false },
                { id: 13, row: "B", available: false },
                { id: 14, row: "B", available: false },
                { id: 15, row: "B", available: false },
                { id: 16, row: "B", available: false },
                { id: 17, row: "B", available: false },
                { id: 18, row: "B", available: true },
                { id: 19, row: "B", available: true },
                { id: 20, row: "B", available: true },
                { id: 21, row: "B", available: true },
                { id: 22, row: "B", available: true },
                { id: 23, row: "B", available: false },
                { id: 24, row: "B", available: false },
                { id: 25, row: "B", available: false },
                { id: 26, row: "B", available: false },
                { id: 27, row: "B", available: false },
                { id: 28, row: "B", available: true },
                { id: 29, row: "B", available: true },
                { id: 30, row: "B", available: true }
            ],
            selectedVariant: []
        };
    },
    methods: {
        updateProduct(index) {
            // var i = 0;
            // for (i; i < this.selectedVariant.length; i++) {
            //     if (seat.id == this.selectedVariant[i])
            //         this.selectedVariant.splice(i, 1);
            // }
            this.selectedVariant.push(index);
        },
        buttonClasses(seat) {
            var i = 0;
            for (i; i < this.selectedVariant.length; i++) {
                if (seat.id == this.selectedVariant[i]) return "btn-warning";
            }
            return seat.available ? "btn-success" : "btn-dark";
        }
    }
};
</script>
