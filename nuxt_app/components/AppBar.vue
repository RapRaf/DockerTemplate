<template>
    <div>
        <v-app-bar color="primary" :elevation="2">
            <v-app-bar-nav-icon v-on:click="sidebar = !sidebar"></v-app-bar-nav-icon>
            <v-app-bar-title>{{ name }}</v-app-bar-title>
        </v-app-bar>
        <v-navigation-drawer color="primary" v-model="sidebar" temporary>
            <v-img class="margin20" alt="Logo avatar" src="@/assets/logo.webp"></v-img>
            <v-divider class="margin10"></v-divider>
            <v-list density="compact" nav>
                <v-list-item v-for="item in sidebar_items" :key="item.title"
                    :prepend-icon=item.icon :title=item.title></v-list-item>
            </v-list>
            <v-list-item prepend-icon='mdi-exit-to-app' title='Log out'></v-list-item>
        </v-navigation-drawer>
    </div>
</template>
<script>
import store from '@/store/index';
export default {
    name: "AppBar",
    data() {
        return {
            sidebar: false,
            sidebar_items: [
                { title: "Prodotti", icon: "mdi-shopping", index: 1 },
                { title: "Eventi", icon: "mdi-calendar", index: 2 },
                { title: "Offerte", icon: "mdi-tag", index: 3 },
            ]
        }
    },
    computed: {
        name(){
            return store.getters.name;
        }
    },
    methods: {
        logOut() {
            //logOut();
        },
        changeIndex(index) {
            this.sidebar = false;
            this.$store.dispatch('setIndex', index);
        }
    },
}
</script>
<style></style>