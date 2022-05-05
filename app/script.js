const blogDiv = document.querySelectorAll(".blog")
const blogTitle = document.querySelectorAll(".blog-title")
const searchQuery = document.querySelector("#searchInput")

searchQuery.addEventListener('keyup', () => {
    for(let i=0; i<blogTitle.length; i++) {
        if(blogTitle[i].innerText.toLowerCase().includes(searchQuery.value.toLowerCase())) {
            blogDiv[i].style.display = "block"
        } else {
            blogDiv[i].style.display = "none"
        }
    }
})