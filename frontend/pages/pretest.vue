<template>
  <v-app>
    <exam :cards="option" :title="title"></exam>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      title: 'Pretest',
      option: [
        {
          title: '1. When a thread blocks on I/O, what state does it enter?',
          radio: [
            {
              label: ' When a thread blocks on I/O, what state does it enter1',
              value: ' When a thread blocks on I/O, what state does it enter?'
            },
            {
              label: ' When a thread blocks on I/O, what state does it enter1',
              value: ' When a thread blocks on I/O, what state does it enter?'
            }
          ]
        }
      ]
    }
  }
}
</script>
