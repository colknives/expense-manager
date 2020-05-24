<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        {{ title }}
                    </div>
                    <form method="POST" :action="action" id="role_form">
                        <input type="hidden" name="_token" :value="csrf" />
                        <input type="hidden" name="uuid" :value="uuid" />
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" :value="name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="email" :value="email" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label">Role</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="role_uuid">
                                        <template v-for="role in roles">
                                            <template v-if="role.uuid === roleid">
                                                <option :value="role.uuid" selected>{{ role.name }}</option>
                                            </template>
                                            <template v-if="role.uuid !== roleid">
                                                <option :value="role.uuid">{{ role.name }}</option>
                                            </template>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-12 text-right">
                            <div class="col-12 ">
                                <button type="button" class="btn btn-secondary" @click="$emit('close')">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-secondary" v-if="!create" @click="deleteUser()">
                                    Delete
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ create? 'Save' : 'Update' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="users/delete" id="delete_user_form">
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
        name: "user-modal",
        props: ["title", "name", "email", "role_uuid", "create", "csrf", "uuid", "roles", "roleid"],
        data: function(){
            return {
                'action' : ''
            }
        },
        created() {
            this.action = this.create? 'users/save' : 'users/update';
        },
        methods: {
            deleteUser: function(){
                this.action = 'users/delete';
                document.getElementById("delete_user_form").submit();
            }
        }
    }
</script>
