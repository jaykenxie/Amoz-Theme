const { src, dest, parallel } = require("gulp");
const uglify = require("gulp-uglify");
const concat = require("gulp-concat");
const csso = require("gulp-csso");
const imagemin = require("gulp-imagemin");
const htmlmin = require("gulp-htmlmin");

function css() {
  return src("assets/css/common.css", "assets/css/style.css")
    .pipe(concat("style.css"))
    .pipe(csso())
    .pipe(dest("dist/assets/css/"));
}
function codeStyle() {
  return src("assets/code-style/*.css")
    .pipe(csso())
    .pipe(dest("dist/assets/code-style/"));
}
function js() {
  return src("assets/js/*.js")
    .pipe(uglify())
    .pipe(dest("dist/assets/js/"));
}

function img() {
  return src("assets/img/*")
    .pipe(imagemin())
    .pipe(dest("dist/assets/img/"));
}
const htmlminOption = {
  removeComments: true, //清除HTML注释
  collapseWhitespace: true, //压缩HTML
  collapseBooleanAttributes: true, //省略布尔属性的值 <input checked="true"/> ==> <input />
  removeEmptyAttributes: true, //删除所有空格作属性值 <input id="" /> ==> <input />
  removeScriptTypeAttributes: true, //删除<script>的type="text/javascript"
  removeStyleLinkTypeAttributes: true, //删除<style>和<link>的type="text/css"
  minifyJS: true, //压缩页面JS
  minifyCSS: true //压缩页面CSS
};
function php() {
  return src("./*.php")
    .pipe(htmlmin(htmlminOption))
    .pipe(dest("dist"));
}
function copy() {
  return src(["./README.md", "./screenshot.png"]).pipe(dest("dist"));
}
exports.default = parallel(css, codeStyle, js, img, php, copy);
