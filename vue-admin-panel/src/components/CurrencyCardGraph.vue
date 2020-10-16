<template>
  <q-dialog v-model="isOpen">
    <q-card class="graph-card">
      <q-card-section>
        <div class="text-h6">Alert</div>
      </q-card-section>

      <q-card-section class="q-pt-none">
        <canvas class="chartjs" ref="chart" width="1000" height="600"></canvas>
      </q-card-section>

      <q-card-actions align="right">
        <q-btn flat label="OK" color="primary" v-close-popup />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import Chart from "chart.js";
import { mapMutations, mapGetters } from "vuex";
export default {
  name: "CurrencyCardGraph",
  data: function() {
    return {
      canvas: null,
      context: null,
      labels: ["1", "2", "3", "4", "5", "6"],
      data: [12, 19, 3, 5, 2, 3],
      chart: null
    };
  },
  computed: {
    ...mapGetters("currency", ["getDialogGraph", "getHistoryCurrency"]),
    isOpen: {
      get() {
        return this.getDialogGraph;
      },
      set(value) {
        this.changeDialogGraph(value);
      }
    }
  },
  updated() {
    this.$nextTick(() => {
      this.canvas = this.$refs.chart;
      this.context = this.canvas.getContext("2d");
      this.labels = this.getHistoryCurrency.labels;
      this.data = this.getHistoryCurrency.values;
      this.chart = new Chart(this.canvas, {
        type: "line",
        data: {
          labels: this.labels,
          datasets: [
            {
              label: "Цена",
              data: this.data,
              borderWidth: 1,
              backgroundColor: ["rgba(54, 162, 235, 0.4)"],
              borderColor: ["rgba(54, 162, 235, 1)"],
              pointBorderColor:"rgba(54, 162, 235, 1)",
              pointBackgroundColor:"rgba(54, 162, 235, 1)"
            }
          ]
        }
      });
    });
  },
  methods: {
    ...mapMutations("currency", ["changeDialogGraph"]),
    updateSize() {
      let { width, height } = getComputedStyle(this.canvas);
      this.canvas.width = width;
      this.canvas.height = height;
    }
  }
};
</script>

<style lang="scss">
</style>
