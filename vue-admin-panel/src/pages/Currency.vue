<template>
  <q-page class="q-pa-lg ">
    <div class="q-mb-xl">
      <div class="text-h4">Валюты</div>
      <div class="text-caption text-weight-light"> по данным ЦБ РФ на {{this.currentDate}}</div>
    </div>
    <div
      class="full-width row inline no-wrap justify-between items-stretch content-stretch"
    >
      <CurrencyCard
        v-for="item in getMainCurrencysArray"
        :key="item"
        :infoCurrency="getMainCurrencysObject[item]"
        :loading="loading"
      ></CurrencyCard>
    </div>
    <div class="q-mt-xl wrapper-currency">
      <CurrencyTable class='currency-table'> </CurrencyTable>
      <CurrencyConverter class="currency-converter"></CurrencyConverter>
    </div>
    <CurrencyCardGraph/>
  </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { date } from 'quasar'
import CurrencyCard from "../components/CurrencyCard";
import CurrencyTable from "../components/CurrencyTable";
import CurrencyConverter from '../components/CurrencyConverter';
import CurrencyCardGraph from '../components/CurrencyCardGraph';
import API from "../services/api";
export default {
  name: "Currency",
  data: function() {
    return {
      loading: true,
      currentDate: null,
    };
  },
  async mounted() {
    let timeStamp = Date.now()
    this.currentDate = date.formatDate(timeStamp, 'YYYY.MM.D')
    const response = await API.getCurrency();
    this.addCurrencys(response);
    this.getMainCurrency(response);
    this.loading = false;
  },
  computed: {
    ...mapGetters('currency', ['getMainCurrencysObject', 'getMainCurrencysArray']),
  },
  methods: {
    ...mapActions('currency', ['addCurrencys', 'addMainCurrencys']),
    getMainCurrency(currencys) {
      let mainCurrency = [];
      currencys.forEach(currency => {
        if(typeof this.getMainCurrencysObject[currency.CharCode] == 'object') {
          this.addMainCurrencys({currency: currency.CharCode, info: currency});
        }
      });
    }
  },
  components: {
    CurrencyCard,
    CurrencyTable,
    CurrencyConverter,
    CurrencyCardGraph
  }
};
</script>

<style lang="scss">
.wrapper-currency {
  display: flex;
  justify-content: space-between;
  .currency-table {
    width: 66%
  }
  .currency-converter {
    width: 32.5%;
  }
}
</style>
