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
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" :value="name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" :value="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-12 text-right">
                            <div class="col-12 ">
                                <button type="button" class="btn btn-secondary" @click="$emit('close')">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-secondary" v-if="!create" @click="deleteCategory()">
                                    Delete
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ create? 'Save' : 'Update' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="expense_categories/delete" id="delete_category_form">
                        <input type="hidden" name="_token" :value="csrf" />
                        <input type="hidden" name="uuid" :value="uuid" />
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "category-modal",
        props: ["title", "name", "description", "create", "csrf", "uuid"],
        data: function(){
            return {
                'action' : ''
            }
        },
        created() {
            this.action = this.create? 'expense_categories/save' : 'expense_categories/update';
        },
        methods: {
            deleteCategory: function(){
                document.getElementById("delete_category_form").submit();
            }
        }
    }
</script>
