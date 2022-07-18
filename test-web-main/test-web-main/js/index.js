// function openCity(evt, cityName) {
//     // Declare all variables
//     var i, tabcontent, tablinks;
  
//     // Get all elements with class="tabcontent" and hide them
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//       tabcontent[i].style.display = "none";
//     }
  
//     // Get all elements with class="tablinks" and remove the class "active"
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//       tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }
  
//     // Show the current tab, and add an "active" class to the link that opened the tab
//     document.getElementById(cityName).style.display = "block";
//     evt.currentTarget.className += " active";
//   }
// var acc = document.getElementsByClassName("accordion");
// var i;

// for (i = 0; i < acc.length; i++) {
//   acc[i].addEventListener("click", function() {
//     /* Toggle between adding and removing the "active" class,
//     to highlight the button that controls the panel */
//     this.classList.toggl
// let tabs = document.querySelector(".tabs");
// let tabHeader = tabs.querySelector(".tab-header");
// let tabBody = tabs.querySelector(".tab-body");
// let tabHeaders = tabHeader.querySelectorAll("div");

// for(let i=0;i<tabHeaders.length;i++){
//   tabHeaders[i].addEventListener("click",function(){
//     tabHeader.querySelector(".active").classList.remove("active");
//     tabHeaders[i].classList.add("active");
//     tabBody.style.marginTop = `-${i*100}vh`;
//   })
// }