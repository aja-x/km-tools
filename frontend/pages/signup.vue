<template>
  <v-app id="inspire">
    <form-login
      :title="title"
      :form="form"
      :width="width"
      :namebutton="namebutton"
      :loc="loc"
    ></form-login>
  </v-app>
</template>
<script>
export default {
  layout: 'empty',
  data() {
    return {
      loc: '/login',
      title: 'Create your account',
      width: '9.4cm',
      namebutton: 'Agree and Sign up',
      form: [
        {
          label: 'Email',
          name: 'email',
          model: 'email'
        },
        {
          label: 'Password',
          name: 'password',
          model: 'password'
        },
        {
          label: 'Firstname',
          name: 'firstname',
          model: 'firstname'
        },
        {
          label: 'Lastname',
          name: 'lasname',
          model: 'lastname'
        }
      ]
    }
  }
}
</script>
