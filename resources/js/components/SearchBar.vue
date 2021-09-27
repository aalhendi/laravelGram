<template>
    <div class="container">
        <form @submit="handleSubmit" action="/search" method="GET">
            <input
                v-model="search"
                type="text"
                placeholder="Search"
                name="q"
                class="form-control form-control-md border-end-0 border rounded-pill rounded-end"
            />
        </form>
    </div>
</template>

<script>
export default {
    name: "SearchBar",
    methods: {
        handleSubmit(e) {
            if (this.search === "") {
                e.preventDefault();
                return;
            }
        }
    },
    data: function() {
        return {
            search: ""
        };
    }
};
</script>
