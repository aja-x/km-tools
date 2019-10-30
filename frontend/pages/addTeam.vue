<template>
  <v-app>
    <form-login
      :title="title"
      :form="form"
      :width="width"
      :namebutton="namebutton"
    ></form-login>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      title: 'Invite Your Member',
      width: '9cm',
      namebutton: 'Invite',
      form: [
        {
          label: 'Enter Email Address',
          name: 'email',
          model: 'email'
        },
        {
          label: 'Enter Email Address',
          name: 'email',
          model: 'email'
        },
        {
          label: 'Enter Email Address',
          name: 'Email',
          model: 'Email'
        }
      ]
    }
  }
}
</script>
