<template>
  <div>
    <div class="goods-sku-box">
      <div
          class="goods-attrs"
          v-for="(goods_attr, index) in GoodsAttrs"
          :key="index"
      >
        <div class="attr-title flex-c-sb">
          <div class="flex-c">
            <div>规格名称：</div>
            <el-select
                v-model="GoodsAttrs[index]"
                value-key="id"
                :filterable="true"
                no-data-text="暂无规格，请先创建"
                no-match-text="暂无匹配规格，请创建"
                clearable
                @clear="clearGoodsAttr(index)"
                @change="
                                value => {
                                    goodsAttrChange(value, index);
                                }
                            "
            >
              <el-option
                  v-for="attr in attrs.goodsAttrs"
                  :key="attr.id"
                  :value="attr"
                  :label="attr.name"
                  :disabled="
                                    attr.id | getGoodsAttrDisabled(GoodsAttrs)
                                "
              ></el-option>
            </el-select>
          </div>
          <div>
            <el-popover
                placement="top"
                width="250"
                trigger="click"
                v-if="GoodsAttrs[index].id"
            >
              <el-input
                  v-model="addNewGoodsAttrValueName"
                  placeholder="输入名称"
                  @keyup.enter.native="
                                    onAddNewGoodsAttrValueName(
                                        GoodsAttrs[index].id,
                                        index
                                    )
                                "
              >
                <el-button
                    @click="
                                        onAddNewGoodsAttrValueName(
                                            GoodsAttrs[index].id,
                                            index
                                        )
                                    "
                    slot="append"
                >确定</el-button
                >
              </el-input>
              <el-button type="text" slot="reference"
              >添加属性值</el-button
              >
            </el-popover>
          </div>
        </div>
        <div
            class="goods-attr-values flex"
            v-show="GoodsAttrs[index].id"
        >
          <div>规格属性：</div>
          <div class="flex-s flex-1">
            <div
                v-for="(goods_sku, goods_sku_index) in GoodsAttrs[
                                index
                            ].sku_list"
                :key="goods_sku_index"
                class="mr-5 mb-5"
            >
              <div>
                <el-select
                    v-model="
                                        GoodsAttrs[index].sku_list[
                                            goods_sku_index
                                        ]
                                    "
                    value-key="id"
                    style="width:130px;"
                    clearable
                    @clear="
                                        clearGoodsAttrValue(
                                            index,
                                            goods_sku_index
                                        )
                                    "
                    @change="
                                        value => {
                                            goodsAttrValueChange(
                                                value,
                                                index,
                                                goods_sku_index
                                            );
                                        }
                                    "
                >
                  <el-option
                      v-for="value in GoodsAttrs[index]
                                            .values"
                      :key="value.id"
                      :value="value"
                      :label="value.name"
                      :disabled="
                                            value.id
                                                | getGoodsAttrDisabled(
                                                    GoodsAttrs[index].sku_list
                                                )
                                        "
                  ></el-option>
                </el-select>
              </div>
              <div v-if="index == 0" class="mt-5">
                <component
                    :is="attrs.uploadComponent.componentName"
                    :attrs="attrs.uploadComponent"
                    :value="
                                        GoodsAttrs[index].sku_list[
                                            goods_sku_index
                                        ].image
                                    "
                    @change="
                                        value => {
                                            onGoodsSkuImageUpload(
                                                value,
                                                index,
                                                goods_sku_index
                                            );
                                        }
                                    "
                />
              </div>
            </div>
            <el-button
                @click="addGoodsAttrValue(index)"
                type="primary"
                plain
                class="mb-5 ml-10"
            >添加属性</el-button
            >
          </div>
        </div>
      </div>
      <div class="goods-attrs ">
        <div class="attr-title flex-c">
          <el-button type="primary" @click="addGoodsAttr"
          >添加商品规格</el-button
          >
          <el-popover
              v-if="GoodsAttrs.length > 0"
              placement="top"
              width="250"
              trigger="click"
          >
            <el-input
                v-model="addNewGoodsAttrName"
                placeholder="输入名称"
                @keyup.enter.native="onAddNewGoodsAttrName"
            >
              <el-button
                  @click="onAddNewGoodsAttrName"
                  slot="append"
              >确定</el-button
              >
            </el-input>
            <el-button
                plain
                type="success"
                slot="reference"
                class="ml-10"
            >创建新规格</el-button
            >
          </el-popover>
        </div>
      </div>
    </div>
    <div class="mt-10">
      <GoodsSkuList
          :GoodsAttrs="goods_attrs"
          :edit_goods_sku_list="value.goods_sku_list"
          :attrs="attrs"
          ref="GoodsSkuList"
          @change="onChange"
      />
    </div>
  </div>
</template>

