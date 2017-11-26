<template>
    <div>
        <a class="button is-centered" @click="active=true">
            Create a new Label
            <i class="fa fa-plus"></i>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Create a new Label</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input" type="text" v-model="title">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control">
                            <chrome-picker v-model="colors"></chrome-picker>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="send()">Save changes</a>
                    <a class="button" @click="active=false">Cancel</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
  import {Chrome} from 'vue-color'

  export default {
    components: {
      'chrome-picker': Chrome
    },
    data() {
      return {
        active: false,
        title: '',
        colors: function () {
          return {};
        }
      }
    },
    props: {},
    methods: {
      send() {
        axios.post('/labels/create', {title: this.title, color: this.colors.hex})
          .then(
            location.reload()
          );
      }
    }
  }
</script>