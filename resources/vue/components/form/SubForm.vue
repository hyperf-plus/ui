<template>
  <div class="sub-group">
    <template v-for="(formData, index) in $attrs.value">
      <el-row :span="24" class="sub-list">
        <el-col :span="attrs.leftWidth" class="el-form--inline">
            <el-row :span="24">
              <template v-for="(item, index) in attrs.formItems">
                <el-form-item
                    :prop="item.prop"
                    :label="item.label"
                    :label-width="item.labelWidth"
                    :required="item.required"
                    :rules="item.rules"
                    :error="item.error"
                    :show-message="item.showMessage"
                    :inline-message="item.inlineMessage"
                    :size="item.size"
                >
                  <template>
                    <span slot="label" v-if="!item.hideLabel">{{ item.label }}</span>
                    <el-col :span="item.inputWidth">
                      <template v-if="item.relationName">
                        <ItemDisplay
                            v-model="
                          formData[item.relationName][item.relationValueKey]"
                            :formItem="item"
                            :formItems="item"
                            :formData="formData"
                        />
                      </template>
                      <template v-else>
                        <ItemDisplay
                            v-model="formData[item.prop]"
                            :formItem="item"
                            :formData="formData"
                        />
                      </template>
                      <div
                          v-if="item.help"
                          class="form-item-help"
                          v-html="item.help"
                      ></div>
                    </el-col>
                  </template>
                </el-form-item>
              </template>
            </el-row>
        </el-col>
        <el-col :span="attrs.rightWidth">
          <i class="el-icon-delete" @click="DeleteForm(index)"></i>
        </el-col>
      </el-row>
    </template>

    <component
        v-if="attrs.footerComponent"
        :is="attrs.footerComponent.componentName"
        :attrs="attrs.footerComponent"
    />
  </div>
</template>
<script>
import {BaseComponent} from "@/mixins.js";
import ItemDisplay from "./ItemDisplay";
import ItemIf from "./ItemIf";

export default {
  components: {
    ItemDisplay,
    ItemIf,
  },
  mixins: [BaseComponent],
  props: {
    attrs: {
      value: []
    },
    //当前组件属性
    formItem: Object,
    formItems: Object,
    //当前表单数据
    formData: Object,
  },
  methods: {
    DeleteForm(index) {
      if (this.$attrs.value.length <= this.attrs.min) {
        this.$message.error("子表单个数最少不能少于" + this.attrs.min + "个");
        return
      }
      this.$attrs.value.splice(index, 1)
    },
  },
  created() {
    //监听事件
    if (this.attrs.subFormEmit) {
      this.$bus.on(this.attrs.subFormEmit, (param) => {
        if (this.$attrs.value.length >= this.attrs.max) {
          this.$message.error("子表单个数最多不能超过" + this.attrs.max + "个");
          return
        }
        let value = window._.cloneDeep(this.$attrs.value);
        if (value === null) {
          value = []
        }
        value.push(window._.cloneDeep(param));
        this.$emit("change", value);
      });
    }
  }, destroyed() {
    //取消监听
    try {
      if (this.attrs.subFormEmit) {
        this.$bus.off(this.attrs.subFormEmit);
      }
    } catch (e) {
    }
  }
};
</script>
<style scoped>
.el-form-item__content {

}

.sub-group {
  width: 100%;
}

.sub-list {
  border-radius: 10px;
  border: .5px solid #efefef;
  padding: 20px 10px 10px 10px;
  margin-bottom: 10px;
}

/deep/ .el-form-item__content {

}

.form-item {
  padding: 5px;
}

</style>