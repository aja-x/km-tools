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
      loc: '/role',
      title: 'Login in your account',
      width: '9.4cm',
      namebutton: 'Login',
      form: [
        {
          label: 'Enter Your Email',
          name: 'email',
          model: 'email'
        },
        {
          label: 'Enter Your Password',
          name: 'password',
          model: 'password'
        }
      ]
    }
  }
}
</script>
