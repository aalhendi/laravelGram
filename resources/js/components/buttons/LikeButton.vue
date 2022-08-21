<template>
    <div class="container">
        <button
            @click="toggleLike()"
            :class="buttonClass"
            v-text="buttonText"
        />
    </div>
</template>

<script>
export default {
    name: "LikeButton",
    props: ["userId", "postId", "isLiked"],
    methods: {
        async toggleLike() {
            try {
                console.log(this.userId);
                // res = await axios.post(`/like/`);
                // console.log(res.data);
                // if (res.data) {
                //     this.status = !this.status;
                // }
            } catch (error) {
                console.error(error);
            }
        }
    },
    data: function() {
        return {
            status: this.isLiked
        };
    },
    computed: {
        buttonText() {
            return this.status ? "Unlike" : "Like";
        },
        buttonClass() {
            return this.status ? "btn btn-danger" : "btn btn-primary";
        }
    }
};
</script>
