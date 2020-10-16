export function getCurrencysConverter({firstCurrency, secondCurrency}) {
  return { firstCurrency, secondCurrency };
}
export function getMainCurrencysArray({ mainCurrencysArray }) {
  return mainCurrencysArray;
}
export function getMainCurrencysObject({ mainCurrencysObject }) {
  return mainCurrencysObject;
}
export function getCurrencys({ currencys }) {
  return currencys;
}
export function getAvailableCurrencys({ currencys }) {
  return currencys.map(item => item.CharCode);
}
export function getDialogGraph({ dialogGraph }) {
  return dialogGraph;
}
export function getHistoryCurrency({ currencyCurrencyHistory }) {
  return currencyCurrencyHistory;
}