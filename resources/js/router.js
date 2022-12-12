import Vue from 'vue'
import VueRouter  from "vue-router";
import HomePage from './pages/HomePage';
import CityPage from './pages/CityPage';
import ContactTypePage from './pages/ContactTypePage';
import CountryPage from './pages/CountryPage';
import IndustryPage from './pages/IndustryPage';


Vue.use(VueRouter)
const routes = [
    {
        path: '/',
        name: 'HomePage',
        component: HomePage,
        meta: {
            auth: false
        }
    },

    {
        path: '/city',
        name: 'CityPage',
        component: CityPage,
        meta: {
            auth: false
        }
    },
    {
        path: '/country',
        name: 'CountryPage',
        component: CountryPage,
        meta: {
            auth: false
        }
    },

    {
        path: '/contact-type',
        name: 'ContactTypePage',
        component: ContactTypePage,
        props: true,
        meta: {
            auth: false
        }
    },

    {
        path: '/industry',
        name: 'IndustryPage',
        component: IndustryPage,
        props: true,
        meta: {
            auth: false
        }
    },


]


const router = new VueRouter({
    routes
})


export default router
