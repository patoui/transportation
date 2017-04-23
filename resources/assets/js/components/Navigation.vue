<template>
    <div class="hero-head">
        <header class="nav">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item">
                        <span class="icon is-medium"><i class="fa fa-bus"></i></span>
                    </a>
                </div>
                <span class="nav-toggle" @click="toggleNav()">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <div class="nav-right nav-menu" :class="{ 'is-active': isActive }">
                    <a class="nav-item is-active">Home</a>
                    <a class="nav-item" href="/logout">Logout</a>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
    export default {

        data() {
            return { isActive: false };
        },

        methods: {
            toggleNav() {
                this.isActive = !this.isActive;
            }
        }
    }
</script>
