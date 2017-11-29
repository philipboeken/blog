<template>
    <section>
        <b-field>
            <b-upload v-model="value"
                      multiple
                      drag-drop
                      @input="emitInput">
                <section class="section">
                    <div class="content has-text-centered">
                        <p>
                            <b-icon
                                    icon="upload"
                                    size="is-large">
                            </b-icon>
                        </p>
                        <p>Drop your files here or click to upload</p>
                    </div>
                </section>
            </b-upload>
        </b-field>

        <div class="tags">
            <span v-for="(file, index) in value"
                  :key="index"
                  class="tag">
                {{file.name}}
                <button class="delete is-small"
                        type="button"
                        @click="deleteDropFile(index)">
                </button>
            </span>
        </div>
    </section>
</template>

<script>
  export default {
    data() {
      return {
        value: []
      }
    },
    methods: {
      deleteDropFile(index) {
        this.value.splice(index, 1)
      },
      emitInput() {
        this.$emit('input', this.value)
      }
    }
  }
</script>
