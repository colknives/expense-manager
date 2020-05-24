<template>
    <div class="col-12">
        <user-modal v-if="showModal"
                    title="Add User"
                    :create="create"
                    :csrf="csrf"
                    :roles="rolelist"
                    @close="showModal = false"></user-modal>
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary" @click="showModal = true" >Add User</button>
        </div>
    </div>
</template>

<script>
import UserModal from "./UserModal";

export default {
    name: "add-role",
    props: ['csrf', 'roles'],
    components: {
        'user-modal': UserModal
    },
    created() {
        this.rolelist = JSON.parse(this.roles);
    },
    data: function(){
        return {
            showModal: false,
            create: true,
            rolelist: []
        };
    }
}
</script>
