<template>
    <div class="container">
        <div class="table-responsive mt-3">
        <h2 class="text-center">Users List</h2>
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
            <tr v-for="user in users" :key="user.id">
                <td>
                    <input type="checkbox" v-model="use" @change="selectSingle" :value="user.id">
                </td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.cin }}</td>
                <td>{{ user.adress }}</td>
                <td>{{ user.image }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteUser(user.id)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <nav class="row">
            <ul class="pagination w-auto mx-auto">
                <li :class="[{ disabled: !pagination.prev_page_url }]" class="page-item">
                    <a @click="getResults(pagination.prev_page_url)" class="btn page-link">Precedent</a>
                </li>
                <li class="page-item">
                    <a class="page-link text-dark" href="#">{{ pagination.current_page + "/" + pagination.last_page }}</a>
                </li>
                <li :class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                    <a @click="getResults(pagination.next_page_url)" class="btn page-link">Suivant</a>
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
                users: [],
                multipleSelect:false,
                use:[],
                pagination: {},

            }
        },
        created() {
            this.getResults();
        },
        methods: {
            deleteUser(id) {
                if(window.confirm("do you confirm that you want to delete")){

                    this.axios
                        .delete(`http://localhost:8000/api/user/${id}`)
                        .then(response => {
                            let i = this.users.map(data => data.id).indexOf(id);
                            this.users.splice(i, 1)
                        });
                }
            },
            getResults(page_url='/api/user/') {
            let vm = this;
            axios.get(page_url)
                .then(res=>res.data)
                .then(res => {
                    this.users = res.data;
                    vm.makePagination(res);
                });
            },
             makePagination(meta) {
                this.pagination = {
                    current_page: meta.current_page,
                    current_page_url: 'http://localhost:8000/api/user/?page=' + meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: meta.next_page_url,
                    prev_page_url: meta.prev_page_url
                };
            },
            selectAll(){
                if(this.multipleSelect==true){
                    this.use=[]
                    for(var i = 0; i < this.users.length;i++){
                        // console.log(this.users[i].id)
                        this.use.push(this.users[i].id)
                    }
                }
                else{
                    this.use=[]
                }
            },
            selectSingle(){
                if(this.users.length==this.use.length){
                    this.multipleSelect=true;
                }
                else{
                    this.multipleSelect=false;
                }
            },
            deletteRecords(){
                if(this.use.length!==0){
                    if(window.confirm("Are you sure you want to delete")){
                        for(var i=0;i<this.use.length;i++){
                           this.deleteUser(this.use[i]);
                        }
                    }
                }
            }
        }
    }
</script>
