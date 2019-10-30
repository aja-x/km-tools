<template>
  <v-app>
    <v-flex align-center>
      <v-card width="16cm" class="mx-auto">
        <v-card-title v-text="title"></v-card-title>
        <v-img :src="src" class="white--text align-end" height="300px"> </v-img>

        <v-card-text v-text="article"></v-card-text>
      </v-card>

      <v-card width="16cm" class="mx-auto" style="margin-top:20px">
        <v-card-actions>
          <v-btn icon>
            <v-icon>mdi-heart</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>mdi-bookmark</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>mdi-share-variant</v-icon>
          </v-btn>
          <v-spacer></v-spacer>
          <v-btn color="primary">Post Test</v-btn>
        </v-card-actions>
        <v-card-text>Comment 0</v-card-text>
        <v-card-text>
          <v-form
            ><v-text-field outlined filled height="1"></v-text-field
          ></v-form>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-app>
</template>
<script>
export default {
  props: {
    src: {
      type: String,
      default: null
    },
    title: {
      type: String,
      default: null
    },
    article: {
      type: String,
      default: null
    }
  }
}
</script>
