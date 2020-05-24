<template>
    <div class="col-12">
            <a href="#" @click="showModal = true">{{ value }}</a>
            <expense-modal v-if="showModal"
                        title="Update Expense"
                        :create="create"
                        :category_uuid="category_uuid"
                        :amount="amount"
                        :entry_date="entry_date"
                        :csrf="csrf"
                        :uuid="uuid"
                        :categories="categorylist"
                        @close="showModal = false"></expense-modal>
    </div>
</template>

<script>
    import ExpenseModal from "./ExpenseModal";

    export default {
        name: "update-expense",
        props: ["csrf", "value", "category_uuid", "amount", "entry_date", "uuid", "categories"],
        components: {
            'expense-modal': ExpenseModal
        },
        created() {
            this.categorylist = JSON.parse(this.categories);
        },
        data: function(){
            return {
                showModal: false,
                create: false,
                categorylist: []
            };
        }
    }
</script>
