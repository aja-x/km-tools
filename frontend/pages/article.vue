<template>
  <v-app>
    <baca-artikel :src="src" :title="title" :article="article"></baca-artikel>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      title: 'Javascript',
      src: '/javascript.jpg',
      article:
        'Regardless of what type of company you’re starting, you won’tget very far if you don’t have someone with expert coding skillson your team. Full stack developers are particularly helpful they are the Swiss army knives of engineers, and they take care of both the front and back end of your digital business needs.Regardless of what type of company you’re starting, you won’tget very far if you don’t have someone with expert coding skillson your team. Full stack developers are particularly helpful they’re the Swiss army knives of engineers, and they take care of both the front and back end of your digital business needs.'
    }
  }
}
</script>
