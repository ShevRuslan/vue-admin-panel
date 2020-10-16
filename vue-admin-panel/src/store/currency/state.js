export default function() {
  return {
    currencys: [],
    mainCurrencysArray: ['USD','EUR', 'BYN'],
    mainCurrencysObject: { USD: {}, EUR: {}, BYN: {} },
    firstCurrency: {
      value: 5000,
      type: "USD"
    },
    secondCurrency: {
      value: 5000,
      type: "RUB"
    },
    dialogGraph: false,
    currencyCurrencyHistory: {
      labels: [],
      values: [],
    }
  };
}
