<template>
    <section class="content mb-5">
        <div v-if="loading">
            <vue-simple-spinner></vue-simple-spinner>
        </div>
             <div class="container" v-else>
                <div class="row ">
                   <div class="col-6">
                      <div class="card card-default">
                          <div class="card-body">
                            <form >
                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">Name</label>
                                  <div class="col-md-6">
                                     <input id="title" type="text" class="form-control" v-model="name">
                                  </div>
                               </div>

                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">Address</label>
                                  <div class="col-md-6">
                                     <input id="title" type="text" class="form-control" v-model="address" required>
                                  </div>
                               </div>

                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">City</label>
                                  <div class="col-md-6">
                                    <select class="form-control form-select custom-select" placeholder="Select" v-model="cityId" required>
                                        <option v-for="city in cities" :value="city.id" :key="city.id">{{city.name}}</option>
                                    </select>
                                  </div>
                               </div>

                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">Country</label>
                                  <div class="col-md-6">
                                    <select class="form-control form-select custom-select" placeholder="Select"  v-model="countryId" required>
                                        <option v-for="country in countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                    </select>
                                  </div>
                               </div>

                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">Industry</label>
                                  <div class="col-md-6">
                                    <select class="form-select custom-select" placeholder="Select" v-model="industryId">
                                        <option v-for="industry in industries" :value="industry.id" :key="industry.id">{{industry.name}}</option>
                                    </select>
                                  </div>
                               </div>

                               <div class="form-group row mb-3">
    
                                <div v-for="(contact, index) in contacts" :key="index">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Contact</label>
                                    <div class="flex justify-start">
                                        <select class="custom-select" placeholder="Select" v-model="contacts[index].contact_type_id" required>
                                        <option v-for="contactType in contactTypes" :value="contactType.id" :key="contactType.id">{{contactType.name}}</option>
                                    </select>
                                    <input
                                    required
                                        v-model="contacts[index].info"
                                        placeholder="contact info"
                                        class="w-full py-2 border border-indigo-500 rounded"
                                    />
           
                                    <button
                                        type="button"
                                        class="btn btn-danger"
                                        @click="remove(index)"
                                        v-show="index != 0"
                                    >
                                        Remove
                                    </button>
                                </div>

                            </div>
                           </div>
                              
                            <div class="form-group row mb-0">
                                <div class="col-md-6 buttons-row">
                                <button
                                        type="button"
                                        class="btn btn-info mr-1"
                                        @click="addMore()">
                                        Add More
                                    </button>
                                  <div v-if="client">                          
                                     <button 
                                         type="submit"
                                         class="btn btn-success ml-2"
                                         @click = "editClient()">
                                      Edit 
                                     </button>
                                  </div>
    
                                  <div v-else>
                                     <button 
                                         type="submit"
                                         class="btn btn-primary ml-2"
                                         @click = "createClient()">
                                      Create
                                     </button>
                                  </div>
                               </div>
                            </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
       
       </template>
       <script>
       import http from "../services/endPoints.js"
       import VueSimpleSpinner from 'vue-simple-spinner'
       export default {
        data() {
          return {
            loading: false,
            name: null,
            address: null,
            cityId: null,
            countryId: null,
            industryId: null,
            industries: [],
            cities: [],
            countries: [],
            contactTypes: [],
             contacts: [{
                contact_type_id: "",
                    info: ""
                },],
          }
        },
    
        props: ['client'],

        components:{
                VueSimpleSpinner
            },

        created(){
            this.getCities();
            this.getCountries();
            this.getIndustries();
            this.getContactTypes();
        },
    
        mounted() {
          if(this.client){
            this.name = this.client.name;
            this.address = this.client.address;
            this.cityId = this.client.cityId;
            this.countryId = this.client.countryId;
            this.industryId = this.client.industryId;
            this.contacts = this.client.contacts
          }
        },
        methods: {
            getCities(page=1) {
                http.getCities(page)
                .then(response => {
                    this.cities = response.data.data;
                })
                .catch(e => {
                    console.log(e);
                });
            },

            getCountries(page=1) {
                    http.getCountries(page)
                    .then(response => {
                        this.countries = response.data.data;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },                
    
            getIndustries(page=1) {
                    http.getIndustries(page)
                    .then(response => {
                        this.industries = response.data.data;      
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },

            getContactTypes(page=1) {
                this.loading = true;
                    http.getContactTypes(page)
                    .then(response => {
                        this.contactTypes = response.data.data;
                        this.loading = false;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },

            createClient(){
    
                let data = {
                    name: this.name,
                    address: this.address,
                    cityId: this.cityId,
                    countryId: this.countryId,
                    industryId: this.industryId,
                    contacts: this.contacts,
                };
                http.createClient(data)
                .then(response => {
                    this.loading = false;
                    this.$emit('event');
                })
                .catch(e => {
                    console.log(e);
                });
            },

            editClient() {
                this.loading = true;
            let data = {
                name: this.name,
                    address: this.address,
                    cityId: this.cityId,
                    countryId: this.countryId,
                    industryId: this.industryId,
                    contacts: this.contacts,
                    id: this.client.id,    
              };
            http.editClient(data)
              .then(response => {
                this.loading = false;
                   this.$emit('event');
              })
              .catch(e => {
                console.log(e);
              });
          },

            addMore() {
            this.contacts.push({
                contact_type_id: "",
                info: "",
            });
            },
            remove(index) {
                this.contacts.splice(index, 1);
            },
            }
      }
    </script>
    <style lang="scss" scoped>
       .buttons-row{
        display:flex;
       }

       .ml-2{
        margin-left: 15px;
       }
    </style>
       