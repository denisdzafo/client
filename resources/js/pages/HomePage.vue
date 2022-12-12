<template>
    <div >

        <div >
            <div class="row">
            <div class="col-md-8">
                <h3>Clients</h3>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-info btn-colection" @click="refresh()">Refresh</button>
            </div>   
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-colection" @click="addClient()">Add Client</button>
            </div>            
        </div>
    
        <div class="row mb-3 mt-3">
            <client-dialog
                v-if="clientDialog"
                :client="oldClient"
                @event = "clientEvent()">
            </client-dialog>
        </div>

        <div v-if="loading">
            <vue-simple-spinner></vue-simple-spinner>
        </div>
        <div class="row" v-else>
            <div class="col-md-12">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Name
                            <i class="fa fa-sort" aria-hidden="true" @click="orderTable('clients', 'name')">
                            </i>
                        </th>
                        <th scope="col">Address 
                            <i class="fa fa-sort" aria-hidden="true" @click="orderTable('clients', 'address')">
                            </i>
                        </th>
                        <th scope="col">City
                            <i class="fa fa-sort" aria-hidden="true" @click="orderTable('cities', 'name')">
                            </i>
                        </th>
                        <th scope="col">Country
                            <i class="fa fa-sort" aria-hidden="true" @click="orderTable('countries', 'name')">
                            </i>
                        </th>

                        <th scope="col">Industry
                            <i class="fa fa-sort" aria-hidden="true" @click="orderTable('industries', 'name')">
                            </i>
                        </th>
                        <th scope="col">Contacts</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="client in clients" :key="client.id">
                         <td>{{client.name}}</td>
                        <td>{{client.address}}</td>
                        <td>{{client.cityName}}</td>
                        <td>{{client.countryName}}</td>             
                        <td>{{client.industryName}}</td>
                        <td>
                            <div v-for="contact in client.contacts" :key="contact.id">
                                {{contact.contact_type.name}}:  {{contact.info}}
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" @click="editClient(client)">Edit</button>
                            <button type="button" class="btn btn-danger"  @click="deleteClient(client.id)">Delete</button>
                            </td>     
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
        
    
        
    </div>
    </template>
    <script>
    import http from "../services/endPoints.js"
    import ClientDialog from "../dialogs/ClientDialog.vue";
    import VueSimpleSpinner from 'vue-simple-spinner'

        export default {
            data() {
                return {
                    clients: [],
                    current: 1,
                    pageSize: null, 
                    clientDialog: false,
                    oldClient: null,
                    loading:true,
                    table: 'clients',
                    orderBy: 'id'
                }
            },
    
            components:{
                ClientDialog,
                VueSimpleSpinner
            },
    
            created() {
                this.getClients();
            },
    
            methods: {
                getClients() {
                    this.loading = true;
                    let data ={
                        table: this.table, orderBy: this.orderBy
                    };

                    http.getClients(data)
                    .then(response => {
                        this.clients = response.data.data;
                        this.loading = false;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },
    
                addClient(){
                    this.clientDialog = true;
                },
    
                editClient(client){
                    this.oldClient = client;
                    this.clientDialog = true;
                },
    
                clientEvent(){
                    this.getClients();
                    this.oldClient = null;
                    this.clientDialog = false;
    
                },
    
                deleteClient(id) {
                    let data = {
                        id: id,
                    };
                    http.deleteClient(data)
                    .then(response => {
                        this.getClients();
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },

                orderTable(table, orderBy){
                    this.table = table;
                    this.orderBy = orderBy;
                    this.getClients();
                },

                refresh(){
                    this.table = 'clients';
                    this.orderBy = 'id';
                    this.getClients();
                }
            }
        }
    </script>
    <style lang="scss" scoped>
        .btn-colection{
            float:right;
        }
    </style>
    