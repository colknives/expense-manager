<template>
    <div class="col-12">
        <template v-if="admin == 0">
            <a href="#" @click="showModal = true">{{ value }}</a>
            <role-modal v-if="showModal"
                        title="Update Role"
                        :create="create"
                        :name="name"
                        :description="description"
                        :csrf="csrf"
                        :uuid="uuid"
                        @close="showModal = false"></role-modal>
        </template>
        <template v-if="admin == 1">
            <span>{{ value }}</span>
        </template>
    </div>
</template>

<script>
    import RoleModal from "./RoleModal";

    export default {
        name: "update-role",
        props: ["csrf", "value", "name", "description", "uuid", "admin"],
        components: {
            'role-modal': RoleModal
        },
        data: function(){
            return {
                showModal: false,
                create: false
            };
        }
    }
</script>
