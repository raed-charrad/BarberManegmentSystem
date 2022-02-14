<template>
    <div class="container">
        <h3 class="text-center">Edit Servises</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateService" enctype="multipart/form-data">
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
                service: {},
                avatar:''
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
                let formData = new FormData();
                formData.append('image', this.avatar.name);
                formData.append('avatar', this.avatar);
                 _.each(this.service, (value, key) => {
                     formData.append(key, value)
                    });
                    for (var key of formData.entries()) {
                        console.log(key[0] + ', ' + key[1]);
                    }
                this.axios
                    .post('http://localhost:8000/api/service/'+this.$route.params.id,formData,{
                        headers: {
                            'Content-Type': "multipart/form-data;"
                        }
                    })
                    .then((res) => {
                        this.$router.push({ name: 'services' });
                    });
            },
            handeFileObject(){
                this.avatar = this.$refs.file.files[0];
                this.service.image = this.avatar.name;
            }
        }
    }
</script>
