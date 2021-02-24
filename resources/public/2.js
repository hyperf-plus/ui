(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var wangeditor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! wangeditor */ "./node_modules/wangeditor/dist/wangEditor.js");
/* harmony import */ var wangeditor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(wangeditor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/mixins.js */ "./vue/mixins.js");
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixins_js__WEBPACK_IMPORTED_MODULE_1__["FormItemComponent"]],
  data: function data() {
    return {
      editor: null,
      initHtml: false,
      defaultValue: ""
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.defaultValue = this._.cloneDeep(this.attrs.componentValue);
    this.editor = new wangeditor__WEBPACK_IMPORTED_MODULE_0___default.a(this.$refs.toolbar, this.$refs.editor);
    this.editor.config.menus = this.attrs.menus;
    this.editor.config.zIndex = this.attrs.zIndex;
    this.editor.config.uploadImgShowBase64 = this.attrs.uploadImgShowBase64;
    this.editor.config.showFullScreen = this.attrs.showFullScreen;
    this.editor.config.pasteFilterStyle = this.attrs.pasteFilterStyle;

    if (this.attrs.uploadImgServer) {
      this.editor.config.uploadImgServer = this.attrs.uploadImgServer;
      this.editor.config.uploadImgHeaders = {
        Authorization: 'Bearer ' + Admin.token
      };
    } //自定义 fileName


    if (this.attrs.uploadFileName) {
      this.editor.config.uploadFileName = this.attrs.uploadFileName;
    } //自定义 header


    if (this.attrs.uploadImgHeaders) {
      this.editor.config.uploadImgHeaders = this.attrs.uploadImgHeaders;
    }

    this.editor.config.onchange = function (html) {
      _this.onChange(html);
    };

    this.$nextTick(function () {
      _this.editor.create();

      _this.editor.txt.html(_this.defaultValue);
    }); //编辑数据加载完毕设置编辑器的值

    this.$bus.on("EditDataLoadingCompleted", function () {
      _this.editor && _this.editor.txt.html(_this.value);
    });
  },
  destroyed: function destroyed() {
    try {
      this.$bus.off("EditDataLoadingCompleted");
    } catch (e) {}
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".wangeditor-main[data-v-5ebaaa4e] {\n  border: 1px solid #dcdcdc;\n}\n.wangeditor-main .toolbar[data-v-5ebaaa4e] {\n  background: #f7f7f7;\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "wangeditor-main flex-sub" }, [
    _c("div", { ref: "toolbar", staticClass: "toolbar" }),
    _vm._v(" "),
    _vm.attrs.component
      ? _c(
          "div",
          [
            _c(_vm.attrs.component.componentName, {
              tag: "component",
              attrs: { attrs: _vm.attrs.component, editor: _vm.editor },
              on: {
                "update:editor": function($event) {
                  _vm.editor = $event
                }
              }
            })
          ],
          1
        )
      : _vm._e(),
    _vm._v(" "),
    _c("div", {
      ref: "editor",
      class: _vm.attrs.className,
      style: _vm.attrs.style
    })
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./vue/components/widgets/Form/WangEditor.vue":
/*!****************************************************!*\
  !*** ./vue/components/widgets/Form/WangEditor.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true& */ "./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true&");
/* harmony import */ var _WangEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./WangEditor.vue?vue&type=script&lang=js& */ "./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& */ "./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _WangEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5ebaaa4e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "vue/components/widgets/Form/WangEditor.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./WangEditor.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&":
/*!**************************************************************************************************************!*\
  !*** ./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& ***!
  \**************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=style&index=0&id=5ebaaa4e&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_style_index_0_id_5ebaaa4e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true&":
/*!***********************************************************************************************!*\
  !*** ./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./vue/components/widgets/Form/WangEditor.vue?vue&type=template&id=5ebaaa4e&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WangEditor_vue_vue_type_template_id_5ebaaa4e_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);