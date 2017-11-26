<template>
    <div>
        <a class="button is-centered" @click="active=true">
            Create a new File
            <i class="fa fa-plus"></i>
        </a>

        <div class="modal" :class="{'is-active': active}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Create a new File</p>
                    <a class="delete" @click="active=false"></a>
                </header>
                <section class="modal-card-body">
                    <div class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume" @change="processFile($event)">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fa fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                            <span class="file-name">

                            </span>
                        </label>
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
  export default {
    components: {},
    data() {
      return {
        active: false,
        file: function () {
          return {};
        }
      }
    },
    props: {},
    methods: {
      processFile(event) {
        console.log(event.target.files[0]);
        this.file = event.target.files
      },
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