<template>
  <div class="flex column">
    <div class="q-mb-lg">
      <q-btn-group class="fit currency-group" spread>
        <q-btn-toggle
          v-model="firstCurrencyType"
          spread
          class="my-custom-toggle"
          no-caps
          unelevated
          toggle-color="primary"
          color="white"
          text-color="primary"
          :options="[
            { label: 'USD', value: 'USD' },
            { label: 'EUR', value: 'EUR' },
            { label: 'RUB', value: 'RUB' },
            { label: 'BYN', value: 'BYN' },
            { label: 'AUD', value: 'AUD' },
            { label: 'AZN', value: 'AZN' }
          ]"
        />
        <q-btn-dropdown
          auto-close
          rounded
          outline
          color="primary"
          class="currency-dropdown"
        >
          <!-- dropdown content goes here -->
          <q-list padding>
            <q-item clickable v-for="currency in getAvailableCurrencys" :key="currency" class="q-pa-md" @click="changeFirstCurrencyType(currency)">
              <q-item-section>
                <q-item-label>{{currency}}</q-item-label>
              </q-item-section>
            </q-item>
          </q-list>
        </q-btn-dropdown>
      </q-btn-group>
    </div>
    <q-card flat bordered class="flex column q-py-md card-converter">
      <q-card-section class="text-caption q-pb-none">
        <div class="text-h2">
          <q-input
            v-model="firstCurrencyValue"
            borderless
            mask="#########"
            class="input-converter"
          />
        </div>
      </q-card-section>
      <q-card-section class="text-caption q-pt-none">
        <div>1 RUB = 0.0136 USD</div>
      </q-card-section>
    </q-card>
    <div class="flex flex-center">
      <q-icon name="unfold_less" style="font-size: 5rem;" />
    </div>
    <div class="q-my-lg ">
      <q-btn-group class="fit currency-group" spread>
        <q-btn-toggle
          v-model="secondCurrencyType"
          spread
          class="my-custom-toggle"
          no-caps
          unelevated
          toggle-color="primary"
          color="white"
          text-color="primary"
          :options="[
            { label: 'USD', value: 'USD' },
            { label: 'EUR', value: 'EUR' },
            { label: 'RUB', value: 'RUB' },
            { label: 'BYN', value: 'BYN' },
            { label: 'AUD', value: 'AUD' },
            { label: 'AZN', value: 'AZN' }
          ]"
        />
        <q-btn-dropdown
          auto-close
          rounded
          outline
          color="primary"
          class="currency-dropdown"
        >
          <!-- dropdown content goes here -->
          <q-list padding>
            <q-item clickable v-for="currency in getAvailableCurrencys" :key="currency" class="q-pa-md" @click="changeSecondCurrencyType(currency)">
              <q-item-section>
                <q-item-label>{{currency}}</q-item-label>
              </q-item-section>
            </q-item>
          </q-list>
        </q-btn-dropdown>
      </q-btn-group>
    </div>
    <q-card flat bordered class="flex column q-py-md card-converter">
      <q-card-section class="text-caption text-center q-pb-none">
        <div class="text-h2">
          <q-input
            v-model="secondCurrencyValue"
            borderless
            mask="#########"
            class="input-converter"
          />
        </div>
      </q-card-section>
      <q-card-section class="text-caption q-pt-none">
        <div>1 RUB = 0.0136 USD</div>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapMutations } from "vuex";
export default {
  name: "CurrencyConverter",
  data() {
    return {
      model: null
    };
  },
  computed: {
    ...mapGetters("currency", ["getCurrencysConverter", "getAvailableCurrencys"]),
    firstCurrency() {
      return this.getCurrencysConverter.firstCurrency;
    },
    secondCurrency() {
      return this.getCurrencysConverter.secondCurrency;
    },
    firstCurrencyType: {
      get() {
        return this.firstCurrency.type;
      },
      set(value) {
        this.changeFirstCurrencysType(value);
      }
    },
    firstCurrencyValue: {
      get() {
        return this.firstCurrency.value;
      },
      set(value) {
        this.changeFirstCurrencysValue(value);
      }
    },
    secondCurrencyType: {
      get() {
        return this.secondCurrency.type;
      },
      set(value) {
        this.changeSecondCurrencysType(value);
      }
    },
    secondCurrencyValue: {
      get() {
        return this.secondCurrency.value;
      },
      set(value) {
        this.changeSecondCurrencysValue(value);
      }
    },
  },
  updated() {
    console.log(this.getAvailableCurrencys);
  },
  methods: {
    ...mapMutations("currency", [
      "changeFirstCurrencysType",
      "changeFirstCurrencysValue",
      "changeSecondCurrencysType",
      "changeSecondCurrencysValue"
    ]),
    changeFirstCurrencyType(value) {
      this.firstCurrencyType = value
    },
    changeSecondCurrencyType(value) {
      this.secondCurrencyType = value;
    }
  }
};
</script>

<style lang="scss">
.card-converter {
  .input-converter {
    font-size: 32px;
  }
}
.change-convert-currency {
  border-right: 1px solid $primary;
}
.currency-group {
  .my-custom-toggle {
    border: 1px solid #027be3;
    border-right: 0px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    width: 85%;
  }
  .currency-dropdown {
    width: 15%;
  }
}
</style>
