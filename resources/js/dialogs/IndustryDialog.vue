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
                                  <div class="col-md-6 offset-md-4" v-if="industry">
                                     <button 
                                         type="submit"
                                         class="btn btn-success"
                                         @click = "editIndustry()">
                                      Edit
                                     </button>
                                  </div>
    
                                  <div class="col-md-6 offset-md-4" v-else>
                                     <button 
                                         type="submit"
                                         class="btn btn-primary"
                                         @click = "createIndustry()">
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
    
        props: ['industry'],
    
        mounted() {
          if(this.industry){
            this.name = this.industry.name
          }
        },
        methods: {
          createIndustry() {
              let data = {
                name: this.name,
              };
            http.createIndustry(data)
              .then(response => {
                this.$emit('industryEvent');
              })
              .catch(e => {
                console.log(e);
              });
          },
    
          editIndustry() {
            let data = {
                name: this.name,
                id: this.industry.id,    
              };
            http.editIndustry(data)
              .then(response => {
                   this.$emit('industryEvent');
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
       