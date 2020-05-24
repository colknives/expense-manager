<template>
    <aside class="main-sidebar">
        <div>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <template v-if="admin == 1">
                    <li><a href="/users">Users</a></li>
                    <li><a href="/roles">Roles</a></li>
                    <li><a href="/expense_categories">Expense Category</a></li>
                </template>
                <li><a href="/expenses">Expense</a></li>
            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "left-navigation",
        props: ["admin"],
        created() {
            console.log(this.admin);
        }
    }
</script>
