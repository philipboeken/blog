<template>
    <b-tag class="tag" :id="label.id" :style="{'background-color': label.color}" closable>
        {{ label.title }}
    </b-tag>
</template>

<script>
export default {
    props: {
        label: {
            type: Object,
            default() {
                return {};
            }
        }
    }
}
</script>

