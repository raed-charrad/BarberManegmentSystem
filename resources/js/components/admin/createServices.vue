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
                            <label>Image:</label>
                            <input type="file" ref="file" id="customFile" @change="handeFileObject()" name="avatar" class="form-control">
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
                service: {},
                avatar:""
            }
        },
        methods: {
            addService() {
                let formData = new FormData();
                formData.append('image', this.avatar.name);
                formData.append('avatar', this.avatar)
                 _.each(this.service, (value, key) => {
                    formData.append(key, value)
                    })
                this.axios
                    .post('http://localhost:8000/api/service', formData,{
                        headers: {
                            'Content-Type': "multipart/form-data; boundary=" + Math.random().toString().substr(2)
                        }
                    }
                    )
                    .then(response => (
                        this.$router.push({ name: 'services' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },
            handeFileObject(){
                this.avatar = this.$refs.file.files[0];
                this.service.image = this.avatar.name;
            }
        }
    }
</script>
