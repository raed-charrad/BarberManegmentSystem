<template>
<div class="container mt-5">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fas fa-cube text-danger icon-lg" style='font-size:48px'></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Total Cuts</p>
                                            <div class="fluid-container">
                                                <h3 class="font-weight-medium text-right mb-0">{{commition.length}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><i aria-hidden="true" class="fas fa-exclamation-triangle mr-1"></i>you did {{commition.length}}Cut</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fas fa-file-alt text-warning  icon-lg" style='font-size:48px'></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Total Orders</p>
                                            <div class="fluid-container">
                                                <h3 class="font-weight-medium text-right mb-0">{{orders.length}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><i aria-hidden="true" class="fas fa-exclamation-triangle mr-1"></i> you all have {{orders.length}} orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fas fa-chalkboard-teacher text-info icon-lg" style='font-size:48px'></i>
                                        </div>
                                        <div class="float-right">
                                            <p class="mb-0 text-right">Total Clients</p>
                                            <div class="fluid-container">
                                                <h3 class="font-weight-medium text-right mb-0">{{users.length}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-3 mb-0"><i aria-hidden="true" class="fas fa-exclamation-triangle mr-1"></i>{{users.length}} in your DataBase </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 stretch-card grid-margin" style="color:white !important">
                            <div class="card card-img-holder " style="background:linear-gradient(90deg,#ffbf96,#fe7096)!important">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3" style="color:white !important">Weekly Order <i class="far fa-bookmark mr-24px float-right" style='font-size:24px'></i></h4>
                                    <h2 class="mb-5"  style="color:white !important">{{orders.length}} person</h2>
                                    <h6 class="card-text">Decreased by 60%</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 stretch-card grid-margin" style="color:white !important">
                            <div class="card card-img-holder " style="background:linear-gradient(90deg,#90caf9,#047edf 99%)!important">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3" style="color:white !important">Weekly Cuts <i class="fas fa-chart-line mr-24px float-right" style='font-size:24px'></i></h4>
                                    <h2 class="mb-5"  style="color:white !important">{{commition.length}} Cuts</h2>
                                    <h6 class="card-text">Decreased by 60%</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 stretch-card grid-margin" style="color:white !important">
                            <div class="card card-img-holder " style="background:linear-gradient(90deg,#84d9d2,#07cdae)!important">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3" style="color:white !important">Weekly Sign <i class="fas fa-user-alt mr-24px float-right" style='font-size:24px'></i></h4>
                                    <h2 class="mb-5"  style="color:white !important">{{users.length}} person</h2>
                                    <h6 class="card-text">Decreased by 60%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</template>

<script>
    export default {
         data() {
            return {
                commition: [],
                users:[],
                orders:[]
            }
        },
         created() {
            this.axios
            .post(`http://localhost:8000/api/stylist/dashboard`)
            .then((res)=>{
                this.users = res.data.users;
                this.orders = res.data.orders;
                this.commition = res.data.commition;
            })
        },
    }
</script>
