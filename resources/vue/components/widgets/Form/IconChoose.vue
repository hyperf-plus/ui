<template>
  <span>
    <el-popover
        ref="pop"
        v-model="pop"
        :placement="attrs.placement"
        width="330"
        trigger="click">
      <el-row type="flex" justify="end" class="cs-mb-10" v-if="attrs.clearable">
        <el-button type="danger" icon="el-icon-delete" size="mini" class="cs-fr" @click="selectIcon()">清空</el-button>
      </el-row>
      <el-input
          v-model="searchText"
          :clearable="true"
          style="margin: 10px; width: 90%;"
          placeholder="搜索 比如 'plus'"
          prefix-icon="el-icon-search">
      </el-input>
      <el-collapse v-if="!searchMode" class="group" v-model="collapseActive">
        <el-collapse-item v-for="(item, index) in icon.glyphs" :key="index" :title="item.name" :name="index"
                          class="class">
          <el-row class="class-row">
            <el-col class="class-col" v-for="(iconItem, iconIndex) in item.item" :key="iconIndex" :span="4"
                    @click.native="selectIcon(iconItem.font_class)">
              <i :class="'iconfont icon' + iconItem.font_class" :title="iconItem.name"/>
            </el-col>
          </el-row>
        </el-collapse-item>
      </el-collapse>
      <div v-if="searchMode" class="group">
        <div class="class" v-for="(item, index) in iconFilted" :key="index">
          <div class="class-title">{{ item.name }}</div>
          <el-row class="class-row">
            <el-col class="class-col" v-for="(iconItem, iconIndex) in item.item" :key="iconIndex" :span="4"
                    @click.native="selectIcon(iconItem.font_class)">
              <i :class="'iconfont icon' + iconItem.font_class" :title="iconItem.name"/>
            </el-col>
          </el-row>
        </div>
      </div>
    </el-popover>
      <el-input
          :style="attrs.style"
          :class="attrs.className"
          :placeholder="attrs.placeholder"
          :disabled="attrs.disabled"
          :readonly="!attrs.userInput"
          :value="value"
          @input="onChange"
      >
              <i v-if="value" slot="prefix" class="el-input__icon icon-view" :class="'iconfont icon' + value"/>
              <el-button icon="el-icon-menu" v-popover:pop slot="append"/>
      </el-input>

  </span>
</template>
<script>
import icon from './libs/iconfont.json'
import {FormItemComponent} from "@/mixins.js";

export default {
  mixins: [FormItemComponent],
  data() {
    return {
// 绑定弹出框
      pop: false,
// 所有图标
      icon,
// 搜索的文字
      searchText: '',
// 不是搜索的时候显示的折叠面板绑定的展开数据
      collapseActive: [0]
    }
  },
  computed: {
// 输入框上绑定的设置

// 是否在搜索
    searchMode() {
      return !!this.searchText
    },
// 过滤后的图标
    iconFilted() {
      return this.icon.glyphs.map(iconClass => ({
        name: iconClass.name,
        item: iconClass.item.filter(icon => icon.font_class.indexOf(this.searchText) >= 0)
      })).filter(iconClass => iconClass.item.length > 0)
    }
  },
  methods: {
    selectIcon(iconName = '') {
      this.$emit("change", iconName);
      if (iconName && this.attrs.autoClose) {
        this.pop = false
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.icon-view {
  font-size: 24px;
  line-height: 40px;
}

.group {
  max-height: 400px;
  overflow-x: hidden;
  overflow-y: scroll;
  border-top: none;
  border-bottom: none;

  .class {
    .class-title {
      line-height: 30px;
      text-align: center;
      background-color: #F8F8F9;
      border-radius: 4px;
      margin: 10px 0;
    }

    .class-row {
      .class-col {
        text-align: center;
        color: #909399;

        .iconfont {
          line-height: 40px;
          font-size: 24px;
        }

        &:hover {
          color: #303133;
          background-color: #F8F8F9;
          border-radius: 4px;
          box-shadow: inset 0 0 0 1px #DCDFE6;

          .iconfont {
            font-size: 38px;
          }
        }
      }
    }
  }
}
</style>