const path = require('path')
const { src, dest, parallel, watch } = require('gulp')
const uglify = require('gulp-uglify')
const concat = require('gulp-concat')
const csso = require('gulp-csso')
const imagemin = require('gulp-imagemin')
const htmlmin = require('gulp-htmlmin')

const { NODE_ENV } = process.env

// 路径
function resolve(p) {
  const _p = NODE_ENV == 'dev' ? '../Amoz-Theme' : 'dist'
  return path.resolve(__dirname, _p, p)
}
function css() {
  return src([
    './assets/css/guid.css',
    'assets/css/common.css',
    'assets/css/markdown.css',
    'assets/css/style.css'
  ])
    .pipe(concat('index.css'))
    .pipe(csso())
    .pipe(dest(resolve('assets/css/')))
}
function codeStyle() {
  return src('assets/code-style/*.css')
    .pipe(csso())
    .pipe(dest(resolve('assets/code-style/')))
}
function js() {
  return src('assets/js/*.js')
    .pipe(uglify())
    .pipe(dest(resolve('assets/js/')))
}

function img() {
  return src('assets/img/*')
    .pipe(imagemin())
    .pipe(dest(resolve('assets/img/')))
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
}
function php() {
  return src('./*.php')
    .pipe(htmlmin(htmlminOption))
    .pipe(dest(resolve('')))
}
function copy() {
  return src(['./README.md', './screenshot.png']).pipe(dest(resolve('')))
}

if (NODE_ENV === 'dev') {
  watch('./assets/css/*.css', css)
  watch('./assets/js/*.js', js)
  watch('./*.php', php)
}
exports.default = parallel(css, codeStyle, js, img, php, copy)
