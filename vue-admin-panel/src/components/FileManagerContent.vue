<template>
  <div
      class="full-width row inline no-wrap justify-between items-stretch content-stretch wrapper-filemanager-content"
    >
      <div class="wrapper-dirs">
        <FileManagerDirs/>
      </div>
      <div class="wrapper-content">
        
      </div>
    </div>
</template>

<script>
import FileManagerDirs from './FileManagerDirs';
export default {
  name: 'FileManagerContent',
  components:{FileManagerDirs},
}
</script>

<style lang="scss">
.wrapper-filemanager-content {
  .wrapper-dirs {
    width: 20%;
  }
  .wrapper-content {
    width: 80%;
  }
}
</style>