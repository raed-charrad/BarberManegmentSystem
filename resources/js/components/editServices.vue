<template>
    <div class="container">
        <h3 class="text-center">Edit Servises</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateService">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="service.title">
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="text" class="form-control" v-model="service.image">
                    </div>
                     <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" v-model="service.price">
                    </div>
                     <div class="form-group">
                        <label>description</label>
                        <input type="text" class="form-control" v-model="service.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                service: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/service/${this.$route.params.id}`)
                .then((res) => {
                    this.service = res.data;
                });
        },
        methods: {
            updateService() {
                this.axios
                    .put(`http://localhost:8000/api/service/${this.$route.params.id}`, this.service)
                    .then((res) => {
                        this.$router.push({ name: 'services' });
                    });
            }
        }
    }
</script>