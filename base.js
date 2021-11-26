$(document).ready(function() {
    //Toggle between light and dark themes
    $(".theme-icon").on("click", function() {
        $(".theme-icon").toggleClass("fa-sun");
        $(".theme-icon").toggleClass("fa-moon");
    
        let theme = $("html").attr("data-theme");

        if (theme == "dark") {
            $("html").attr("data-theme", "light");
        }
        else if (theme == "light") {
            $("html").attr("data-theme", "dark");
        }
    })
});