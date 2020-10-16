<template>
  <q-table
    title="Основные мировые валюты"
    :data="getCurrencys"
    :columns="columns"
    hide-bottom
    :pagination.sync="pagination"
    bordered
    class="no-shadow"
    :loading="loading"
    @row-click="openDialogGraph"
  >
    <template v-slot:body-cell-img="props">
      <q-td :key="props.row.img" :props="props">
        <q-avatar size="32px" rounded> <img :src="props.row.img" /> </q-avatar>
      </q-td>
    </template>
    <template v-slot:body-cell-Value="props">
      <q-td :key="props.row.Value" :props="props">
        {{ props.row.Value }} &#x20bd;
      </q-td>
    </template>
    <template v-slot:body-cell-Previous="props">
      <q-td :key="props.row.Previous" :props="props">
        {{ props.row.Previous }} &#x20bd;
      </q-td>
    </template>
    <template v-slot:body-cell-difference="props">
      <q-td :key="props.row.difference" :props="props">
        <template v-if="props.row.difference < 0">
          <q-badge color="red">
            {{ props.row.difference }} &#x20bd;
          </q-badge>
        </template>
        <template v-else-if="props.row.difference > 0">
          <q-badge color="green">
            +{{ props.row.difference }} &#x20bd;
          </q-badge>
        </template>
        <template v-else>
          <q-badge color="blue">
            {{ props.row.difference }} &#x20bd;
          </q-badge>
        </template>
      </q-td>
    </template>
  </q-table>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";
import Api from '../services/api';
export default {
  name: "CurrencyTable",
  data() {
    return {
      pagination: {
        rowsPerPage: 0
      },
      columns: [
        {
          name: "img",
          label: "Флаг",
          align: "left",
          field: "img"
        },
        {
          name: "Name",
          label: "Название",
          field: "Name",
          align: "left"
        },
        {
          name: "CharCode",
          align: "center",
          label: "Сокращенное название",
          field: "CharCode",
          align: "left"
        },
        {
          name: "Value",
          label: "Цена",
          field: "Value",
          align: "left",
          sortable: true
        },
        {
          name: "Previous",
          label: "Прошлая цена",
          field: "Previous",
          align: "left",
          sortable: true
        },
        {
          name: "difference",
          field: "difference",
          label: "Разница",
          sortable: true
        }
      ],
      loading: true
    };
  },
  computed: {
    ...mapGetters("currency", ["getCurrencys"])
  },
  updated() {
    if (this.getCurrencys.length != 0) this.loading = false;
  },
  methods: {
    ...mapMutations("currency", [
      "changeDialogGraph",
    ]),
    ...mapActions('currency', ['addHistoryCurrency']),
    async openDialogGraph(evt, row, index) {
      const historyCurrency = await Api.getCurrencyHistory(row.CharCode);
      this.addHistoryCurrency({labels: historyCurrency[row.CharCode].labels, values: historyCurrency[row.CharCode].values })
      this.changeDialogGraph(true);
    }
  }
};
</script>

<style></style>
