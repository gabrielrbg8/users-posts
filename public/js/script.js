$(function() {

        var screenWidth = screen.width;
        if (screenWidth <= 760) {
            var tables = document.getElementsByTagName("table");
            for (var i = 0; i < tables.length; i++) {
                tables[i].classList.add("table-responsive");
            }
        }
});
