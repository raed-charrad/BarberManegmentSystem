<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Stylist List</h2>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
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
                <td>{{ Stylist.name }}</td>
                <td>{{ Stylist.email }}</td>
                <td>{{ Stylist.phone }}</td>
                <td>{{ Stylist.cin }}</td>
                <td>{{ Stylist.adress }}</td>
                <td>{{ Stylist.image }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" type="button" v-if="Stylist.approved ==0" @click="verifyStylist(Stylist.id)">Verify</button>
                        <button class="btn btn-danger" @click="deleteStylist(Stylist.id)">Delete</button>
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
                Stylists: []
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
                this.axios
                    .delete(`http://localhost:8000/api/stylist/${id}`)
                    .then(response => {
                        let i = this.Stylists.map(data => data.id).indexOf(id);
                        this.Stylists.splice(i, 1)
                    });
            },
            verifyStylist(id) {
                 this.axios
                    .put(`http://localhost:8000/api/stylist/verify/`+id)
                    .then(()=>{this.fetchAll();});
            }
        }
    }
</script>
