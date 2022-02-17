<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Appointments List</h2>
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
                <th>Client Name</th>
                <th>Stylist Name</th>
                <th>Service </th>
                <th>Date</th>
                <th>Registration Date</th>
                <th>Remark</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="appointment in orderedAppointments" :key="appointment.id">
                <td>
                    <input type="checkbox" v-model="appo" @change="selectSingle" :value="appointment.id">
                </td>
                <td>{{ appointment.ClientName }}</td>
                <td>{{ appointment.StylistName }}</td>
                <td>{{ appointment.title}}</td>
                <td>{{ appointment.appointmentDate}}</td>
                <td>{{ appointment.created_at}}</td>
                <td>{{ appointment.remark}}</td>

                <td >
                    <div class="btn-group">
                        <button class="btn btn-danger" v-if="appointment.status ==0" disabled><i class="fas fa-eye-slash"></i></button>
                        <button class="btn btn-success" v-else disabled><i class="fas fa-check"></i></button>
                    </div>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteAppointment(appointment.id)" ><i class="fas fa-trash-alt"></i></button>
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
                appointments: [],
                multipleSelect:false,
                appo:[]
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/appointmentAdmin/')
                .then(response => {
                    this.appointments = response.data;
                });
        },
        computed: {
        orderedAppointments: function () {
            return _.orderBy(this.appointments, 'appointmentDate')
        }
        },
        methods: {
            deleteAppointment(id) {
                if(window.confirm("do you confirm that you want to delete")){

                this.axios
                    .delete(`http://localhost:8000/api/appointmentAdmin/${id}`)
                    .then(response => {
                        let i = this.appointments.map(data => data.id).indexOf(id);
                        this.appointments.splice(i, 1)
                    });}
            },
             selectAll(){
                if(this.multipleSelect==true){
                    this.appo=[]
                    for(var i = 0; i < this.appointments.length;i++){
                        this.appo.push(this.appointments[i].id)
                    }
                }
                else{
                    this.appo=[]
                }
            },
            selectSingle(){
                if(this.appointments.length==this.appo.length){
                    this.multipleSelect=true;
                }
                else{
                    this.multipleSelect=false;
                }
            },
            deletteRecords(){
                if(this.appo.length!==0){
                    if(window.confirm("Are you sure you want to delete")){
                        for(var i=0;i<this.appo.length;i++){
                           this.deleteAppointment(this.appo[i]);
                        }
                    }
                }
            }
        }
    }
</script>
