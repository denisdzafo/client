<template>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link link-scroll">Home

                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/city" class="nav-link link-scroll">City

                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/country" class="nav-link link-scroll">Country

                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/industry" class="nav-link link-scroll">Industry

                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/contact-type" class="nav-link link-scroll">Contact Type

                        </router-link>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

</template>
<script>

    export default {
        data() {
            return {

            }
        },
        mounted() {
            //
        },

        methods: {

        }
    }
</script>
<style lang="scss" scoped>
    .navbar {
        padding-top: 0;
        padding-bottom: 0;
        background: #fff;
        border-bottom: 1px solid #e6e6e6;
    }
    @media (max-width: 991.98px) {
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    }
    .navbar-brand {
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 700;
        font-family: "Roboto Slab", serif;
    }
    .nav-link {
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin: 0 5px;
        color: #777;
        padding-top: 30px;
        padding-bottom: 30px;
        border-top: 4px solid transparent;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        font-size: 0.875rem;
    }
    @media (max-width: 991.98px) {
        nav.navbar a.nav-link {
            padding-top: 0.7rem;
            padding-bottom: 0.7rem;
            border: none;
        }
    }
    .nav-link:hover {
        color: #333;
        border-top-color: #3490dc;
    }
    @media (max-width: 1199.98px) {
        .nav-link:hover {
            color: #4fbfa8;
        }
    }
</style>
