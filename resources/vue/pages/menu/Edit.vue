<template>
  <el-dialog :close-on-click-modal="false" :title="title" :type="type" :visible.sync="isVisible" :width="width"
             top="50px">
    <el-form :model="resource" :rules="rules" label-position="right" label-width="100px" ref="form">
      <el-form-item label="编码" prop="code">
        <el-input :disabled="type==='edit'" @keyup.enter.native="submitForm" v-model="resource.code"/>
        <p class="note">参考shiro的权限配置方式，使用:</p>
        <p class="note"><b>;</b> 作为权限编码分隔符， <b>:</b> 作为功能层级分隔符，<b>,</b> 作为多个功能点的分隔符，<b>*</b> 作为任意通配符</p>
        <p class="note">建议以view、add、update、delete、export、import、download、upload等关键词结尾</p>
        <p class="note">如：authority:menu:add 只有菜单新增权限</p>
        <p class="note">如：tenant:tenant:initConnect;tenant:datasourceConfig:view 租户初始化和数据源查询权限</p>
        <p class="note">如：authority:resource:* 资源模块任意权限</p>
        <p class="note">如：msg:sms:add,edit 短信功能的新增和修改权限</p>
      </el-form-item>
      <el-form-item label="名称" @keyup.enter.native="submitForm" prop="name">
        <el-input v-model="resource.name"/>
      </el-form-item>
      <el-form-item label="操作" @keyup.enter.native="submitForm" prop="describe">
        <el-input v-model="resource.describe"/>
      </el-form-item>
    </el-form>
    <div class="dialog-footer" slot="footer">
      <el-button @click="isVisible = false" plain type="warning">取消</el-button>
      <el-button @click="submitForm" plain type="primary">确认</el-button>
    </div>
  </el-dialog>
</template>
<script>
export default {
  name: 'ResourceEdit',
  components: {},
  props: {
    dialogVisible: {
      type: Boolean,
      default: false
    },
    type: {
      type: String,
      default: 'add'
    }
  },
  data() {
    return {
      resource: this.initResource(),
      screenWidth: 0,
      width: this.initWidth(),
      rules: {
        code: [
          {
            required: true,
            message: '编码必须填写',
            trigger: 'blur'
          },
          {
            min: 1,
            max: 500,
            message: '不能超过500字符',
            trigger: 'blur'
          },
          {
            validator: (rule, value, callback) => {
              if (!this.resource.id) {
                // this.$get(`system/user/check/${value}`).then((r) => {
                //   if (!r.data) {
                //     callback(this.$t('rules.usernameExist'))
                //   } else {
                //     callback()
                //   }
                // })
              } else {
                // callback()
              }
              callback()
            },
            trigger: 'blur'
          }
        ],
        name: {
          required: true,
          message: '不能为空',
          trigger: 'blur'
        }
      }
    }
  },
  computed: {
    isVisible: {
      get() {
        return this.dialogVisible
      },
      set() {
        this.close()
        this.reset()
      }
    },
    title() {
      return this.type === 'add'
          ? '添加'
          : '编辑'
    }
  },
  watch: {},
  mounted() {
    window.onresize = () => {
      return (() => {
        this.width = this.initWidth()
      })()
    };
  },
  methods: {
    initResource() {
      return {
        id: '',
        name: '',
        code: '',
        describe: ''
      }
    },
    initWidth() {
      this.screenWidth = document.body.clientWidth
      if (this.screenWidth < 991) {
        return '90%';
      } else if (this.screenWidth < 1400) {
        return '45%';
      } else {
        return '800px';
      }
    },
    setResource(val) {
      const that = this
      if (val) {
        that.resource = {...val}
      }
    },
    close() {
      this.$emit('close')
    },
    reset() {
      // 先清除校验，再清除表单，不然有奇怪的bug
      this.$refs.form.clearValidate()
      this.$refs.form.resetFields()
      this.resource = this.initResource()
    },
    submitForm() {
      const that = this
      this.$refs.form.validate(valid => {
        if (valid) {
          that.editSubmit()
        } else {
          return false
        }
      })
    },
    editSubmit() {
      const that = this
      if (that.type === 'add') {
        that.save()
      } else {
        that.update()
      }
    },
    save() {
      //添加
      const that = this
      // resourceApi.save(this.resource).then(response => {
      //   const res = response.data
      //   if (res.isSuccess) {
      //     that.isVisible = false
      //     that.$message({
      //       message: that.$t('tips.createSuccess'),
      //       type: 'success'
      //     })
      //     that.$emit('success')
      //   }
      //})
    },
    update() {
      //更新
      // resourceApi.update(this.resource).then(response => {
      //   const res = response.data
      //   if (res.isSuccess) {
      //     this.isVisible = false
      //     this.$message({
      //       message: this.$t('tips.updateSuccess'),
      //       type: 'success'
      //     })
      //     this.$emit('success')
      //   }
      // })
    }
  }
}
</script>
<style lang="scss" scoped>
p.note {
  font-size: 12px;
  margin: 0;
  padding: 0;
  line-height: 1.4rem;
}

p.note b {
  color: red;
}
</style>