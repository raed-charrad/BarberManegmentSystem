<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Appointments List</h2>

        <table class="table table-striped table-hover">

            <thead>
            <tr>
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
                <td>{{ appointment.ClientName }}</td>
                <td>{{ appointment.StylistName }}</td>
                <td>{{ appointment.title}}</td>
                <td>{{ appointment.appointmentDate}}</td>
                <td>{{ appointment.created_at}}</td>
                <td>{{ appointment.remark}}</td>

                <td >
                    <div class="btn-group">
                        <button class="btn btn-danger" v-if="appointment.status ==0" disabled><i class="fas fa-xmark"></i></button>
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
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                appointments: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/appointments/')
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
                this.axios
                    .delete(`http://localhost:8000/api/appointments/${id}`)
                    .then(response => {
                        let i = this.appointments.map(data => data.id).indexOf(id);
                        this.appointments.splice(i, 1)
                    });
            }
        }
    }
</script>
