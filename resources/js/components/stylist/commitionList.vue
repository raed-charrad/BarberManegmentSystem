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
                appointments: []
            }
        },
        created() {
          this.fetchAll();
        },
        computed: {
        orderedAppointments: function () {
            return _.orderBy(this.appointments, 'appointmentDate')
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
            }

        }
    }
</script>
