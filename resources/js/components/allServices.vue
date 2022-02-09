<template>
    <div class="container">
        <div class="table-responsive">
        <h2 class="text-center">Products List</h2>
 
        <table class="table table-striped table-hover">
            
            <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th> 
            </tr>
            </thead>
            <tbody>
            <tr v-for="service in services" :key="service.id">
                <td>{{ service.title }}</td>
                <td>{{ service.image }}</td>
                <td>{{ service.price }}</td>
                <td>{{ service.description }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: service.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteService(service.id)">Delete</button>
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
                services: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/service/')
                .then(response => {
                    this.services = response.data;
                });
        },
        methods: {
            deleteService(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/service/${id}`)
                    .then(response => {
                        let i = this.services.map(data => data.id).indexOf(id);
                        this.services.splice(i, 1)
                    });
            }
        }
    }
</script>