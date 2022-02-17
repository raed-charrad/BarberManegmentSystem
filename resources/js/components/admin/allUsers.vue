<template>
    <div class="container">
        <div class="table-responsive">
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
                users: [],
                multipleSelect:false,
                use:[]
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/user/')
                .then(response => {
                    this.users = response.data;
                });
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
