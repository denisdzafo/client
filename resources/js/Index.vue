<template>
  <div id="app" class="app">
    <div>
    <top-nav></top-nav>

    <div class="main container">
        <div class="container-fluid">
            <router-view />
        </div>
      
   
    </div >
    <footer >
        <custom-footer class="footer"></custom-footer>
    </footer>
       
    </div>
  </div>
</template>
<script>
    import LeftNav from './components/LeftNav.vue';
    import TopNav from './components/TopNav.vue';
    import CustomFooter from './components/CustomFooter'
    

    export default {
        name: 'App',
        data() {
            return {

            }
        },

        mounted() {

        },

        methods: {

        },

        components: {
            LeftNav,
            TopNav,
            CustomFooter
        },
    }
</script>

<style lang="scss">
@import'~bootstrap/dist/css/bootstrap.css';

.app{
    overflow-x: hidden;
    display:flex; 
    flex-direction:column;
    height: 100%;
}
.main{
    margin-top:150px;
}

.footer{
        padding: 45px 0;
        background: #222;
        width: 100%;
        margin-top: 150px;
     }


</style>
