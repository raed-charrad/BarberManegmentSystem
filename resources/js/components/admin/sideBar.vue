<template>
  <sidebar-menu
        :collapsed="false"
        class="mr-4"
        :width="'220px'"
         @toggle-collapse='width'
        :menu='[
                {
                title: "Dashboard",
                href: "/dashboard",
                icon: "	fas fa-tachometer-alt"
                },
                {
                title: "User",
                icon: "fa fa-user",
                href: "/allUsers",

                },
                {
                title: "Stylists",
                icon: "fa fa-user",
                href: "/allStylists",
                },
                {
                title: "Servises",
                icon: "fa fa-list",
                child: [
                    {
                    href: "/servises",
                    title: "All Services",
                    },
                    {
                    href: "/create",
                    title: "Add Service",
                    },
                ],
                },
                {
                title: "Appointments",
                icon: "fa fa-list",
                href: "/appointmentAdmin",
                },
            ]'
        :show-one-child="true"
    ></sidebar-menu>
</template>

<script>
export default {
    props:{

    },
    methods: {
        width(){
            let page = document.querySelectorAll('.vsm_expanded');
            if(page.length == 0){
                document.querySelector('#content').classList.add('content');
                document.querySelector('#content').classList.remove('closed');
            }
            else{
                document.querySelector('#content').classList.remove('content');
                document.querySelector('#content').classList.add('closed');
            }
        }
    }
}
</script>

<style>

</style>
