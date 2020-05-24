<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        {{ title }}
                    </div>
                    <form method="POST" :action="action" id="category_form">
                        <input type="hidden" name="_token" :value="csrf" />
                        <input type="hidden" name="uuid" :value="uuid" />
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="category" class="col-form-label">Category</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="category_uuid">
                                        <template v-for="category in categories">
                                            <template v-if="category.uuid === category_uuid">
                                                <option :value="category.uuid" selected>{{ category.name }}</option>
                                            </template>
                                            <template v-if="category.uuid !== category_uuid">
                                                <option :value="category.uuid">{{ category.name }}</option>
                                            </template>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Amount</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="amount" :value="amount" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="entry_date" class="col-form-label">Entry Date</label>
                                <div class="col-md-12">
                                    <datepicker :value="entry_date" name="entry_date" format="yyyy-MM-dd"></datepicker>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-12 text-right">
                            <div class="col-12 ">
                                <button type="button" class="btn btn-secondary" @click="$emit('close')">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-secondary" v-if="!create" @click="deleteExpense()">
                                    Delete
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ create? 'Save' : 'Update' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="expenses/delete" id="delete_expense_form">
                        <input type="hidden" name="_token" :value="csrf" />
                        <input type="hidden" name="uuid" :value="uuid" />
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        name: "expense-modal",
        components: { Datepicker },
        props: ["title", "category_uuid", "amount", "entry_date", "categories", "create", "csrf", "uuid"],
        data: function(){
            return {
                'action' : ''
            }
        },
        created() {
            console.log(this.categories);
            this.action = this.create? 'expenses/save' : 'expenses/update';
        },
        methods: {
            deleteExpense: function(){
                document.getElementById("delete_expense_form").submit();
            }
        }
    }
</script>
