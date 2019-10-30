<template>
  <v-app>
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card
              class="elevation-12"
              style="border-style:solid;border-color:#448CCB"
            >
              <v-toolbar color="white black--text" dark flat>
                <v-toolbar-title>{{ title }}</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                <v-form v-for="i in form" :key="i.model" @submit="formSubmit">
                  <v-text-field
                    :v-model="i.model"
                    :label="i.label"
                    :name="i.name"
                    outlined
                    type="text"
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-row justify="center">
                  <v-btn color="primary" :width="width" :to="loc">{{
                    namebutton
                  }}</v-btn>
                </v-row>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>
<style scoped>
.label-class {
  display: flex;
  align-items: center;
}
</style>
<script>
/* eslint-disable */
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props:{
          loc:{
            type:String,
            default:null
          },
          namebutton:{
            type:String,
            default:null
          },
          width:{
            type:String,
            default:null
          },
          title:{
            type:String,
            default:null
          },
          form:{
           type:Object,
           default:null
          }
        },
        data() {
            return {
                email: '',
                password: '',
                output: ''
            };
        },
        
    }
</script>