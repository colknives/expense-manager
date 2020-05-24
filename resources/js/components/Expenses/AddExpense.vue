<template>
    <div class="col-12">
        <expense-modal v-if="showModal"
                    title="Add Expense"
                    :create="create"
                    :csrf="csrf"
                    :categories="categorylist"
                    @close="showModal = false"></expense-modal>
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary" @click="showModal = true" >Add Expense</button>
        </div>
    </div>
</template>

<script>
import ExpenseModal from "./ExpenseModal";

export default {
    name: "add-expense",
    props: ['csrf', 'categories'],
    components: {
        'expense-modal': ExpenseModal
    },
    created() {
        this.categorylist = JSON.parse(this.categories);
    },
    data: function(){
        return {
            showModal: false,
            create: true,
            categorylist: []
        };
    }
}
</script>
