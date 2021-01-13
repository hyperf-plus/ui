<template>
  <div class="page-account" :style="{ 'background-image': 'url(' + pageData.loginBackgroundImage + ')' }">
    <div class="page-account-container">
      <div class="page-account-top">
        <div class="page-account-top-logo">
          <template v-if="pageData.logoShow">
            <img :src="pageData.logo" v-if="pageData.logo" alt="logo" />
            <img src="../assets/logo-base.svg" v-else alt="logo" />
          </template>
          <h1 v-if="pageData.name">{{ pageData.name }}</h1>
        </div>

        <div class="page-account-top-desc">{{ pageData.loginDesc }}</div>
      </div>
      <div class="login-form">
        <el-form ref="formValidate" :model="form" :rules="ruleValidate" size="large">
          <el-form-item prop="username">
            <el-input autofocus v-model="form.username" prefix-icon="el-icon-user" @keyup.enter.native="handleSubmit('formValidate')" placeholder="请输入用户名" />
          </el-form-item>
          <el-form-item prop="password">
            <el-input v-model="form.password" type="password" prefix-icon="el-icon-lock" show-password @keyup.enter.native="handleSubmit('formValidate')" placeholder="请输入密码" />
          </el-form-item>
          <div class="page-account-auto-login flex-c-sb">
            <el-checkbox v-model="form.remember" size="large">自动登录</el-checkbox>
            <el-button size="mini" type="text" @click="onForgetPassword">忘记密码</el-button>
          </div>
          <el-form-item>
            <el-button :loading="loading" @click="handleSubmit('formValidate')" type="primary" style="width: 100%" long>登录 </el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    pageData: Object,
  },
  data() {
    return {
      form: {
        username: '',
        password: '',
        remember: true,
      },
      loading: false,
      ruleValidate: {
        username: [{ required: true, message: '请输入用户名', trigger: 'blur' }],
        password: [{ required: true, message: '请输入密码', trigger: 'blur' }],
      },
    }
  },
  mounted() {
    this.form.username = this.pageData.autoUser.username
    this.form.password = this.pageData.autoUser.password
    this.$nextTick(() => {})
  },
  methods: {
    onForgetPassword() {
      this.$message.error('忘记密码请联系管理员')
    },
    handleSubmit(name) {
      this.$refs[name].validate((valid) => {
        if (valid) {
          this.loading = true
          this.$http
            .post(this.pageData.auth.login_api, this.form)
            .then((res) => {
              if (res.status === 200) {
                window.location.href = res.redirect
              }
            })
            .catch(() => {})
            .finally(() => {
              this.loading = false
            })
        }
      })
    },
  },
}
</script>
<style lang="scss" scoped>
@media (min-width: 768px) {
  .page-account {
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100%;
    background: #f0f2f5;
  }
  .page-account-container {
    padding: 32px 0 24px 0;
  }
}

.page-account-container {
  flex: 1;
  padding: 7% 0;
  width: 384px;
  margin: 0 auto;

  .page-account-top {
    padding: 32px 0;
    text-align: center;
  }
  .page-account-top-logo {
    text-align: center;
    h1 {
      font-weight: 600;
      font-size: 33px;
      white-space: nowrap;
      font-family: Avenir, Helvetica Neue, Arial, Helvetica, sans-serif;
    }
  }
  .page-account-top-logo img {
    width: 120px;
  }

  .page-account-top-desc {
    color: rgba(0, 0, 0, 0.45);
    font-size: 14px;
    margin-top: 20px;
  }

  .page-account-auto-login {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
  }
}

.global-footer {
  margin: 48px 0 24px 0;
  padding: 0 16px;
  text-align: center;
  color: rgba(0, 0, 0, 0.45);
  font-size: 14px;
}
@media (max-width: 768px) {
  .page-account-container {
    box-sizing: border-box;
    padding: 0 10px;
    width: 100%;
    .page-account-top-logo h1 {
      font-size: 20px;
      white-space: inherit;
    }
  }
}
</style>
