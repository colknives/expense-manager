<template>
    <div class="col-12">
        <category-modal v-if="showModal"
                    title="Add Category"
                    :create="create"
                    :csrf="csrf"
                    @close="showModal = false"></category-modal>
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary" @click="showModal = true" >Add Category</button>
        </div>
    </div>
</template>

<script>
import CategoryModal from "./CategoryModal";

export default {
    name: "add-category",
    props: ['csrf'],
    components: {
        'category-modal': CategoryModal
    },
    data: function(){
        return {
            showModal: false,
            create: true
        };
    }
}
</script>
