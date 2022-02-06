@extends('layouts.app')
@section('content')
<div id="app">
<sidebar-menu
      :collapsed="false"
      :menu='[
        {
          header: true,
          title: "Main Navigation",
          hiddenOnCollapse: true,
        },
        {
          title: "User",
          icon: "fa fa-user",
          child: [
            {
              href: "/panel/group_user_list",
              title: "Group User",
            },
            {
              href: "/panel/user_list",
              title: "User List",
            },
          ],
        },
        {
          title: "Banner",
          icon: "fa fa-flag",
          href: "/panel/banner",
        },
        {
          title: "Subscriber",
          icon: "fa fa-envelope",
          href: "/panel/subscriber",
        },
        {
          title: "Recipe",
          icon: "fa fa-list",
          child: [
            {
              href: "/panel/recipe_community",
              title: "by Community",
            },
            {
              href: "/panel/recipe_tiarapot",
              title: "by Tiarapot",
            },
          ],
        },
        {
          title: "Pers",
          icon: "fa fa-headset",
          href: "/panel/pers",
        },
      ]'
      :show-one-child="true"
    ></sidebar-menu>
   <example-component></example-component>

</div>

@endsection