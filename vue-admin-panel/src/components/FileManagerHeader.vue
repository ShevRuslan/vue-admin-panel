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
    <q-dialog v-model="modelCreateDir">
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
import { mapGetters, mapMutations, mapActions } from "vuex";
import Api from "../services/api";
export default {
  name: "FileManagerHeader",
  data() {
    return {
      modelCreateDir: false,
      nameDir: ""
    };
  },
  async created() {
    this.getDirs();
  },
  methods: {
    ...mapActions("filemanager", ["changeDirs"]),
    openDialogCreateDir() {
      this.modelCreateDir = !this.modelCreateDir;
    },
    async createDir() {
      let response = null;
      try {
        response = await Api.createDir({ name: this.nameDir });
        this.$q.notify({
          type: "positive",
          message: `Папка ${this.nameDir} успешно создана!`,
        });
        this.getDirs();
      } catch (e) {
        console.log(e);
        this.$q.notify({
          type: "negative",
          message: e.response.data.error
        });
      }
      this.nameDir = "";
    },
    async getDirs() {
      const response = await Api.getAllDirs();
      const dirs = response.dirs;
      const arrayDirs = [];
      dirs.forEach(dir => {
        const object = { label: dir.name, icon: "folder_open" };
        arrayDirs.push(object);
      });
      this.changeDirs(arrayDirs);
    }
  }
};
</script>

<style></style>
