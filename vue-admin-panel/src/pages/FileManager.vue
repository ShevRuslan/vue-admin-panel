<template>
  <q-page class="q-pa-lg ">
    <div class="q-mb-md">
      <div class="text-h4">Файловый менеджер</div>
    </div>
    <div
      class="full-width row inline no-wrap justify-between items-stretch content-stretch q-mb-lg"
    >
      <FileManagerHeader />
    </div>
    <FileManagerContent />
  </q-page>
</template>

<script>
import { date } from "quasar";
import FileManagerHeader from "../components/FileManagerHeader";
import FileManagerContent from "../components/FileManagerContent";
export default {
  name: "Currency",
  data: function() {
    return {
      loading: true,
      currentDate: null
    };
  },
  components: { FileManagerHeader, FileManagerContent },
};
</script>

<style lang="scss">
.wrapper-currency {
  display: flex;
  justify-content: space-between;
  .currency-table {
    width: 66%;
  }
  .currency-converter {
    width: 32.5%;
  }
}
</style>
