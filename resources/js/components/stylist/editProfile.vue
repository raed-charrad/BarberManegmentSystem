<template>
    <div class="container mt-3 mb-3" style="background:white">
        <h3 class="text-center">Edit Profile</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateService" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="user.phone">
                    </div>
                    <div class="form-group">
                            <label>Image:</label>
                            <input type="file" ref="file" id="customFile" @change="handeFileObject()" name="avatar" class="form-control">
                        </div>
                     <div class="form-group">
                        <label>Adress</label>
                        <input type="text" class="form-control" v-model="user.adress">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-6">
                <img :src ="'../../../assets/images/edit.jpg'" alt="" width="100%">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                avatar:''
            }
        },
        created() {
            this.axios
                .post(`http://localhost:8000/api/stylist/show`)
                .then((res) => {
                    this.user = res.data;
            });
        },
        methods: {
            updateService() {
                let formData = new FormData();
                formData.append('image', this.avatar.name);
                formData.append('avatar', this.avatar);
                 _.each(this.user, (value, key) => {
                     formData.append(key, value)
                    });
                    for (var key of formData.entries()) {
                        console.log(key[0] + ', ' + key[1]);
                    }
                this.axios
                    .post('http://localhost:8000/api/stylist/update',formData,{
                        headers: {
                            'Content-Type': "multipart/form-data;"
                        }
                    })
                    .then((res) => {
                        this.$router.push({ name: 'user' });
                    });
            },
            handeFileObject(){
                this.avatar = this.$refs.file.files[0];
                this.user.image = this.avatar.name;
            }
        }
    }
</script>
