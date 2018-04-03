<template>
    <div>
        <a class="button is-centered" @click="active=true">
            <span>Create a new File</span>
            <b-icon icon="plus"></b-icon>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Create a new File</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <drag-and-drop v-model="files"></drag-and-drop>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-success" @click="send">Save changes</a>
                    <a class="button" @click="active=false">Cancel</a>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    components: {},
    data() {
      return {
        active: false,
        files: function () {
          return [];
        }
      }
    },
    props: {},
    methods: {
      send() {
        axios.post('/files/create', {
          first_name: this.first_name
        })
          .then(
            location.reload()
          );
      }
    }
  }
</script>