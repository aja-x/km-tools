<template>
  <v-card class="mx-auto" width="50cm">
    <v-toolbar color="#448CCB" dark>
      <v-toolbar-title>Create</v-toolbar-title>

      <v-spacer></v-spacer>
    </v-toolbar>

    <v-container fluid>
      <v-row dense>
        <v-col v-for="card in cards" :key="card.title" :cols="card.flex">
          <v-card :to="card.to">
            <v-img
              :src="card.src"
              class="white--text"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            >
            </v-img>
            <v-card-title v-text="card.title"></v-card-title>
            <v-card-text v-text="card.text"></v-card-text>
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
    cards: [
      {
        title: 'Article',
        src: '/paper.svg',
        text: 'Share Your Knowledge',
        to: '/',
        flex: 2
      },
      {
        title: 'Ticketing',
        src: '/paper.svg',
        text: 'Report Error',
        flex: 2
      },
      {
        title: 'Troubleshoot',
        src: '/paper.svg',
        text: 'Help Solve Problem',
        flex: 2
      }
    ]
  })
}
</script>
