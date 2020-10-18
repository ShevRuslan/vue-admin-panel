<template>
  <q-header elevated>
    <q-toolbar>
      <q-btn flat dense round icon="menu" aria-label="Menu" @click="change" />

      <q-toolbar-title>
        Admin Dashboard
      </q-toolbar-title>

      <div>{{ this.currentTime }} | {{ this.currentDate }}</div>
    </q-toolbar>
  </q-header>
</template>

<script>
import { date } from "quasar";
import { mapMutations, mapGetters } from "vuex";
export default {
  name: "Header",
  data: function() {
    return {
      currentTime: null,
      currentDate: null
    };
  },
  created() {
    let timeStamp = Date.now();
    this.currentDate = date.formatDate(timeStamp, "YYYY.MM.DD");
    this.currentTime = date.formatDate(timeStamp, "HH:mm");
    setInterval(() => {
      let timeStampNew = Date.now();
      this.currentTime = date.formatDate(timeStampNew, "HH:mm");
    }, 1000);
  },
  computed: {
    ...mapGetters("menu", ["getShowLeftMenu"])
  },
  methods: {
    ...mapMutations("menu", ["changeShowLeftMenu"]),
    change() {
      this.changeShowLeftMenu(!this.getShowLeftMenu);
    }
  }
};
</script>

<style></style>
