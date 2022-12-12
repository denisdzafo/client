<template>
    <div>    
        <div class="row">
            <div class="col-md-10">
                <h3>Countries</h3>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" @click="addCountry()">Add Country</button>
            </div>
            
        </div>
    
        <div class="row mb-3 mt-3">
            <country-dialog
                v-if="countryDialog"
                :country="oldCountry"
                @event = "countryEvent()">
            </country-dialog>
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
                        <tr v-for="country in countries" :key="country.id">
                        <td>{{country.name}}</td>
                        <td>
                            <button type="button" class="btn btn-success" @click="editCountry(country)">Edit</button>
                            <button type="button" class="btn btn-danger"  @click="deleteCountry(country.id)">Delete</button>
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
    import CountryDialog from "../dialogs/CountryDialog.vue";
        export default {
            data() {
                return {
                    countries: [],
                    current: 1,
                    pageSize: null, 
                    countryDialog: false,
                    oldCountry: null,
                }
            },
    
            components:{
                CountryDialog
            },
    
            created() {
                this.getCountries();
            },
    
            methods: {
                getCountries(page=1) {
                    http.getCountries(page)
                    .then(response => {
                        this.countries = response.data.data;
                        this.pageSize = response.data.data.last_page;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },
    
                addCountry(){
                    this.countryDialog = true;
                },
    
                editCountry(country){
                    this.countryDialog = false;
                    this.oldCountry = country;
                    this.countryDialog = true;
                },
    
                countryEvent(){
                    this.getCountries();
                    this.oldCountry = null;
                    this.countryDialog = false;
    
                },
    
                deleteCountry(id) {
                    let data = {
                        id: id,
                    };
                    http.deleteCountry(data)
                    .then(response => {
                        this.getCountries();
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
    