<template>
  <sidebar-menu
        :collapsed="false"
        :width="'220px'"
         @toggle-collapse='width'
        :menu='[
            {
            title: "Dashboard",
            href: "/dashboard",
            icon: "	fas fa-tachometer-alt"

            },
            {
            title: "Profile",
            icon: "fa fa-user",
            href: "/editProfile",
            },
            {
            title: "Appointments",
            icon: "fa fa-list",
            href: "/appointment",
            },
            {
            title: "Commition",
            icon: "fa fa-list",
            href: "/commisionStylist",
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
