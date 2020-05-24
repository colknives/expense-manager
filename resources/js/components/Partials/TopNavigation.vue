<template>
    <nav class="main-header">
        <ul>
            <li><a href="#" @click="logoutUser">Logout</a></li>
            <li>Welcome {{ name }}</li>
        </ul>

        <form method="POST" action="/logout" id="logout_form">
            <input type="hidden" name="_token" :value="csrf" />
        </form>
    </nav>
</template>

<script>
    export default {
        name: "top-navigation",
        props: ['csrf', 'name'],
        methods: {
            logoutUser: function(){
                document.getElementById("logout_form").submit();
            }
        }
    }
</script>
