<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>脚手架工具</span>
    </div>
    <el-form ref="make" :model="formData" :rules="rules" size="medium" label-width="100px">
      <div class="text item">
        <el-form-item label="表名" prop="table">
          <el-input v-model="formData.table" placeholder="请输入表名" clearable :style="{width: '100%'}"></el-input>
        </el-form-item>
        <el-form-item label="模型路径" prop="model_path">
          <el-input v-model="formData.model_path" placeholder="请输入模型路径" clearable :style="{width: '100%'}">
          </el-input>
        </el-form-item>
        <el-form-item label="生成控制器" prop="is_controller" required>
          <el-switch v-model="formData.is_controller"></el-switch>
        </el-form-item>
        <el-form-item label="控制器路径" v-if="formData.is_controller" prop="controller_path">
          <el-input v-model="formData.controller_path" placeholder="请输入控制器路径" clearable
                    :style="{width: '100%'}"></el-input>
        </el-form-item>
      </div>
      <div class="text item" style="padding: 20px  30px  30px  20px">
        <el-checkbox v-model="formData.migration">创建迁移工具</el-checkbox>
        <el-checkbox v-model="formData.model">创建Model</el-checkbox>
        <el-checkbox v-model="formData.controller">创建控制器</el-checkbox>
      </div>
      <el-table
          :data="formData.column"
          size="medium"
          stripe
          current-row-key="attr_key"
      >
        <el-table-column align="center" label="字段名">
          <template slot-scope="scope">
            <el-input
                :value="scope.row.field"
                v-model="scope.row.field"
                size="medium"
            ></el-input>
          </template>
        </el-table-column>
        <el-table-column align="center" label="类型">
          <template slot-scope="scope">
            <el-select v-model="scope.row.type" placeholder="请选择">
              <el-option
                  v-for="item in [
                      'string',
                      'integer',
                      'text',
                      'double',
                      'decimal',
                      'boolean',
                      'date',
                      'time',
                      'dateTime',
                      'timestamp',
                      'char',
                      'mediumText',
                      'longText',
                      'tinyInteger',
                      'smallInteger',
                      'mediumInteger',
                      'bigInteger',
                      'unsignedTinyInteger',
                      'unsignedSmallInteger',
                      'unsignedMediumInteger',
                      'unsignedInteger',
                      'unsignedBigInteger',
                      'enum',
                      'json',
                      'jsonb',
                      'dateTimeTz',
                      'timeTz',
                      'timestampTz',
                      'nullableTimestamps',
                      'binary',
                      'ipAddress',
                      'macAddress',
                      ]"
                  :key="item"
                  :label="item"
                  :value="item">
              </el-option>
            </el-select>
          </template>
        </el-table-column>
        <el-table-column width="100px" align="center" label="长度">
          <template slot-scope="scope">
            <el-input
                size="medium"
                :value="scope.row.length"
                v-model="scope.row.length"
            ></el-input>
          </template>
        </el-table-column>
        <el-table-column align="center" label="Nullable">
          <div slot="header" class="flex-c-c">
            <span>Nullable</span>
            <i class="el-icon-edit-outline fs-16 ml-5 hover" title="批量设置"></i>
          </div>
          <template slot-scope="scope">
            <el-checkbox v-model="scope.row.is_null">
            </el-checkbox>
          </template>
        </el-table-column>
        <el-table-column align="center" label='索引'>
          <template slot-scope="scope">
            <el-select v-model="scope.row.index" placeholder="请选择">
              <el-option
                  v-for="item in [
                      'NULL',
                      'Unique',
                      'index',
                      ]"
                  :key="item"
                  :label="item"
                  :value="item">
              </el-option>
            </el-select>
          </template>
        </el-table-column>
        <el-table-column align="center" label="默认值">
          <template slot-scope="scope">
            <el-input
                size="medium"
                :value="scope.row.default"
                v-model="scope.row.default"
            ></el-input>
          </template>
        </el-table-column>
        <el-table-column align="center" label="备注">
          <template slot-scope="scope">
            <el-input
                size="medium"
                :value="scope.row.comment"
                v-model="scope.row.comment"
            ></el-input>
          </template>
        </el-table-column>

        <el-table-column label="操作">
          <template slot-scope="scope">
            <el-button
                size="mini"
                type="danger"
                @click="fieldDelete(scope.$index, scope.row)">删除
            </el-button>
          </template>
        </el-table-column>
      </el-table>


      <el-row :gutter="10" style="margin-top: 10px">

        <el-col :span="7">
          <el-button type="primary" icon="el-icon-edit" @click="addField">添加字段</el-button>
        </el-col>
        <el-col :span="17">
          <el-row type="flex" justify="end" align="top">
            <el-col :span="7">
              <el-form-item label="主键" prop="pk">
                <el-input v-model="formData.pk" placeholder="id主键" clearable :style="{width: '100%'}">
                </el-input>
              </el-form-item>
            </el-col>
            <el-col :span="5">
              <el-form-item label="创建时间戳" prop="timestamps">
                <el-switch v-model="formData.timestamps"></el-switch>
              </el-form-item>
            </el-col>
            <el-col :span="5">
              <el-form-item label="软删除" prop="timestamps">
                <el-switch v-model="formData.delete"></el-switch>
              </el-form-item>
            </el-col>
          </el-row>
        </el-col>

        <el-col :span="24" style="text-align: right;">
          <el-button type="primary" size="medium" @click="submitForm">提交</el-button>
        </el-col>
      </el-row>


    </el-form>
  </el-card>
</template>
<script>
export default {
  components: {},
  props: [],
  data() {
    return {
      ruleForm: {},
      evidenceTemp: {
        id: '',
        name: '',
        remarks: ''
      },
      evidenceTemplateDeleteList: '',
      rules1: {
        name: [
          {required: true, message: '证据模板名称不能为空', trigger: 'blur'}
        ]
      },
      formData: {
        migration: true,
        model: true,
        controller: true,
        column: [{
          field: null,
          length: null,
          type: null,
          is_null: false,
          index: null,
          default: null,
          comment: null
        }],
        field112: undefined,
        pk: undefined,
        timestamps: true,
        delete: false,
        table: undefined,
        model_path: "\\app\\Model\\",
        is_controller: true,
        controller_path: "\\app\\controller\\Admin\\",
      },
      rules: {
        table: [{
          required: true,
          message: '请输入表名',
          trigger: 'blur'
        }],
        model_path: [{
          required: true,
          message: '请输入模型路径',
          trigger: 'blur'
        }],
        controller_path: [{
          required: true,
          message: '请输入控制器路径',
          trigger: 'blur'
        }],
      },
    }
  },
  computed: {},
  watch: {
    'formData.table': (param) => {
      formData.model_path = formData.model_path +param
    }
  },
  created() {
  },
  mounted() {
  },
  methods: {
    submitForm() {
      this.$refs['make'].validate(valid => {
        if (!valid) return
        // TODO 提交表单
      })
    },   //添加规格
    addField() {
      let fields = window._.cloneDeep(this.formData.column);
      fields.push(window._.cloneDeep(FieldItem));
      this.formData.column = fields;
    },
    fieldDelete(index) {
      this.formData.column.splice(index, 1)
    },
    resetForm() {
      this.$refs['make'].resetFields()
    },
  }
}
const FieldItem = {
  field: null,
  type: null,
  length: null,
  is_null: false,
  index: null,
  default: null,
  comment: null
};
</script>
<style>
</style>
