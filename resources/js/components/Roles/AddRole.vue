<template>
    <div class="col-12">
        <role-modal v-if="showModal"
                    title="Add Role"
                    :create="create"
                    :csrf="csrf"
                    @close="showModal = false"></role-modal>
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary" @click="showModal = true" >Add Role</button>
        </div>
    </div>
</template>

<script>
import RoleModal from "./RoleModal";

export default {
    name: "add-role",
    props: ['csrf'],
    components: {
        'role-modal': RoleModal
    },
    data: function(){
        return {
            showModal: false,
            create: true
        };
    }
}
</script>
