<template>
  <v-app>
    <app-bar v-if="index !== 0"></app-bar>
    <v-main>
      <div class="flex column center">
        <div>{{ name }}</div>
        <div class="flex row center v-margin10">
          <div class="h-margin20"> {{ counter }} </div>
          <v-icon size="45" v-on:click="incr" class="h-margin20">mdi-plus</v-icon>
        </div>
        <v-icon size="45" v-on:click="reset" class="h-margin20">mdi-minus-circle</v-icon>
      </div>
    </v-main>
  </v-app>
</template>
<script>
import AppBar from '@/components/AppBar.vue';
import "@/assets/css/base.css";
import axios from 'axios';
import store from '@/store/index'
export default {
  name: "App",
  data() {
    return {
      index: 1
    }
  },
  computed: {
    name() {
      return store.getters.name;
    },
    counter() {
      return store.getters.counter;
    }
  },
  methods: {
    request() {
      axios.get('/').then((response) => {
        console.log(response)
      })
    },
    incr(){
      store.dispatch('incrementCounter');
    },
    reset(){
      store.dispatch('clearCounter');
    }
  },
  mounted() {
    //this.request();
  }
}
</script>
<style>

</style>