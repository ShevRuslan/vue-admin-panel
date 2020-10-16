<template>
  <q-page class="q-pa-lg ">
    <div class="q-mb-md">
      <div class="text-h4">Файловый менеджер</div>
    </div>
    <div
      class="full-width row inline no-wrap justify-between items-stretch content-stretch"
    >
      <q-card class="flex q-pa-md full-width justify-between">
        <div class="header-items">
          <q-btn
            color="primary"
            class="q-mr-lg"
            icon="create_new_folder"
            label="Создать папку"
            outline
          />
          <q-btn color="primary" class="q-mr-lg" icon="add" label="Создать файл" outline />
          <q-btn color="primary" class="q-mr-lg" icon="analytics" outline >
            <q-tooltip>
              Статистика файлового менеджера
            </q-tooltip>
          </q-btn>
        </div>
        <div class="header-items">
          <q-btn-dropdown icon="drag_indicator" color="primary" label="Отображение" no-caps outline>
            <q-list>
              <q-item clickable v-close-popup >
                <q-item-section avatar class="q-pr-none">
                    <q-icon name="list" color="primary" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>Списком</q-item-label>
                </q-item-section>
              </q-item>

              <q-item clickable v-close-popup >
                <q-item-section avatar class="q-pr-none">
                    <q-icon name="table_chart" color="primary" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>Таблицей</q-item-label>
                </q-item-section>
              </q-item>

              <q-item clickable v-close-popup >
                <q-item-section avatar class="q-pr-none">
                    <q-icon name="view_agenda" color="primary" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>Карточками</q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </div>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { date } from "quasar";
import API from "../services/api";
export default {
  name: "Currency",
  data: function() {
    return {
      loading: true,
      currentDate: null
    };
  }
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
