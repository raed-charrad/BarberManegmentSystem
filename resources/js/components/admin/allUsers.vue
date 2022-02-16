<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Users List</h2>
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
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.cin }}</td>
                <td>{{ user.adress }}</td>
                <td>{{ user.image }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
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
                users: []
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
                this.axios
                    .delete(`http://localhost:8000/api/user/${id}`)
                    .then(response => {
                        let i = this.users.map(data => data.id).indexOf(id);
                        this.users.splice(i, 1)
                    });
            }
        }
    }
</script>