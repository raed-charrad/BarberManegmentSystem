<template>
    <div class="container">

        <div class="table-responsive mt-3">
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
                appointments: []
            }
        },
        created() {
            this.getResults();
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
            getResults(page_url='/api/commisionStylist/') {
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
                    current_page_url: 'http://localhost:8000/api/commisionStylist/?page=' + meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: meta.next_page_url,
                    prev_page_url: meta.prev_page_url
                };
            },

        }
    }
</script>
