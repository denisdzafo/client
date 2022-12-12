<template>
    <div>
    
        <div class="row">
            <div class="col-md-10">
                <h3>Contact Types</h3>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" @click="addContactType()">Add Contact Type</button>
            </div>
            
        </div>
    
        <div class="row mb-3 mt-3">
            <contact-type-dialog
                v-if = "contactTypeDialog"
                :contactType = "oldContactType"
                @event = "contactTypeEvent()">
            </contact-type-dialog>
        </div>
    
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contactType in contactTypes" :key="contactType.id">
                        <td>{{contactType.name}}</td>
                        <td>
                            <button type="button" class="btn btn-success" @click="editContactType(contactType)">Edit</button>
                            <button type="button" class="btn btn-danger"  @click="deleteContactType(contactType.id)">Delete</button>
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
    import ContactTypeDialog from "../dialogs/ContactTypeDialog.vue";
        export default {
            data() {
                return {
                    contactTypes: [],
                    current: 1,
                    pageSize: null, 
                    contactTypeDialog: false,
                    oldContactType: null,
                }
            },
    
            components:{
                ContactTypeDialog
            },
    
            created() {
                this.getContactTypes();
            },
    
            methods: {
                getContactTypes(page=1) {
                    http.getContactTypes(page)
                    .then(response => {
                        this.contactTypes = response.data.data;
                        this.pageSize = response.data.data.last_page;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },
    
                addContactType(){
                    this.contactTypeDialog = true;
                },
    
                editContactType(contactType){
                    this.contactTypeDialog = false;
                    this.oldContactType = contactType;
                    this.contactTypeDialog = true;
                },
    
                contactTypeEvent(){
                    this.getContactTypes();
                    this.oldContactType = null;
                    this.contactTypeDialog = false;
    
                },
    
                deleteContactType(id) {
                    let data = {
                        id: id,
                    };
                    http.deleteContactType(data)
                    .then(response => {
                        this.getContactTypes();
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
    