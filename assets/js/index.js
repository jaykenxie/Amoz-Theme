hljs.initHighlightingOnLoad();
(function() {
  var userInfoDrop = document.querySelector(".user-info-drop");
  var userInfoTitle = document.querySelector(".user-info_username");
  userInfoTitle &&
    userInfoTitle.addEventListener("mouseover", function() {
      userInfoDrop.style.display = "block";
    });
  userInfoTitle &&
    document.body.addEventListener("click", function(evet) {
      if (!userInfoDrop.contains(evet.target)) {
        userInfoDrop.style.display = "none";
      }
    });
  // 实现图片预览
  var modal = document.querySelector(".modal");
  var modalImg = document.querySelector(".modal-box img");
  var postContent = document.querySelector(".post-content");
  postContent &&
    postContent.addEventListener("click", function(evet) {
      if (evet.target.tagName === "IMG") {
        modalImg.src = evet.target.src;
        modal.style.display = "block";
        modalImg.parentElement.style.width = modalImg.clientWidth + "px";
      }
    });
  modal.addEventListener("click", function(event) {
    if (event.target.tagName === "IMG") return;
    modal.style.display = "none";
  });
  // 友情链接跳转
  var links = document.querySelector('.links')
  links && links.addEventListener('click', function(evet){
    if (evet.target.tagName === "IMG") {
      window.open(evet.target.alt)
    }
  })
})();
