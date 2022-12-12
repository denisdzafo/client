<template>
    <section class="content mb-5">
             <div class="container">
                <div class="row ">
                   <div class="col-6">
                      <div class="card card-default">
                          <div class="card-body">
                            <form >
                               <div class="form-group row mb-3">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">Name</label>
                                  <div class="col-md-6">
                                     <input id="title" type="text" class="form-control" v-model="name" required>
                                  </div>
                               </div>
                               
                               <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4" v-if="contactType">
                                     <button 
                                         type="submit"
                                         class="btn btn-success"
                                         @click = "editContactType()">
                                      Edit 
                                     </button>
                                  </div>
    
                                  <div class="col-md-6 offset-md-4" v-else>
                                     <button 
                                         type="submit"
                                         class="btn btn-primary"
                                         @click = "createContactType()">
                                      Create
                                     </button>
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
       export default {
        data() {
          return {
            name: null,
          }
        },
    
        props: ['contactType'],
    
        mounted() {
          if(this.contactType){
            this.name = this.contactType.name
          }
        },
        methods: {
          createContactType() {
              let data = {
                name: this.name,
              };
            http.createContactType(data)
              .then(response => {
                this.$emit('event');
              })
              .catch(e => {
                console.log(e);
              });
          },
    
          editContactType() {
            let data = {
                name: this.name,
                id: this.contactType.id,
    
              };
            http.editContactType(data)
              .then(response => {
                   this.$emit('event');
              })
              .catch(e => {
                console.log(e);
              });
          }
        }
      }
       </script>
       <style lang="scss" scoped>
       
       </style>
       