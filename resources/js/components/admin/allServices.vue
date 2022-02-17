<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Products List</h2>
        <div class="row">
           <div class="col_md-12 mt-1">
               <button type="button" class="btn btn-danger" @click="deletteRecords">Delete</button>
           </div>
       </div>
        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th>
                    <input type="checkbox" v-model="multipleSelect" @change="selectAll">
                </th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="service in services" :key="service.id">
                <td>
                    <input type="checkbox" v-model="serv" @change="selectSingle" :value="service.id">
                </td>
                <td>{{ service.title }}</td>
                <td><img :src =" '../../../storage'+service.image" width="120px"></td>
                <td>{{ service.price }}</td>
                <td>{{ service.description }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: service.id }}" class="btn btn-success"><i class="fas fa-edit"></i></router-link>
                        <button class="btn btn-danger" @click="deleteService(service.id)" ><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                services: [],
                multipleSelect:false,
                serv:[]

            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/service/')
                .then(response => {
                    this.services = response.data;
                });
        },
        methods: {
            deleteService(id) {
                if(window.confirm("do you confirm that you want to delete")){

                this.axios
                    .delete(`http://localhost:8000/api/service/${id}`)
                    .then(response => {
                        let i = this.services.map(data => data.id).indexOf(id);
                        this.services.splice(i, 1)
                    });
                }
            },
            selectAll(){
                if(this.multipleSelect==true){
                    this.serv=[]
                    for(var i = 0; i < this.services.length;i++){
                        this.serv.push(this.services[i].id)
                    }
                }
                else{
                    this.serv=[]
                }
            },
            selectSingle(){
                if(this.services.length==this.serv.length){
                    this.multipleSelect=true;
                }
                else{
                    this.multipleSelect=false;
                }
            },
            deletteRecords(){
                if(this.serv.length!==0){
                    if(window.confirm("Are you sure you want to delete")){
                        for(var i=0;i<this.serv.length;i++){
                           this.deleteService(this.serv[i]);
                        }
                    }
                }
            }
        }
    }
</script>
