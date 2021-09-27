<template>
    <div class="container">
        <button
            @click="followUser()"
            :class="buttonClass"
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
                if (this.status) {
                    if (confirm("Do you really wish to unfollow?")) {
                        this.status = !this.status;
                    }
                } else {
                    this.status = !this.status;
                }
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
        },
        buttonClass() {
            return this.status ? "btn btn-danger" : "btn btn-primary";
        }
    }
};
</script>
