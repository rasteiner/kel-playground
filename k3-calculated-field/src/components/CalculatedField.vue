<template>
  <div class="calculated-field">
    <div>
      <b>Query:</b>
      <pre>{{query}}</pre>
    </div>

    <hr style="margin: 1rem 0">
    <div>
      <b>Result:</b>
      <pre>{{result}}</pre>
    </div>
  </div>
</template>

<script>

import { evalNode } from '../lib/eval'

export default {
  props: {
    query: String,
    ast: Object,
  },

  watch: {
    result (newResult) {
      this.$emit('input', newResult)
    },
  },

  mounted() {
    this.$emit('input', this.result)

  },

  computed: {
    result() {
      console.log('evaluating...')
      return evalNode(this.ast, {
        get: (key) => {
          return this.$store.getters['content/values']()[key]
        }
      })
    }
  }
}
</script>

<style>

</style>