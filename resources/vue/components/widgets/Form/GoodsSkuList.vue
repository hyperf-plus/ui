<template>
  <el-table
      v-if="goods_skus.length > 0"
      :data="goods_skus"
      size="mini"
      stripe
      current-row-key="attr_key"
      border
  >
    <el-table-column
        v-for="(item, index) in sku_title_data"
        :key="index"
        :label="item.name"
        align="center"
        width="150px"
        fixed="left"
    >
      <template slot-scope="scope">
        <div class="flex-c-c">
          <component
              v-if="index == 0 && scope.row.attrs[index].image"
              :is="attrs.imageComponent.componentName"
              :attrs="attrs.imageComponent"
              :value="scope.row.attrs[index].image"
              :column_value="scope.row.attrs[index].image"
          />
          <span>{{ scope.row.attrs[index].name }}</span>
        </div>
      </template>
    </el-table-column>

    <el-table-column width="180px" align="center" label="价格">
      <div slot="header" class="flex-c-c">
        <span>价格</span>
        <i class="el-icon-edit-outline fs-16 ml-5 hover" title="批量设置"></i>
      </div>
      <template slot-scope="scope">
        <el-input-number
            :min="0"
            :precision="2"
            :value="scope.row.price"
            :controls="false"
            size="mini"
            @change="
                        (currentValue, oldValue) =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'price'
                            )
                    "
        ></el-input-number>
      </template>
    </el-table-column>
    <el-table-column width="180px" align="center" label="库存">
      <template slot-scope="scope">
        <el-input-number
            :min="0"
            size="mini"
            :precision="0"
            controls-position="right"
            :value="scope.row.stock_num"
            @change="
                        (currentValue, oldValue) =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'stock_num'
                            )
                    "
        ></el-input-number>
      </template>
    </el-table-column>
    <el-table-column width="180px" align="center" label="规格编码">
      <template slot-scope="scope">
        <el-input
            :min="0"
            :precision="2"
            size="mini"
            :value="scope.row.code"
            @input="
                        currentValue =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'code'
                            )
                    "
        ></el-input>
      </template>
    </el-table-column>
    <el-table-column width="180px" align="center" label="成本价">
      <template slot-scope="scope">
        <el-input-number
            :min="0"
            :precision="2"
            size="mini"
            :value="scope.row.cost_price"
            :controls="false"
            @change="
                        (currentValue, oldValue) =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'cost_price'
                            )
                    "
        ></el-input-number>
      </template>
    </el-table-column>
    <el-table-column width="180px" align="center" label="划线价">
      <template slot-scope="scope">
        <el-input-number
            :min="0"
            :precision="2"
            size="mini"
            :value="scope.row.line_price"
            :controls="false"
            @change="
                        (currentValue, oldValue) =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'line_price'
                            )
                    "
        ></el-input-number>
      </template>
    </el-table-column>
    <el-table-column width="180px" align="center" label="销量">
      <template slot-scope="scope">
        <el-input-number
            :min="0"
            :precision="0"
            size="mini"
            :value="scope.row.sold_num"
            controls-position="right"
            @change="
                        (currentValue, oldValue) =>
                            onGoodsSkuValueChange(
                                scope.$index,
                                currentValue,
                                'sold_num'
                            )
                    "
        ></el-input-number>
      </template>
    </el-table-column>
  </el-table>
</template>
<script>
import cartesian from "cartesian";

export default {
  props: {
    GoodsAttrs: Array,
    edit_goods_sku_list: Array,
    attrs: Object
  },
  watch: {
    GoodsAttrs(value) {
      //console.log(value);
    },
    sku_title_data(value) {
      //console.log(value);
    },
    sku_list_data(value) {
      //console.log(value);
    },
    sku_descartes(value) {
      //console.log(value);
    },
    goods_skus: {
      handler(cval, oval) {
        //console.log("goods_skus", cval);
      },
      deep: true
    }
  },
  mounted() {


  },
  computed: {
    goods_skus() {
      return this.sku_descartes.map(item => {

        const attr_key_ids = item.map(ii => {
          return ii.id;
        });
        const attr_key = this._.sortBy(attr_key_ids).join("-");
        const edit_items =
            this.edit_goods_sku_list.length > 0
                ? this.edit_goods_sku_list.filter(item => {
                  return item.attr_key === attr_key;
                })
                : [];
        const edit_item = edit_items.length > 0 ? edit_items[0] : false;
        return {
          attrs: item,
          attr_key: attr_key,
          price: edit_item ? edit_item.price : 0,
          stock_num: edit_item ? edit_item.stock_num : 0,
          code: edit_item ? edit_item.code : "",
          cost_price: edit_item ? edit_item.cost_price : 0,
          line_price: edit_item ? edit_item.line_price : 0,
          sold_num: edit_item ? edit_item.sold_num : 0,
          image: item[0].image ? item[0].image : null
        };
      });
    },
    sku_descartes() {
      return cartesian(this.sku_list_data);
    },
    sku_list_data() {
      return this.GoodsAttrs.filter(item => item.id > 0)
          .map(item => {
            return item.sku_list.filter(sku => {
              return sku.id > 0;
            });
          })
          .filter(arrs => arrs.length > 0);
    },
    sku_title_data() {
      return this.GoodsAttrs.filter(item => {
        return item.id > 0 && item.sku_list.length > 0;
      }).map(item => {
        return {
          id: item.id,
          name: item.name
        };
      });
    },
    sku_title_width() {
      300 / this.sku_title_data.length;
    }
  },
  methods: {
    onGoodsSkuValueChange(index, currentValue, key) {
      this.$set(this.goods_skus[index], key, currentValue);
      this.onChange();
    },
    onChange() {
      this.$emit("change", this.GoodsAttrs, this.goods_skus);
    }
  }
};
</script>