<template>
    <div class="col-12">
        <template v-if="admin == 0">
            <a href="#" @click="showModal = true">{{ value }}</a>
            <user-modal v-if="showModal"
                        title="Update User"
                        :create="create"
                        :name="name"
                        :email="email"
                        :csrf="csrf"
                        :uuid="uuid"
                        :roles="rolelist"
                        :roleid="roleid"
                        @close="showModal = false"></user-modal>
        </template>
        <template v-if="admin == 1">
            <span>{{ value }}</span>
        </template>
    </div>
</template>

<script>
    import UserModal from "./UserModal";

    export default {
        name: "update-role",
        props: ["csrf", "value", "name", "email", "description", "uuid", "admin", "roles", "roleid"],
        components: {
            'user-modal': UserModal
        },
        created() {
            this.rolelist = JSON.parse(this.roles);
        },
        data: function(){
            return {
                showModal: false,
                create: false,
                rolelist: []
            };
        }
    }
</script>
