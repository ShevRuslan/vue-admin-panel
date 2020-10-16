export function addCurrencys({ commit }, currencys) {
  commit('addCurrencys', currencys);
}
export function addMainCurrencys({ commit }, objectCurrencys) {
  commit('addMainCurrencys', objectCurrencys);
}
export function addHistoryCurrency({ commit }, objectCurrencys) {
  commit('addHistoryCurrency', objectCurrencys);
}
