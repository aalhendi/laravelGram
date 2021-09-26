<template>
    <div class="container">
        <button
            @click="followUser()"
            class="btn btn-primary"
            v-text="buttonText"
        />
    </div>
</template>

<script>
export default {
    name: "FollowButton",
    props: ["userId", "isFollowing"],
    methods: {
        async followUser() {
            try {
                await axios.post(`/follow/${this.userId}`);
                this.status = !this.status;
            } catch (error) {
                if (error.response.status === 401) {
                    window.location = "/login";
                } else {
                    console.error(error);
                }
            }
        }
    },
    data: function() {
        return {
            status: this.isFollowing
        };
    },
    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
