<template>
<div>

    <div class="row">
        <div class="col-md-10">
            <h3>Cities</h3>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" @click="addCity()">Add City</button>
        </div>
        
    </div>

    <div class="row mb-3 mt-3">
        <city-dialog
            v-if="cityDialog"
            :city="oldCity"
            @cityEvent = "cityEvent()">
        </city-dialog>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="city in cities" :key="city.id">
                    <td>{{city.name}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editCity(city)">Edit</button>
                        <button type="button" class="btn btn-danger"  @click="deleteCity(city.id)">Delete</button>
                        </td>     
                    </tr>
                </tbody>
            </table>
            </div>
    </div>


    
</div>
</template>
<script>
import http from "../services/endPoints.js"
import CityDialog from "../dialogs/CityDialog.vue";
    export default {
        data() {
            return {
                cities: [],
                current: 1,
                pageSize: null, 
                cityDialog: false,
                oldCity: null,
            }
        },

        components:{
            CityDialog
        },

        created() {
            this.getCities();
        },

        methods: {
            getCities(page=1) {
                http.getCities(page)
                .then(response => {
                    this.cities = response.data.data;
                    this.pageSize = response.data.data.last_page;
                })
                .catch(e => {
                    console.log(e);
                });
            },

            addCity(){
                this.cityDialog = true;
            },

            editCity(city){
                this.oldCity = city;
                this.cityDialog = true;
            },

            cityEvent(){
                this.getCities();
                this.oldCity = null;
                this.cityDialog = false;

            },

            deleteCity(id) {
                let data = {
                    id: id,
                };
                http.deleteCity(data)
                .then(response => {
                    this.getCities();
                })
                .catch(e => {
                    console.log(e);
                });
            },
        }
    }
</script>
<style lang="scss" scoped>
    .btn-primary{
        float:right;
    }
</style>
