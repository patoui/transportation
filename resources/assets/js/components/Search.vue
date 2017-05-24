<template>
    <div class="container">
        <section class="section">
            <form v-on:submit.prevent="onSearch">
                <div class="field has-addons">
                    <p class="control is-expanded">
                        <input name="search" class="input" type="text" placeholder="Search" v-model.trim="search.search" @keyup="onSearch($event.target.value)">
                    </p>
                </div>
            </form>
        </section>
        <section class="section">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Short Name</th>
                        <th class="is-hidden-touch">Long Name</th>
                        <th class="is-hidden-touch"><abbr title="Description">Desc</abbr></th>
                        <th class="is-hidden-touch">Type</th>
                        <th class="is-hidden-touch">Url</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Short Name</th>
                        <th class="is-hidden-touch">Long Name</th>
                        <th class="is-hidden-touch"><abbr title="Description">Desc</abbr></th>
                        <th class="is-hidden-touch">Type</th>
                        <th class="is-hidden-touch">Url</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="route in search.routes">
                        <th v-text="route.route_id"></th>
                        <td v-text="route.route_short_name"></td>
                        <td class="is-hidden-touch" v-text="route.route_long_name"></td>
                        <td class="is-hidden-touch" v-text="route.route_desc"></td>
                        <td class="is-hidden-touch" v-text="route.route_type"></td>
                        <td class="is-hidden-touch"><a v-bind:href="route.route_url">link</a></td>
                    </tr>
                </tbody>
            </table>
            <p class="has-text-right">
                <a href="https://www.algolia.com/" style="color:black;">
                    <span>powered by&nbsp;</span><img src="/img/Algolia_logo_bg-white.svg" alt="Search provided by Algolia" style="max-height: 18px; vertical-align: middle;">
                </a>
            </p>
        </section>
    </div>
</template>

<script>
class Search {
    constructor(routes, search, errors) {
        this.routes = routes;
        this.search = search;
        this.errors = errors;
    }

    perform(query) {
        return new Promise((resolve, reject) => {
            axios.get(
                    'api/route/search',
                    {
                        params: {
                            q: query
                        }
                    }
                )
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(response => {
                    this.onError(response.data);
                    reject(response.data);
                });
        });
    }

    onSuccess(data) {
        this.routes = data;
    }

    onError(errors) {
        this.errors = errors;
    }
}
export default {
    data() {
        return {
            search: new Search(
                [], // routes
                '', // search
                {} // errors
            )
        }
    },
    created() {
        this.search.perform('');
    },
    methods: {
        onSearch(query) {
            this.search.perform(query);
        }
    }
}
</script>
