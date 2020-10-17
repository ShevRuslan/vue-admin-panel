<template>
  <q-card class="flex q-pa-md full-width justify-between">
    <div class="header-items">
      <q-btn
        color="primary"
        class="q-mr-lg"
        icon="create_new_folder"
        label="Создать папку"
        outline
        @click="openDialogCreateDir"
      />
      <q-btn
        color="primary"
        class="q-mr-lg"
        icon="add"
        label="Создать файл"
        outline
      />
      <q-btn color="primary" class="q-mr-lg" icon="analytics" outline>
        <q-tooltip>
          Статистика файлового менеджера
        </q-tooltip>
      </q-btn>
    </div>
    <div class="header-items">
      <q-btn-dropdown
        icon="drag_indicator"
        color="primary"
        label="Отображение"
        no-caps
        outline
      >
        <q-list>
          <q-item clickable v-close-popup>
            <q-item-section avatar class="q-pr-none">
              <q-icon name="list" color="primary" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Списком</q-item-label>
            </q-item-section>
          </q-item>

          <q-item clickable v-close-popup>
            <q-item-section avatar class="q-pr-none">
              <q-icon name="table_chart" color="primary" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Таблицей</q-item-label>
            </q-item-section>
          </q-item>

          <q-item clickable v-close-popup>
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
    <q-dialog v-model="inception">
      <q-card>
        <q-card-section>
          <div class="text-h6">Inception</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis
          laudantium minus earum totam modi laborum illo, corporis fuga saepe
          animi aliquam ea enim assumenda ut nulla natus aperiam quis. Iste.
        </q-card-section>

        <q-card-actions align="right" class="text-primary">
          <q-btn
            flat
            label="Open another dialog"
            @click="secondDialog = true"
          />
          <q-btn flat label="Close" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>

    <q-dialog
      v-model="modelCreateDir"
    >
      <q-card class="text-black" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Persistent</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          <q-input outlined v-model="nameDir" label="Название папки" />
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-btn flat label="Создать" v-close-popup @click="createDir" />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-card>
</template>

<script>
import Api from '../services/api';
export default {
  name: "FileManagerHeader",
  data() {
    return {
      modelCreateDir: false,
      nameDir: '',
    };
  },
  methods: {
    openDialogCreateDir() {
      this.modelCreateDir = !this.modelCreateDir;
    },
    createDir() {
      Api.createDir({name: this.nameDir});
    }
  }
};
</script>

<style></style>