<script>
import GoodsSkuList from "./GoodsSkuList";
export default {
  components: {
    GoodsSkuList
  },
  props: {
    attrs: Object,
    form_data: Object,
    value: {
      default: {
        goods_attrs: [],
        goods_sku_list: []
      }
    }
  },
  data() {
    return {
      options: this.attrs.options,
      GoodsAttrs: [],
      addNewGoodsAttrName: "",
      addNewGoodsAttrValueName: ""
    };
  },
  mounted() {
    if (this.value.goods_attrs[0] && this.value.goods_attrs[0].values) {
      this.GoodsAttrs = this.value.goods_attrs;
    }
    this.$bus.on("EditDataLoadingCompleted", () => {
      this.initGoodsAttr(this.value.goods_attrs);
    });
  },
  destroyed() {
    try {
      this.$bus.off("EditDataLoadingCompleted");
    } catch (e) {}
  },
  model: {
    prop: "value",
    event: "change"
  },
  watch: {},
  computed: {
    goods_attrs() {
      let sendData = this._.cloneDeep(this.GoodsAttrs);
      sendData = sendData
          .map(item => {
            item.sku_list = item.sku_list.filter(sku => {
              return sku.id > 0;
            });
            item.values && delete item.values;
            return item;
          })
          .filter(item => {
            return item.id > 0 && item.sku_list.length > 0;
          });
      return sendData;
    }
  },
  methods: {
    onChange(goods_attrs, goods_sku_list) {
      this.$emit("change", {
        goods_attrs: goods_attrs,
        goods_sku_list: goods_sku_list
      });
    },
    initGoodsAttr(goods_attrs) {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      goods_attrs.map(item => {
        const TItem = {
          id: item.attr.id,
          name: item.attr.name,
          alias: "",
          sku_list: item.value_map.map(valueItem => {
            return {
              id: valueItem.attr_value.id,
              goods_attr_id: valueItem.attr_id,
              name: valueItem.attr_value.name,
              alias: "",
              image: valueItem.image
            };
          }),
          values: item.attr.values
        };
        selfGoodsAttrs.push(TItem);
      });
      this.GoodsAttrs = selfGoodsAttrs;
      this.$nextTick(() => {
        this.onChange(this.GoodsAttrs, this.value.goods_sku_list);
      });
    },
    //添加规格
    addGoodsAttr() {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      selfGoodsAttrs.push(window._.cloneDeep(GoodsAttrItem));
      this.GoodsAttrs = selfGoodsAttrs;
    },
    clearGoodsAttr(index) {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      this.$delete(selfGoodsAttrs, index);
      this.GoodsAttrs = selfGoodsAttrs;
    },
    addGoodsAttrValue(index) {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      selfGoodsAttrs[index].sku_list.push(window._.clone(GoodsSkuItem));
      this.GoodsAttrs = selfGoodsAttrs;
    },
    clearGoodsAttrValue(index, goods_sku_index) {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      this.$delete(selfGoodsAttrs[index].sku_list, goods_sku_index);
      this.GoodsAttrs = selfGoodsAttrs;
    },
    //规格选择事件
    goodsAttrChange(value, index) {
      if (value.id) {
        this.GoodsAttrs[index].id = value.id;
        this.GoodsAttrs[index].name = value.name;
        this.GoodsAttrs[index].sku_list = [
          window._.clone(GoodsSkuItem)
        ];
      }
    },
    //规格属性选择事件
    goodsAttrValueChange(value, index, goods_sku_index) {
      if (value.id) {
        const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
        selfGoodsAttrs[index].sku_list[goods_sku_index].id = value.id;
        selfGoodsAttrs[index].sku_list[goods_sku_index].name =
            value.name;
        this.GoodsAttrs = selfGoodsAttrs;
        this.$nextTick(() => {
          this.$refs["GoodsSkuList"].onChange();
        });
      }
    },
    //规格属性图片上传事件
    onGoodsSkuImageUpload(value, index, goods_sku_index) {
      const selfGoodsAttrs = window._.cloneDeep(this.GoodsAttrs);
      selfGoodsAttrs[index].sku_list[goods_sku_index].image = value;
      this.GoodsAttrs = selfGoodsAttrs;
      this.$nextTick(() => {
        this.$refs["GoodsSkuList"].onChange();
      });
    },
    //保存新规格
    onAddNewGoodsAttrName() {
      this.$http
          .post(this.attrs.addGoodsAttrUrl, {
            name: this.addNewGoodsAttrName
          })
          .then(res => {
            if (res.code == 200) {
              this.addNewGoodsAttrName = "";
              this.attrs.goodsAttrs = res.data;
              this.$message.success("添加成功");
            }
          });
    },
    //保存新规格属性值
    onAddNewGoodsAttrValueName(goods_attr_id, index) {
      this.$http
          .post(this.attrs.addGoodsAttrValueUrl, {
            name: this.addNewGoodsAttrValueName,
            goods_attr_id: goods_attr_id
          })
          .then(res => {
            if (res.code == 200) {
              this.addNewGoodsAttrValueName = "";
              const selfGoodsAttrs = window._.cloneDeep(
                  this.GoodsAttrs
              );
              selfGoodsAttrs[index].values = res.data;
              this.GoodsAttrs = selfGoodsAttrs;
              this.$message.success("添加成功");
            }
          });
    }
  },
  filters: {
    getGoodsAttrDisabled(value, GoodsAttrs) {
      let re =
          GoodsAttrs.filter(item => {
            return value == item.id;
          }).length > 0;
      return re;
    }
  }
};
const GoodsSkuItem = {
  id: null,
  name: "",
  alias: "",
  image: null
};
const GoodsAttrItem = {
  id: null,
  name: "",
  alias: "",
  image: null,
  sku_list: [window._.clone(GoodsSkuItem)]
};
</script>
<style lang="scss" scoped>
$border-color: #ebeef5;
$bg-color: #f5f7fa;
.goods-sku-box {
  border: 1px solid $border-color;
  .goods-attrs + .goods-attrs {
    border-top: 1px solid $border-color;
  }
  .goods-attr-values {
    padding: 5px 10px;
    border-top: 1px solid $border-color;
  }
  .attr-title {
    padding: 5px 10px;
    background: $bg-color;
  }
}
</style>