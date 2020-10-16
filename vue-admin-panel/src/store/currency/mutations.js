export function addCurrencys(state, payload) {
  state.currencys = payload;
}
export function addMainCurrencys(state, payload) {
  state.mainCurrencysObject[payload.currency] = payload.info;
}
export function changeFirstCurrencysType(state, payload) {
  state.firstCurrency.type = payload
}
export function changeFirstCurrencysValue(state, payload) {
  state.firstCurrency.value = payload
}
export function changeSecondCurrencysType(state, payload) {
  state.secondCurrency.type = payload
}
export function changeSecondCurrencysValue(state, payload) {
  state.secondCurrency.value = payload
}
export function changeDialogGraph(state, payload) {
  state.dialogGraph = payload;
}
export function addHistoryCurrency(state, {labels, values}) {
  state.currencyCurrencyHistory.labels = labels;
  state.currencyCurrencyHistory.values = values;
}