<template>
  <div class="container ">
    <div class="row">
      <h1>Choose your seat</h1>
    </div>
    <div class="row">
      <div class="col m-5">
        <div class="card">
          <div class="card-body text-center">
            SCREEN
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <template v-for="(seat, index) in seats">
        <button
          v-if="index < 10 && seat.row == 'A'"
          class="btn m-2 "
          :class="buttonClasses(seat)"
          :key="index"
          @click="updateProduct(seat.id)"
          :disabled="!seat.available"
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
    <div class="row justify-content-md-center">
      <div class="col m-5">
        <h5>Purchasing {{ selectedVariant.length }} ticket(s)</h5>
      </div>
    </div>
  </div>
  <!-- <form method="post">
    <input type="text" />
    <input type="submit" type="submit" value="Next" class="btn btn-primary" />
  </form> -->
</template>

<script>
export default {
  props: ["seats"],
  data() {
    return {
      selectedVariant: []
    };
  },
  methods: {
    updateProduct(index) {
      var i = 0;

      if (this.selectedVariant.includes(index)) {
        for (i = 0; i < this.selectedVariant.length; i++) {
          if (this.selectedVariant[i] == index)
            this.selectedVariant.splice(i, 1);
        }
      } else {
        this.selectedVariant.push(index);
      }
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

<style scoped>
h1,
h5 {
  color: black;
}
.container {
  height: 100vh;
}
</style>
