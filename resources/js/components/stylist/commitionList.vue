<template>
    <div class="container">

        <div class="table-responsive">
        <h2 class="text-center">Appointments List</h2>

        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th>Client Name</th>
                <th>Service </th>
                <th>Date</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="appointment in orderedAppointments" :key="appointment.id">
                <td>{{ appointment.ClientName }}</td>
                <td>{{ appointment.title}}</td>
                <td>{{ appointment.appointmentDate}}</td>
                <td>{{ appointment.price}}</td>
            </tr>
            <tr>
                <th>total</th>
                <td>{{ total }} Dt</td>

            </tr>
            </tbody>
                <pagination :data="appointments" @pagination-change-page="getResults" class="mt-5"></pagination>

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
          this.fetchAll();
        },
        computed: {
        orderedAppointments: function () {
            return _.orderBy(this.appointments.data, 'appointmentDate')
        },
        total () {
            return this.orderedAppointments.reduce( (acc, appointment) => {
            return acc + appointment.price
            }, 0)
        }

        },
        methods: {
            fetchAll() {
             this.axios
                .get('http://localhost:8000/api/commisionStylist/')
                .then(response => {
                    this.appointments = response.data;
                });
            },
            getResults(page = 1) {
                axios.get('http://localhost:8000/api/commisionStylist/?page=' + page)
                    .then(response => {
                        this.appointments = response.data;
                    });
            }

        }
    }
</script>
