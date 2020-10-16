<template>
  <q-card flat bordered class="flex column q-pb-xl currency-card">
    <template v-if="!loading">
      <q-card-section class="text-right text-caption">
        <q-avatar size="24px" rounded>
          <img :src="infoCurrency.img" />
        </q-avatar>
        {{ infoCurrency.CharCode }}
      </q-card-section>
      <q-card-section class="text-center">
        <div class="text-h2">{{ infoCurrency.Value }}&#x20bd;</div>
      </q-card-section>
    </template>
    <q-inner-loading :showing="loading">
      <q-spinner color="primary" size="3em" :thickness="2" />
    </q-inner-loading>
  </q-card>
</template>

<script>
name: "CurrencyCard";
export default {
  props: {
    infoCurrency: {
      type: Object
    },
    loading: {
      type: Boolean
    }
  }
};
</script>

<style lang="scss">
.currency-card {
  width: 32.5%;
}
</style>
