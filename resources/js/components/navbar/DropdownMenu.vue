<template>
    <li class="nav-item dropdown">
        <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            v-text="this.username"
        />
        <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="navbarDropdown"
        >
            <a class="dropdown-item" :href="`/profile/${this.userId}`">
                Profile
            </a>

            <a class="dropdown-item border-top" @click="handleLogout">
                Logout
            </a>
        </div>
    </li>
</template>

<script>
export default {
    name: "DropdownMenu",
    props: ["username", "userId"],
    methods: {
        handleLogout() {
            axios.post("/logout");
            window.location.reload();
        }
    },
    data: {},
    computed: {}
};
</script>
