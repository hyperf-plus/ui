<template>
  <div class="menu">
    <el-row :gutter="10">
      <el-col :sm="6" :xs="24">
        <div class="app-container">
          <div class="filter-container">
            <el-input placeholder="名称" @keyup.enter.native="search" class="filter-item search-item"
                      clearable v-model="label"/>
            <el-tooltip class="item" content="新增/删除时，请先勾选菜单" effect="dark" placement="right">
              <el-dropdown class="filter-item" trigger="click">
                <!--                v-has-any-permission="['authority:menu:add','authority:menu:delete','authority:menu:export']"-->
                <el-button>
                  更多
                  <i class="el-icon-arrow-down el-icon--right"/>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item @click.native="add">
                    <!--                    v-has-permission="['authority:menu:add']"-->
                    添加
                  </el-dropdown-item>
                  <el-dropdown-item @click.native="deleteMenu">
                    <!--                    v-has-permission="['authority:menu:delete']"-->
                    删除
                  </el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </el-tooltip>
          </div>
          <commonTree :tree-data="menuTree" @nodeClick="nodeClick" ref="menuTree">
            <template slot-scope="treeNode">
              <span class="tree-icon">
<!--                <i :class="treeNode.data.icon ? treeNode.data.icon : 'el-icon-document'"/>-->
                <!--                <e-icon :icon-name="treeNode.data.icon ? treeNode.data.icon : 'el-icon-document'" class="sub-el-icon"/>-->
              </span>
              <span class="tree-icon">
                <el-badge :type="treeNode.data.state ? 'success' :'danger'" class="status-item" is-dot/>
              </span>
            </template>
          </commonTree>
        </div>
      </el-col>
      <el-col :sm="8" :xs="24">
        <el-card class="box-card">
          <div class="clearfix" slot="header">
            <span>{{ menu.id === '' ? '添加' : '编辑' }}</span>
          </div>
          <div>
            <el-form :model="menu" :rules="rules" label-position="right" label-width="80px" ref="form">
              <el-form-item label="上级ID" prop="parentId">
                <el-tooltip content="值为0时表示顶级节点" class="item" effect="dark" placement="right">
                  <el-input readonly v-model="menu.parentId"/>
                </el-tooltip>
              </el-form-item>
              <el-form-item label="名称" prop="label">
                <el-input v-model="menu.label"/>
              </el-form-item>
              <el-form-item label="路径" prop="path">
                <el-input @keyup.native="menuPath" v-model="menu.path"/>
              </el-form-item>
              <el-form-item label="UI路径" prop="component">
                <el-input v-model="menu.component"/>
                <span>{{ menuComponent }}</span>
              </el-form-item>


              <el-form-item label="UI路径" prop="component">
                <component
                    is="IconChoose"
                    :attrs="{
                        placement:'top'

                    }"
                />
              </el-form-item>
              <el-row>
                <el-col :span="12">
                  <el-form-item label="状态" prop="state">
                    <el-switch active-text="可用" inactive-text="禁用"
                               v-model="menu.state"/>
                  </el-form-item>
                </el-col>
                <el-col :span="12">
                  <el-form-item label="通用菜单" prop="isGeneral">
                    <el-switch active-text="是" inactive-text="否"
                               v-model="menu.isGeneral"/>
                  </el-form-item>
                </el-col>
              </el-row>
              <el-form-item label="排序" prop="sortValue">
                <el-input-number :max="100" :min="0" @change="handleNumChange" v-model="menu.sortValue"/>
              </el-form-item>
              <el-form-item label="分组" prop="group">
                <el-tooltip class="item" content="用于区分多组菜单" effect="dark" placement="right">
                  <el-input v-model="menu.group"/>
                </el-tooltip>
              </el-form-item>
              <el-form-item label="描述" prop="describe">
                <el-input v-model="menu.describe"/>
              </el-form-item>
            </el-form>
          </div>
        </el-card>
        <el-card class="box-card" style="margin-top: -2rem;">
          <el-row>
            <el-col :span="24" style="text-align: right">
              <el-button @click="submit" plain type="primary">{{
                  menu.id === '' ? '添加' :
                      '编辑'
                }}
              </el-button>
            </el-col>
          </el-row>
        </el-card>
      </el-col>

      <el-col :sm="10" :xs="24">
        <el-card class="box-card">
          <div class="app-container">
            <div class="filter-container">
              <el-input placeholder="请输入编码" class="filter-item search-item" clearable
                        v-model="resourceQueryParams.model.code"/>
              <el-input placeholder="请输入名称" class="filter-item search-item" clearable
                        v-model="resourceQueryParams.model.name"/>
              <el-button @click="resourceSearch" class="filter-item" plain type="primary">搜索
              </el-button>
              <el-dropdown class="filter-item" trigger="click">
                <!--                           v-has-any-permission="['authority:resource:add','authority:resource:delete']"-->
                <el-button>
                  更多
                  <i class="el-icon-arrow-down el-icon--right"/>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item :disabled="!menu.id" @click.native="resourceAdd">添加
                    <!--                                    v-has-permission="['authority:resource:add']"-->

                  </el-dropdown-item>
                  <!--                  v-has-permission="['authority:resource:delete']"-->
                  <el-dropdown-item @click.native="resourceBatchDelete"
                  >
                    删除
                  </el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </div>

            <el-table
                :data="resourceTableData.records"
                :key="resourceTableKey"
                @selection-change="onResourceSelectChange"
                @sort-change="resourceSortChange"
                @filter-change="resourceFilterChange"
                border
                fit
                ref="resourceTable"
                style="width: 100%;"
                v-loading="resourceLoading"
            >
              <el-table-column align="center" type="selection" width="40px"/>
              <el-table-column label="编码" :show-overflow-tooltip="true" align="center"
                               prop="code">
                <template slot-scope="scope">
                  <span>{{ scope.row.code }}</span>
                </template>
              </el-table-column>
              <el-table-column label="名称" :show-overflow-tooltip="true" align="center"
                               prop="name">
                <template slot-scope="scope">
                  <span>{{ scope.row.name }}</span>
                </template>
              </el-table-column>
              <el-table-column label="操作" align="center" class-name="small-padding fixed-width"
                               width="100px">
                <template slot-scope="{row}">
                  <i @click="resourceEdit(row)" class="el-icon-edit table-operation" style="color: #2db7f5;"/>
                  <!--                     v-hasPermission="['authority:resource:edit']"-->
                  <i @click="resourceSingleDelete(row)" class="el-icon-delete table-operation" style="color: #f50;"/>
                  <!--                     v-hasPermission="['authority:resource:delete']"-->
                  <el-link class="no-perm">
                    <!--                           v-has-no-permission="['authority:resource:edit','authority:resource:delete']"-->
                    无权限
                  </el-link>
                </template>
              </el-table-column>
            </el-table>
            <pagination
                :limit.sync="resourceQueryParams.size"
                :page.sync="resourceQueryParams.current"
                :total="Number(resourceTableData.total)"
                @pagination="resourceFetch"
                v-show="resourceTableData.total>0"
            />
          </div>
        </el-card>
      </el-col>
    </el-row>
    <resource-edit :dialog-visible="dialog.isVisible" :type="dialog.type" @close="resourceEditClose"
                   @success="resourceEditSuccess" ref="resourceEdit"/>
    <el-dialog
        :close-on-click-modal="false"
        :close-on-press-escape="true"
        title="预览"
        width="80%"
        top="50px"
        :visible.sync="preview.isVisible"
    >
      <el-scrollbar>
        <div v-html="preview.context"></div>
      </el-scrollbar>
    </el-dialog>
  </div>
