<template>
  <div :id="attrs.canvasId"></div>
</template>
<script>
import {Funnel} from "@antv/g2plot";
import {insertCss} from 'insert-css';

export default {
  props: {
    attrs: Object
  },
  data() {
    return {
      antv: null
    };
  },
  mounted() {
    if (this.attrs.class){
      insertCss(this.attrs.class);
    }
    this.antv = new Funnel(this.attrs.canvasId, {
      data: this.attrs.data,
      ...this.attrs.config
    });
    this.antv.render();
  },
  updated() {
    this.antv.changeData(this.attrs.data);
  },
  destroyed() {
    // this.antv.destory();
  }
};
</script>
