<template>
    <div class="columns">
        <aside class="column is-3 left-container">
            <posts-filter :filter="filter"></posts-filter>
        </aside>
        <div class="column is-main-content">
            <div class="box add-button">
                <a class="is-centered" href="/posts/create">
                    <div class="columns is-centered">
                        <div class="column is-narrow">
                            <div class="button is-white">
                                <span>Voeg een bericht toe</span>
                                <b-icon icon="plus"></b-icon>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box" v-for="post in posts" :key="post.id">
                <a :href="'/posts/' + post.id" class="has-text-textcolor">
                    <h2 class="subtitle">
                        {{ post.title }}
                    </h2>
                    <div class="media-content">
                        <hr class="postcard-hr">
                        <div class="content is-ellipsis-4">
                            <vue-markdown>{{ post.body }}</vue-markdown>
                        </div>
                        <div>
                            <strong>
                                {{ post.user.first_name }} | {{ post.created_at_formatted }}
                                <b-tag v-for="label in post.labels" :key="label.id" :style="{ 'background-color': label.color }">
                                    {{ label.title }}
                                </b-tag>
                            </strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
import PostsFilter from './PostsFilter';
import VueMarkdown from 'vue-markdown';

export default {
    components: {
        'posts-filter': PostsFilter,
        'vue-markdown': VueMarkdown
    },
    props: {
        posts: {
            type: Object,
            default() {
                return {};
            }
        },
        filter: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    methods: {
        compileMarkdown(input) {
            return marked(input, { sanitize: true });
        }
    }
}
</script>
