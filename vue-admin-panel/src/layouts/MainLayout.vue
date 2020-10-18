<template>
  <q-layout view="hHh LpR fFf">
    <Header></Header>
    <q-drawer
        v-model="drawer"
        show-if-above
        :mini="getShowLeftMenu"
        :width="250"
        :breakpoint="500"
        bordered
        content-class="bg-grey-3"
      >
        <q-scroll-area class="fit">
          <q-list padding>
            <q-item clickable v-ripple v-for="link in essentialLinks" :key="link.link" :to="link.link">
              <q-item-section avatar>
                <q-icon :name="link.icon" />
              </q-item-section>

              <q-item-section>
                {{link.title}}
              </q-item-section>
            </q-item>
          </q-list>
        </q-scroll-area>
      </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from "components/EssentialLink.vue";
import Header from "components/Header.vue";
import { mapMutations, mapGetters } from "vuex";
const linksData = [
  {
    title: "Главная",
    icon: "analytics",
    link: "/"
  },
  {
    title: "Валюта",
    icon: "attach_money",
    link: "/currency"
  },
  {
    title: "Файловый менеджер",
    icon: "insert_drive_file",
    link: "/filemanager"
  },
  {
    title: "Forum",
    caption: "forum.quasar.dev",
    icon: "record_voice_over",
    link: "https://forum.quasar.dev"
  },
  {
    title: "Twitter",
    caption: "@quasarframework",
    icon: "rss_feed",
    link: "https://twitter.quasar.dev"
  },
  {
    title: "Facebook",
    caption: "@QuasarFramework",
    icon: "public",
    link: "https://facebook.quasar.dev"
  },
  {
    title: "Quasar Awesome",
    caption: "Community Quasar projects",
    icon: "favorite",
    link: "https://awesome.quasar.dev"
  }
];

export default {
  name: "MainLayout",
  components: {  Header },
  data() {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData,
      drawer: false,
      miniState: false,
    };
  },
  computed: {
    ...mapGetters("menu", ["getShowLeftMenu"]),
  },
};
</script>
