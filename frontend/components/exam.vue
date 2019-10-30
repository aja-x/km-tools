<template>
  <v-card class="mx-auto" width="400px">
    <v-toolbar color="#448CCB" dark>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>
    <v-container fluid>
      <v-row dense>
        <v-col v-for="i in cards" :key="i.title">
          <v-card>
            <v-card-title v-text="i.title"></v-card-title>
            <v-radio-group
              v-for="j in cards.radio"
              :key="j.label"
              v-model="radios"
            >
              <v-radio :label="j.label" :value="j.value"></v-radio>
            </v-radio-group>
            <v-card-actions>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>
<script>
export default {
  data: () => ({
    props: {
      title: {
        type: String,
        default: null
      },
      cards: {
        type: Object,
        default: null
      }
    }
  })
}
</script>