</template>
<script>
import commonTree from '@/components/common/tree.vue'
import Pagination from '@/components/common/Pagination.vue'
import ResourceEdit from './Edit'
import {initQueryParams} from '@/utils'

export default {
  name: 'MenuManage',
  components: {commonTree, Pagination, ResourceEdit},
  data() {
    return {
      dialog: {
        isVisible: false,
        type: 'add'
      },
      preview: {
        isVisible: false,
        context: ''
      },
      iconVisible: false,
      menuTree: [],
      label: '',
      menu: this.initMenu(),
      resourceQueryParams: initQueryParams({
        model: {
          menuId: null
        }
      }),
      resourceTableKey: 0,
      resourceLoading: false,
      resourceSelection: [],
      resourceTableData: {
        total: 0
      },
      rules: {
        label: [
          {required: true, message: '必填', trigger: 'blur'},
          {min: 1, max: 255, message: 'rules.range2to10', trigger: 'blur'}
        ],
        path: [{max: 255, message: 'rules.noMoreThan100', trigger: 'blur'},
          {required: true, message: '必填', trigger: 'blur'},
          {
            validator: (rule, value, callback) => {
              const isUrl = this.isUrl(this.menu.path)

              if (value === '/' || (!isUrl && value.endsWith('/'))) {
                callback('请填写有效的路由地址')
              } else {
                callback()
              }
            }, trigger: 'blur'
          }]
      }
    }
  },
  computed: {
    menuComponent() {
      let comp = ''
      if (this.menu.path && this.menu.path !== '/') {
        const isUrl = this.isUrl(this.menu.path)
        if (isUrl) {
          comp = `跳转地址：${this.menu.path}`
        } else {
          comp = `UI地址：/admin/${this.menu.component}`
        }
      } else {
        comp = `UI地址：/admin/index`
      }
      return comp
    }
  },
  watch: {
    'menu.path': function () {
      this.computedComponent()
    }
  },
  mounted() {
    this.initMenuTree()
  },
  methods: {
    isUrl(path) {
      const urls = ['http://', '/http://', 'https://', '/https://', 'www.', '/www.']
      const urlIndex = urls.findIndex(item => {
        return path.startsWith(item)
      })
      return urlIndex >= 0
    },
    menuPath() {
      const isUrl = this.isUrl(this.menu.path)
      if (!isUrl && !this.menu.path.startsWith('/')) {
        this.menu.path = '/' + this.menu.path
      } else if (isUrl) {
        if (this.menu.path.startsWith('/')) {
          this.menu.path = this.menu.path.substr(1)
        }
      }
    },
    computedComponent() {
      const isUrl = this.isUrl(this.menu.path)
      if (isUrl) {
        this.menu.component = 'Layout'
      } else if (this.menu.id === "") {
        if (this.menu.path) {
          this.menu.component = `lamp${this.menu.path}/index`
        } else {
          this.menu.component = `lamp/index`
        }
      }
    },
    initMenuTree() {

      let res = JSON.parse('{"code":0,"data":[{"id":"10","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"租户设置","parentId":"0","sortValue":10,"children":[{"id":"112","createTime":"2020-11-25 16:20:21","createdBy":"1","updateTime":"2020-11-25 16:20:21","updatedBy":"1","label":"数据源配置","parentId":"10","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/tenant/datasourceConfig","component":"lamp/tenant/datasourceConfig/index","state":true,"icon":"","group":"","readonly":false},{"id":"110","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-25 16:20:26","updatedBy":"1","label":"租户管理","parentId":"10","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/tenant/tenant","component":"lamp/tenant/tenant/index","state":true,"icon":"","group":"","readonly":true},{"id":"111","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-25 16:20:30","updatedBy":"1","label":"超级用户","parentId":"10","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"/tenant/user","component":"lamp/tenant/user/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/tenant","component":"Layout","state":true,"icon":"fa fa-object-group","group":"","readonly":true},{"id":"20","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"工作台","parentId":"0","sortValue":20,"children":[{"id":"120","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"通知公告","parentId":"20","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/workbench/notice","component":"lamp/workbench/notice/index","state":true,"icon":"","group":"","readonly":true},{"id":"121","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"待我审批","parentId":"20","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/workbench/todo","component":"lamp/workbench/todo/index","state":true,"icon":"","group":"","readonly":true},{"id":"122","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"我已审批","parentId":"20","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"/workbench/done","component":"lamp/workbench/done/index","state":true,"icon":"","group":"","readonly":true},{"id":"123","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"我发起的","parentId":"20","sortValue":40,"children":null,"describe":"","isGeneral":false,"path":"/workbench/started","component":"lamp/workbench/started/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/workbench","component":"Layout","state":true,"icon":"fa fa-tachometer","group":"","readonly":true},{"id":"30","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"组织管理","parentId":"0","sortValue":30,"children":[{"id":"130","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"机构管理","parentId":"30","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/org/org","component":"lamp/org/org/index","state":true,"icon":"","group":"","readonly":true},{"id":"131","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"岗位管理","parentId":"30","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/org/station","component":"lamp/org/station/index","state":true,"icon":"","group":"","readonly":true},{"id":"132","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"用户管理","parentId":"30","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"/org/user","component":"lamp/org/user/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/org","component":"Layout","state":true,"icon":"fa fa-users","group":"","readonly":true},{"id":"40","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"资源中心","parentId":"0","sortValue":40,"children":[{"id":"140","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"消息中心","parentId":"40","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/resources/msg","component":"lamp/resources/msg/index","state":true,"icon":"","group":"","readonly":true},{"id":"141","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"短信模版","parentId":"40","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/resources/smsTemplate","component":"lamp/resources/smsTemplate/index","state":true,"icon":"","group":"","readonly":true},{"id":"142","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"短信中心","parentId":"40","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"/resources/sms","component":"lamp/resources/sms/index","state":true,"icon":"","group":"","readonly":true},{"id":"143","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"附件管理","parentId":"40","sortValue":40,"children":null,"describe":"","isGeneral":false,"path":"/resources/attachment","component":"lamp/resources/attachment/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/resources","component":"Layout","state":true,"icon":"fa fa-cloud","group":"","readonly":true},{"id":"50","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"流程管理","parentId":"0","sortValue":50,"children":[{"id":"150","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"流程部署","parentId":"50","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/activiti/deploymentManager","component":"lamp/activiti/deploymentManager/index","state":true,"icon":"","group":"","readonly":true},{"id":"151","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"模型管理","parentId":"50","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/activiti/modelManager","component":"lamp/activiti/modelManager/index","state":true,"icon":"","group":"","readonly":true},{"id":"152","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"请假流程","parentId":"50","sortValue":30,"children":[{"id":"153","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"请假管理","parentId":"152","sortValue":1,"children":null,"describe":"","isGeneral":false,"path":"/activiti/leave/instant","component":"lamp/activiti/leave/instantManager/index","state":true,"icon":"","group":"","readonly":true},{"id":"154","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"请假任务","parentId":"152","sortValue":2,"children":null,"describe":"","isGeneral":false,"path":"/activiti/leave/ruTask","component":"lamp/activiti/leave/ruTask/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/activiti/level","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"155","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"报销流程","parentId":"50","sortValue":40,"children":[{"id":"156","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"报销管理","parentId":"155","sortValue":1,"children":null,"describe":"","isGeneral":false,"path":"/activiti/reimbursement/instantManager","component":"lamp/activiti/reimbursement/instantManager/index","state":true,"icon":"","group":"","readonly":true},{"id":"157","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"报销任务","parentId":"155","sortValue":2,"children":null,"describe":"","isGeneral":false,"path":"/activiti/reimbursement/ruTask","component":"lamp/activiti/reimbursement/ruTask/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/activiti/reimbursement","component":"Layout","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/activiti","component":"Layout","state":true,"icon":"fa fa-retweet","group":"","readonly":true},{"id":"60","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"系统设置","parentId":"0","sortValue":60,"children":[{"id":"160","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"菜单管理","parentId":"60","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/system/menu","component":"lamp/system/menu/index","state":true,"icon":"","group":"","readonly":true},{"id":"161","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"角色管理","parentId":"60","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/system/role","component":"lamp/system/role/index","state":true,"icon":"","group":"","readonly":true},{"id":"162","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"字典管理","parentId":"60","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"/system/dictionary","component":"lamp/system/dictionary/index","state":true,"icon":"","group":"","readonly":true},{"id":"163","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"地区管理","parentId":"60","sortValue":40,"children":null,"describe":"","isGeneral":false,"path":"/system/area","component":"lamp/system/area/index","state":true,"icon":"","group":"","readonly":true},{"id":"164","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"参数管理","parentId":"60","sortValue":50,"children":null,"describe":"","isGeneral":false,"path":"/system/parameter","component":"lamp/system/parameter/index","state":true,"icon":"","group":"","readonly":true},{"id":"165","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"操作日志","parentId":"60","sortValue":60,"children":null,"describe":"","isGeneral":false,"path":"/system/optLog","component":"lamp/system/optLog/index","state":true,"icon":"","group":"","readonly":true},{"id":"166","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"登录日志","parentId":"60","sortValue":70,"children":null,"describe":"","isGeneral":false,"path":"/system/loginLog","component":"lamp/system/loginLog/index","state":true,"icon":"","group":"","readonly":true},{"id":"167","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"在线用户","parentId":"60","sortValue":80,"children":null,"describe":"","isGeneral":false,"path":"/system/online","component":"lamp/system/online/index","state":true,"icon":"","group":"","readonly":true},{"id":"168","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"应用管理","parentId":"60","sortValue":90,"children":null,"describe":"","isGeneral":false,"path":"/system/application","component":"lamp/system/application/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/system","component":"Layout","state":true,"icon":"fa fa-gears","group":"","readonly":true},{"id":"70","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"网关管理","parentId":"0","sortValue":70,"children":[{"id":"180","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"限流规则","parentId":"70","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"/gateway/ratelimiter","component":"lamp/gateway/ratelimiter/index","state":true,"icon":"","group":"","readonly":true},{"id":"181","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"阻止访问","parentId":"70","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"/gateway/blocklist","component":"lamp/gateway/blocklist/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/gateway","component":"Layout","state":true,"icon":"fa fa-sort-amount-asc","group":"","readonly":true},{"id":"80","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"开发者管理","parentId":"0","sortValue":80,"children":[{"id":"190","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"定时任务","parentId":"80","sortValue":10,"children":null,"describe":"","isGeneral":false,"path":"http://127.0.0.1:8767/zuihou-jobs-server","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"191","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"接口文档","parentId":"80","sortValue":20,"children":null,"describe":"","isGeneral":false,"path":"http://tangyh.top:10000/api/gate/doc.html","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"192","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"nacos","parentId":"80","sortValue":30,"children":null,"describe":"","isGeneral":false,"path":"http://127.0.0.1:8848/nacos","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"193","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"服务监控","parentId":"80","sortValue":40,"children":null,"describe":"","isGeneral":false,"path":"http://127.0.0.1:8762/lamp-monitor","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"194","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"数据库监控","parentId":"80","sortValue":50,"children":null,"describe":"","isGeneral":false,"path":"/developer/db","component":"lamp/developer/db/index","state":true,"icon":"","group":"","readonly":true},{"id":"195","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"缓存监控","parentId":"80","sortValue":60,"children":null,"describe":"","isGeneral":false,"path":"https://github.com/junegunn/redis-stat","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"196","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"zipkin监控","parentId":"80","sortValue":70,"children":null,"describe":"","isGeneral":false,"path":"http://127.0.0.1:8772/zipkin","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"197","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"SkyWalking监控","parentId":"80","sortValue":80,"children":null,"describe":"","isGeneral":false,"path":"http://tangyh.top:12080/","component":"Layout","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":false,"path":"/developer","component":"Layout","state":true,"icon":"fa fa-bug","group":"","readonly":true},{"id":"90","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"了解lamp","parentId":"0","sortValue":90,"children":[{"id":"210","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"在线文档","parentId":"90","sortValue":10,"children":null,"describe":"","isGeneral":true,"path":"https://www.kancloud.cn/zuihou/zuihou-admin-cloud","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"211","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"会员版","parentId":"90","sortValue":20,"children":null,"describe":"","isGeneral":true,"path":"https://www.kancloud.cn/zuihou/zuihou-admin-cloud/2003629","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"212","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-12-01 11:34:20","updatedBy":"2","label":"获取源码","parentId":"90","sortValue":30,"children":null,"describe":"","isGeneral":true,"path":"https://github.com/zuihou","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"213","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"问题反馈","parentId":"90","sortValue":40,"children":null,"describe":"","isGeneral":true,"path":"https://github.com/zuihou/lamp-cloud/issues","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"214","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"更新日志","parentId":"90","sortValue":50,"children":null,"describe":"","isGeneral":true,"path":"https://www.kancloud.cn/zuihou/zuihou-admin-cloud/1465302","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"215","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"蓝图","parentId":"90","sortValue":60,"children":null,"describe":"","isGeneral":true,"path":"https://www.kancloud.cn/zuihou/zuihou-admin-cloud/2003640","component":"Layout","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":true,"path":"/community","component":"Layout","state":true,"icon":"fa fa-github-square","group":"","readonly":true},{"id":"100","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"更多功能","parentId":"0","sortValue":100,"children":[{"id":"220","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"多级菜单","parentId":"100","sortValue":1,"children":[{"id":"221","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"菜单1-1","parentId":"220","sortValue":1,"children":[{"id":"222","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"菜单1-1-1","parentId":"221","sortValue":1,"children":null,"describe":"","isGeneral":true,"path":"/more/multiMenu/menu1-1/menu1-1-1","component":"lamp/more/multiMenu/menu1-1/menu1-1-1/index","state":true,"icon":"","group":"","readonly":true},{"id":"223","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"菜单1-1-2","parentId":"221","sortValue":2,"children":null,"describe":"","isGeneral":true,"path":"/more/multiMenu/menu1-1/menu1-1-2","component":"lamp/more/multiMenu/menu1-1/menu1-1-2/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":true,"path":"/more/multiMenu/menu1-1","component":"Layout","state":true,"icon":"","group":"","readonly":true},{"id":"224","createTime":"2020-11-23 11:47:31","createdBy":"1","updateTime":"2020-11-23 11:47:31","updatedBy":"1","label":"菜单1-2","parentId":"220","sortValue":2,"children":null,"describe":"","isGeneral":true,"path":"/more/multiMenu/menu1-2","component":"lamp/more/multiMenu/menu1-2/index","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":true,"path":"/more/multiMenu","component":"Layout","state":true,"icon":"","group":"","readonly":true}],"describe":"","isGeneral":true,"path":"/more","component":"Layout","state":true,"icon":"fa fa-th-large","group":"","readonly":true}],"msg":"ok","path":null,"extra":null,"timestamp":"1608523769745","errorMsg":"","isSuccess":true}');
      this.menuTree = res.data
      // menuApi.allTree().then((response) => {
      //   const res = response.data
      //   this.menuTree = res.data
      // })
    },
    initMenu() {
      return {
        id: '',
        label: '',
        describe: '',
        code: '',
        isGeneral: false,
        path: '',
        component: '',
        state: true,
        sortValue: '',
        parentId: 0,
        icon: '',
        group: ''
      }
    },
    nodeClick(data) {
      this.menu = {...data}
      this.$refs.form.clearValidate()

      this.resourceQueryParams.model.menuId = data.id
      this.resourceSearch()
    },
    handleNumChange(val) {
      this.menu.sortValue = val
    },
    chooseIcons() {
      this.iconVisible = true
    },
    chooseIcon(icon) {
      this.menu.icon = icon
      this.iconVisible = false
    },
    submit() {
      this.$refs.form.validate((valid) => {
        if (valid) {
          this.menu.createTime = this.menu.updateTime = null
          if (this.menu.id) {
            this.update()
          } else {
            this.save()
          }
        } else {
          return false
        }
      })
    },
    save() {
      console.log(this.menu.component)
      menuApi.save(this.menu)
          .then((response) => {
            const res = response.data
            if (res.isSuccess) {
              this.$message({
                message: '创建成功',
                type: 'success'
              })
            }
            this.reset()
          })

    },
    update() {
      console.log(this.menu)
      menuApi.update(this.menu)
          .then((response) => {
            const res = response.data
            if (res.isSuccess) {
              this.$message({
                message: '修改成功',
                type: 'success'
              })
            }
            this.reset()
          })
    },
    reset() {
      this.initMenuTree()
      this.label = ''
      this.resetForm()
    },
    search() {
      this.$refs.menuTree.$refs.treeRef.filter(this.label)
    },
    add() {
      this.resetForm()
      const checked = this.$refs.menuTree.$refs.treeRef.getCheckedKeys()
      if (checked.length > 1) {
        this.$message({
          message: '只能选择一个节点作为父节点',
          type: 'warning'
        })
      } else if (checked.length > 0) {
        this.menu.parentId = checked[0]
      } else {
        this.menu.parentId = 0
      }
      this.resourceQueryParams.model.menuId = null
      this.resourceReset()
    },
    deleteMenu() {
      const checked = this.$refs.menuTree.$refs.treeRef.getCheckedKeys()
      if (checked.length === 0) {
        this.$message({
          message: '请先选择节点',
          type: 'warning'
        })
      } else {
        this.$confirm('选中节点及其子结点将被永久删除, 是否继续？', '提示', {
          confirmButtonText: '确认',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          menuApi.delete({ids: checked})
              .then((response) => {
                const res = response.data
                if (res.isSuccess) {
                  this.$message({
                    message:'删除成功',
                    type: 'success'
                  })
                }
                this.reset()
                this.resourceQueryParams.model.menuId = null
                this.resourceReset()
              })
        }).catch(() => {
          this.$refs.menuTree.$refs.treeRef.setCheckedKeys([])
        })
      }
    },
    resetForm() {
      this.$refs.form.clearValidate()
      this.$refs.form.resetFields()
      this.menu = this.initMenu()
    },
    resourceAdd() {
      this.dialog.type = 'add'
      this.dialog.isVisible = true
      this.$refs.resourceEdit.setResource({
        menuId: this.menu.id
      })
    },
    resourceEdit(row) {
      this.dialog.type = 'edit'
      this.dialog.isVisible = true
      row.menuId = this.menu.id
      this.$refs.resourceEdit.setResource(row)
    },
    resourceSingleDelete(row) {
      this.$refs.resourceTable.clearSelection()
      this.$refs.resourceTable.toggleRowSelection(row, true)
      this.resourceBatchDelete()
    },
    resourceBatchDelete() {
      if (!this.resourceSelection.length) {
        this.$message({
          message: '请先选择需要操作的数据',
          type: 'warning'
        })
        return
      }
      this.$confirm('选中节点及其子结点将被永久删除, 是否继续？', '提示', {
        confirmButtonText: '确认',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        const ids = this.resourceSelection.map((item) => item.id)
        resourceApi.delete({ids: ids}).then((response) => {
          const res = response.data
          if (res.isSuccess) {
            this.$message({
              message: '删除成功',
              type: 'success'
            })
          }
          this.resourceReset()
        })
      })

    },
    resourceReset() {
      this.resourceQueryParams = initQueryParams({
        model: {
          menuId: this.resourceQueryParams.menuId
        }
      });
      this.$refs.resourceTable.clearSort()
      this.$refs.resourceTable.clearFilter()
      this.resourceSearch()
    },
    resourceSearch() {
      this.resourceFetch({
        ...this.resourceQueryParams
      })
    },
    resourceFetch(params = {}) {
      if (this.resourceQueryParams.timeRange) {
        this.resourceQueryParams.extra.createTime_st = this.queryParams.timeRange[0];
        this.resourceQueryParams.extra.createTime_ed = this.queryParams.timeRange[1];
      }

      this.resourceQueryParams.current = params.current ? params.current : this.resourceQueryParams.current;
      this.resourceQueryParams.size = params.size ? params.size : this.resourceQueryParams.size;

      if (this.resourceQueryParams.model.menuId) {
        this.resourceLoading = true

        let that = this
        //todo: 暂时屏蔽下面是请求操作的接口
        setTimeout(function (){
          //模拟请求接口
          that.resourceLoading = false
        },1000)
        return;


        resourceApi.page(this.resourceQueryParams)
            .then((response) => {
              const res = response.data
              if (res.isSuccess) {
                this.resourceTableData = res.data
              }
            })
            .finally(() => this.resourceLoading = false);
      } else {
        this.resourceTableData = {}
      }

    },
    resourceSortChange(val) {
      this.resourceQueryParams.sort = val.prop;
      this.resourceQueryParams.order = val.order;
      if (this.resourceQueryParams.sort) {
        this.resourceSearch();
      }
    },
    resourceFilterChange(filters) {
      for (const key in filters) {
        if (key.includes('.')) {
          const val = {};
          val[key.split('.')[1]] = filters[key][0];
          this.resourceQueryParams.model[key.split('.')[0]] = val;
        } else {
          this.resourceQueryParams.model[key] = filters[key][0]
        }
      }
      this.resourceSearch()
    },
    onResourceSelectChange(selection) {
      this.resourceSelection = selection
    },
    resourceEditClose() {
      this.dialog.isVisible = false
    },
    resourceEditSuccess() {
      this.resourceSearch()
    }
  }
}
</script>
<style lang="scss" scoped>
.menu {
  margin: 10px;

  .app-container {
    background: #fff;
    padding: 10px !important;
  }
}

.filter-container .search-item {
  margin-right: 10px;
  width: 190px;
}

.filter-container .filter-item {
  display: inline-block;
  vertical-align: middle;
  margin-bottom: 10px;
}

.el-input {
  font-size: .85rem !important;
}

.el-card.is-always-shadow {
  box-shadow: none;
}

.el-card {
  border-radius: 0;
  border: none;

  .el-card__header {
    padding: 10px 20px !important;
    border-bottom: 1px solid #f1f1f1 !important;
  }
}
</style>