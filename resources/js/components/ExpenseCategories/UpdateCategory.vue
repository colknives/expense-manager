<template>
    <div class="col-12">
            <a href="#" @click="showModal = true">{{ value }}</a>
            <category-modal v-if="showModal"
                        title="Update Category"
                        :create="create"
                        :name="name"
                        :description="description"
                        :csrf="csrf"
                        :uuid="uuid"
                        @close="showModal = false"></category-modal>
    </div>
</template>

<script>
    import CategoryModal from "./CategoryModal";

    export default {
        name: "update-role",
        props: ["csrf", "value", "name", "description", "uuid"],
        components: {
            'category-modal': CategoryModal
        },
        data: function(){
            return {
                showModal: false,
                create: false
            };
        }
    }
</script>
