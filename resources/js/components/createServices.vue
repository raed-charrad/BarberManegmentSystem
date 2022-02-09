<template>
    <div class="container">
            <h3 class="text-center">Create Service</h3>
            <div class="row">
                <div class="col-md-6">
                    <form @submit.prevent="addService">
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
                        <button type="submit" class="btn btn-primary">Create</button>
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
        methods: {
            addService() {
                this.axios
                    .post('http://localhost:8000/api/service', this.service)
                    .then(response => (
                        this.$router.push({ name: 'services' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>