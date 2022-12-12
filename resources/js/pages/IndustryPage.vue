<template>
    <div>    
        <div class="row">
            <div class="col-md-10">
                <h3>Industries</h3>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" @click="addIndustry()">Add Industry</button>
            </div>
            
        </div>
    
        <div class="row mb-3 mt-3">
            <industry-dialog
                v-if="industryDialog"
                :industry="oldIndustry"
                @industryEvent = "industryEvent()">
            </industry-dialog>
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
                    <tr v-for="industry in industries" :key="industry.id">
                    <td>{{industry.name}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editIndustry(industry)">Edit</button>
                        <button type="button" class="btn btn-danger"  @click="deleteIndustry(industry.id)">Delete</button>
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
    import IndustryDialog from "../dialogs/IndustryDialog.vue";
        export default {
            data() {
                return {
                    industries: [],
                    current: 1,
                    pageSize: null,  
                    industryDialog: false,
                    oldIndustry: null,
                }
            },
    
            components:{
                IndustryDialog
            },
    
            created() {
                this.getIndustries();
            },
    
            methods: {
                getIndustries(page=1) {
                    http.getIndustries(page)
                    .then(response => {
                        this.industries = response.data.data;
                        this.pageSize = response.data.data.last_page;
                    })
                    .catch(e => {
                        console.log(e);
                    });
                },
    
                addIndustry(){
                    this.industryDialog = true;
                },
    
                editIndustry(industry){
                    this.oldIndustry = industry;
                    this.industryDialog = true;
                },
    
                industryEvent(){
                    this.getIndustries();
                    this.oldIndustry = null;
                    this.industryDialog = false;    
                },
    
                deleteIndustry(id) {
                    let data = {
                        id: id,
                    };
                    http.deleteIndustry(data)
                    .then(response => {
                        this.getIndustries();
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
    