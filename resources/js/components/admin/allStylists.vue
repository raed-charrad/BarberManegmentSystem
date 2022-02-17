<template>
    <div class="container">
        <div class="table-responsive mt-3">
        <h2 class="text-center">Stylist List</h2>
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>CIN</th>
                <th>Adress</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Stylist in Stylists" :key="Stylist.id">
                <td>
                    <input type="checkbox" v-model="sty" @change="selectSingle" :value="Stylist.id">
                </td>
                <td>{{ Stylist.name }}</td>
                <td>{{ Stylist.email }}</td>
                <td>{{ Stylist.phone }}</td>
                <td>{{ Stylist.cin }}</td>
                <td>{{ Stylist.adress }}</td>
                <td><img :src =" '../../../storage'+Stylist.image" width="120px"></td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" type="button" v-if="Stylist.approved ==0" @click="verifyStylist(Stylist.id)">Verify</button>
                        <button class="btn btn-danger" @click="deleteStylist(Stylist.id)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
                 <nav class="row">
            <ul class="pagination w-auto mx-auto">
                <li :class="[{ disabled: !pagination.prev_page_url }]" class="page-item">
                    <a
                        @click="getResults(pagination.prev_page_url)"
                        class="btn page-link"
                    >Precedent</a>
                </li>
                <li class="page-item">
                    <a
                        class="page-link text-dark"
                        href="#"
                    >{{ pagination.current_page + "/" + pagination.last_page }}</a>
                </li>
                <li :class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                    <a
                        @click="getResults(pagination.next_page_url)"
                        class="btn page-link"
                    >Suivant</a>
                </li>
            </ul>
        </nav>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                Stylists: [],
                multipleSelect:false,
                sty:[],
                pagination: {},
            }
        },
        created() {
        this.getResults();
        },
        methods: {
            getResults(page_url='/api/stylist/') {
                let vm = this;
                axios.get(page_url)
                    .then(res=>res.data)
                    .then(res => {
                        this.Stylists = res.data;
                        vm.makePagination(res);
                    });
            },
            makePagination(meta) {
                this.pagination = {
                    current_page: meta.current_page,
                    current_page_url: 'http://localhost:8000/api/stylist/?page=' + meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: meta.next_page_url,
                    prev_page_url: meta.prev_page_url
                };
            },
            deleteStylist(id) {
                if(window.confirm("do you confirm that you want to delete")){
                    this.axios
                        .delete(`http://localhost:8000/api/stylist/${id}`)
                        .then(response => {
                            let i = this.Stylists.map(data => data.id).indexOf(id);
                            this.Stylists.splice(i, 1)
                        });
                }
            },
            verifyStylist(id) {
                 this.axios
                    .put(`http://localhost:8000/api/stylist/verify/`+id)
                    .then(()=>{this.getResults();});
            },
            selectAll(){
                if(this.multipleSelect==true){
                    this.sty=[]
                    for(let i = 0 ; i<this.Stylists.length ; i++){
                        this.sty.push(this.Stylists[i].id)
                    }
                }
                else{
                    this.sty=[]
                }
            },
            selectSingle(){
                if(this.Stylists.length==this.sty.length){
                    this.multipleSelect=true;
                }
                else{
                    this.multipleSelect=false;
                }
            },
            deletteRecords(){
                if(this.sty.length!==0){
                    if(window.confirm("Are you sure you want to delete")){
                        for(var i=0;i<this.sty.length;i++){
                           this.deleteStylist(this.sty[i]);
                        }
                    }
                }
            }
        }
    }
</script>
