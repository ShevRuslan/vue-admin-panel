<template>
  <q-card>
    <q-card-section>
      <q-tree
        :nodes="simple"
        node-key="label"
        no-connectors
      />
    </q-card-section>
  </q-card>
</template>

<script>
import Api from '../services/api';
export default {
  name: "FileManagerDirs",
  data() {
    return {
      simple: []
    };
  },
  async created() {
    const response = await Api.getAllDirs();
    const dirs = response.dirs;
    dirs.forEach(dir => {
      const object = {label:dir.name, icon: 'school'};
      this.simple.push(object);
    })
  }
};
</script>

<style></style>
