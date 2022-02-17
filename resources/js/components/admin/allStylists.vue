<template>
    <div class="container">
        <div class="table-responsive">
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
                <td>{{ Stylist.image }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" type="button" v-if="Stylist.approved ==0" @click="verifyStylist(Stylist.id)">Verify</button>
                        <button class="btn btn-danger" @click="deleteStylist(Stylist.id)"><i class="fas fa-trash-alt"></i></button>
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
                Stylists: [],
                 multipleSelect:false,
                sty:[]
            }
        },
        created() {
        this.fetchAll();
        },
        methods: {
            fetchAll() {
                   this.axios
                .get('http://localhost:8000/api/stylist/')
                .then(response => {
                    this.Stylists = response.data;
                });
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
                    .then(()=>{this.fetchAll();});
            },
            selectAll(){
                if(this.multipleSelect==true){
                    this.sty=[]
                    for(var i = 0; i < this.Stylists.length;i++){
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
