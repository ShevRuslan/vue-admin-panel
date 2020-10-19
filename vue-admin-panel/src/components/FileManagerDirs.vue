<template>
  <q-card class="full-height">
    <q-card-section class="full-height">
      <q-tree
        :nodes="getDirs"
        node-key="label"
        no-connectors
        class="dirs-tree"
      />
    </q-card-section>
  </q-card>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "FileManagerDirs",
  data() {
    return {
      simple: []
    };
  },
  computed: {
    ...mapGetters("filemanager", ["getDirs"])
  }
};
</script>

<style lang="scss" scoped>
.dirs-tree {
  overflow: auto;
  height: 100%;
}
.dirs-tree::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}
.dirs-tree::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
.dirs-tree::-webkit-scrollbar-thumb {
  background: $primary;
  border: 0px none #ffffff;
  border-radius: 5px;
}
.dirs-tree::-webkit-scrollbar-thumb:hover {
  background: $blue-5;
}
.dirs-tree::-webkit-scrollbar-thumb:active {
  background: $blue-5;
}
.dirs-tree::-webkit-scrollbar-track {
  background: #bebfbf;
  border: 0px none #ffffff;
  border-radius: 5px;
}
.dirs-tree::-webkit-scrollbar-track:hover {
  background: #bebfbf;
}
.dirs-tree::-webkit-scrollbar-track:active {
  background: #bebfbf;
}
.dirs-tree::-webkit-scrollbar-corner {
  background: transparent;
}
</style>
