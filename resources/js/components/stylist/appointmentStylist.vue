<template>
    <div class="container">
        <div class="table-responsive mt-3">
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
                        <button class="btn btn-danger" v-if="appointment.status ==0" @click="verify(appointment.id)"><i class="fas fa-eye-slash"></i></button>
                        <button class="btn btn-success" v-else @click="inVerify(appointment.id)"><i class="fas fa-check"></i></button>
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
                appointments: [],
                multipleSelect:false,
                appo:[],
                pagination: {},

            }
        },
        created() {
            this.getResults();
        },
        computed: {
        orderedAppointments: function () {
            return _.orderBy(this.appointments, 'appointmentDate')
        }
        },
        methods: {
            getResults(page_url='/api/appointmentsStylist/') {
            let vm = this;
            axios.get(page_url)
                .then(res=>res.data)
                .then(res => {
                    this.appointments = res.data;
                    vm.makePagination(res);
                });
            },
             makePagination(meta) {
                this.pagination = {
                    current_page: meta.current_page,
                    current_page_url: 'http://localhost:8000/api/appointmentsStylist/?page=' + meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: meta.next_page_url,
                    prev_page_url: meta.prev_page_url
                };
            },
            deleteAppointment(id) {
                if(window.confirm("do you confirm that you want to delete")){
                    this.axios
                        .delete(`http://localhost:8000/api/appointmentsStylist/${id}`)
                        .then(response => {
                            let i = this.appointments.map(data => data.id).indexOf(id);
                            this.appointments.splice(i, 1)
                        });
                }
            },
            verify(id) {
                 this.axios
                    .put(`http://localhost:8000/api/appointmentsStylist/verify/`+id)
                    .then(()=>{this.getResults();});
            },
            inVerify(id) {
                 this.axios
                    .put(`http://localhost:8000/api/appointmentsStylist/inVerify/`+id)
                    .then(()=>{this.getResults();});
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
