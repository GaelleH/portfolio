/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            sidebar: {
                height: 0,
                windowHeight: 0,
                windowScrollTop: 0,
            }
        }
    },
    computed: {
        sidebarStyles() {
            if (this.sidebar.height <= this.sidebar.windowHeight) {
                return { 'fixed-top': true }
            }
        }
    },
    created() {
        window.addEventListener('resize', this.handleResize)
        window.addEventListener('scroll', this.handleScroll)
    },
    mounted() {
        this.calculateSidebar()
    },
    methods: {
        handleResize: _.throttle(function () {
            this.calculateSidebar()
        }, 100),
        handleScroll: _.throttle(function () {
            this.sidebar.windowScrollTop = window.pageYOffset || document.documentElement.scrollTop
        }, 100),
        calculateSidebar() {
            this.sidebar.height = this.$refs.sidebarContent.offsetHeight
            this.sidebar.windowHeight = window.innerHeight
        }
    }
});
